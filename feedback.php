<?php include "header.php";
?>
<?php
$sql="SELECT * FROM users";
$result=mysqli_query($conn,$sql);
$feedbacks=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
    <h2>Feedback</h2>
    <?php if(empty($feedbacks)):?>
        <p class="lead mt3"style="margin-top:50px;">There is no feedback</p>
    <?php endif; ?>
   <?php foreach($feedbacks as $feedback):?>



        <div class="card my-3 w-75">

         <div class="card-body text-center flex">
             <img src="uploads/<?php echo $feedback["profilePicture"]?>" class="w-25 mb-3" alt="" style="max-width:100px;border-radius:50%;">
           <?php echo $feedback["feedback"]?>
             <div class="text-secondary mt-2">
                 By <?php echo $feedback["name"]."<br>"?>
                 <?php echo $feedback["date"];?>
             </div>
         </div>
       </div>
    <?php endforeach;?>
<?php include "footer.php";

