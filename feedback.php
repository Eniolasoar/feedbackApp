<?php include "header.php";
?>
<?php
$stmt=$conn->prepare("SELECT * FROM `users`");
$stmt->execute();
$result=mysqli_stmt_get_result($stmt);
$feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <h2>Feedback</h2>
    <?php if(empty($feedbacks)):?>
        <p class="lead mt3" style="margin-top:50px;">There is no feedback</p>
    <?php else: ?>
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
    <?php endif?>
<?php include "footer.php";

