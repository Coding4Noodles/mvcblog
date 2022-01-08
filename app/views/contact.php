<?php
   require APPROOT . '/views/includes/head.php';
?>


<?php
   require APPROOT . '/views/includes/navigation.php';
?>

<?php
   // validate the form
   $errorMsg = null;
   if (isset($_GET["error"]) &&  $_GET["error"] == "invalidform") {
      $errorMsg = "<div class='error__wrong'><h3 style='color: white; font-weight: 500;'>Error. The email was not sent due to non valid inputs.</h3></div>";
   } else if (isset($_GET["error"]) && $_GET["error"] == 'invalidemail') {
      $errorMsg = "<div class='error__email'><h3 style='color: white; font-weight: 500;'>Please enter a valid email address.</h3></div>";
   } else if (isset($_GET["error"]) &&  $_GET["error"] == "invalidname") {
      $errorMsg = "<div class='error__wrong'><h3 style='color: white; font-weight: 500;'>Please enter a valid name.</h3></div>";
   } else if (isset($_GET["error"]) &&  $_GET["error"] == "invalidmessage") {
      $errorMsg = "<div class='error__wrong'><h3 style='color: white; font-weight: 500;'>Please enter a valid message.</h3></div>";
   }  else if (isset($_GET["error"]) &&  $_GET["error"] == "emptyfnameemptyemail") {
      $errorMsg = "<div class='error__wrong'><h3 style='color: white; font-weight: 500;'>Please fill in your email and name. The email was not sent.</h3></div>";
   } else if (isset($_GET["error"]) && $_GET["error"] == "noerror") {
      $errorMsg = "<div class='noerror'><h3 style='color: white; font-weight: 500;'>Thank you for filling in this contact form. We will get back to you as soon as possible.</h3></div>";
   }
?>

<div class="container">
   <h1>Contact Us</h1>
   
   <div class="error-message">
      <?php 
         if(!is_null($errorMsg)) {
            echo $errorMsg;
         }
      ?>   
   </div>
   <form action="registerContact" class="form-contact" method="POST">
      <div class="form-group">
         <label for="name">Name</label>
         <input type="text" name="fname" id="fname" placeholder="Enter your name">
      </div>
      <div class="form-group">
         <label for="email">Email</label>
         <input type="email" name="email" id="email" placeholder="Enter your email">
      </div>
      <div class="form-group">
         <label for="message">Message</label>
         <textarea name="message" id="message" placeholder="Enter your message"></textarea>
      </div>
      <div class="form-btn">
         <input type="submit" value="Send message" class="btn yellowish">
      </div>
   </form>
</div>

<?php
   require APPROOT . '/views/includes/footer.php';
?>
