<?php

    if(isset($_POST["submit"])) {
        include "php/functions.php";
        include "php/connection.php";

        $name = htmlspecialchars($_POST["name"]);
        $profilePicture = htmlspecialchars($_POST["profilePicture"]);
        $email = htmlspecialchars($_POST["email"]);
        $feedback = htmlspecialchars($_POST["feedback"]);


        //check if the fields are empty
        if (emptyField($name)) {
            $nameError = "Name is required";

        }

        if (emptyField($email)) {
            $emailError = "Email is required";
        }
        if (emptyField($feedback)) {
            $commentError = "Comment is required";
        }

        //check for valid email input
        if (!validEmail($email)) {
            $invalidEmail = "Invalid Email";
        }

        //handling file upload
        $fileName=$_FILES["profilePicture"]["name"];
        if($fileName==""){
            $ImageMessage="No file provided";
        }
        $fileTmpName=$_FILES["profilePicture"]["tmp_name"];
        $fileSize=$_FILES["profilePicture"]["size"];
        $fileError=$_FILES["profilePicture"]["error"];

        $extension=explode(".",$fileName);
        $fileExt=strtolower(end($extension));

        $allowed_ext=array("jpg","jpeg","png");
        if($fileError ==0){
            if(in_array($fileExt,$allowed_ext)){
                if($fileSize <= 500000){
                    $uniqueFileName=uniqid("IMG-",true).".".$fileExt;
                    $fileDestination="uploads/".$uniqueFileName;
                    if(!move_uploaded_file($fileTmpName,$fileDestination)){
                        $ImageMessage="Upload unsuccessful";
                    }

                }
                else{
                    $ImageMessage="The file size is too large";
                }
            }
            else{
                $ImageMessage="File Type is not supported";
            }

        }
        else{
            $ImageMessage="Enter a valid file";
        }

        if(!emptyField($name)&&!emptyField($email)&&!emptyField($feedback)&&validEmail($email)&&empty($ImageMessage)){
            $sql="INSERT INTO `users` (name,profilePicture,email,feedback) VALUES ('$name','$uniqueFileName','$email','$feedback')";
            if(mysqli_query($conn,$sql)){
                $result="Successfully saved to database";

            }
        }

    }
?>

<?php include "header.php";?>
<p class="lead fadeOut"><?php echo $result? $result :null ?></p>
    <img src="img/logo.png" class="w-25 mb-3" alt="" style="max-width:100px;">
    <h2>Feedback</h2>
    <p class="lead text-center">Leave feedback for Traversy Media</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="mt-4 w-75" enctype="multipart/form-data" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo $nameError ?"is-invalid" : null?>" id="name" name="name" placeholder="Enter your name">
        <div class="invalid-feedback">
            <?php echo $nameError;?>
        </div>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Upload Profile Picture:</label>
        <input type="file" class="form-control <?php echo $ImageMessage ?"is-invalid" : null?>" id="profilePicture" name="profilePicture" >
          <div class="invalid-feedback">
              <?php echo $ImageMessage;?>
          </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo $emailError ?"is-invalid" : null?>" id="email" name="email" placeholder="Enter your email">
          <div class="invalid-feedback">
              <?php echo $emailError;?>
              <?php echo !$emailError ? $invalidEmail : null;?>
          </div>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo $commentError ?"is-invalid" : null?>" id="body" name="feedback" placeholder="Enter your feedback"></textarea>
          <div class="invalid-feedback">
              <?php echo $commentError;?>
          </div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
<?php include "footer.php";?>
