<?php
   require APPROOT . '/views/includes/head.php';
?>


<?php
   require APPROOT . '/views/includes/navigation.php';
?>


<div class="container">
   <div class="content-landing">
      <div class="content-text">
         <h1>Who are we?</h1>
         <p>Devlife is a platform which loves to show the latest development technologies. 
         Devlife is a non profit organisation that just wants to give back to the developer community. </p>
      </div>
      <div class="content-img">
      <?php if(isLoggedIn()):  ?>
                <img src="../public/img/give-back.svg" alt="giveback">
            <?php else : ?>
                <img src="public/img/give-back.svg" alt="giveback">
            <?php endif; ?>
      </div>
   </div>
</div>

<?php
   require APPROOT . '/views/includes/footer.php';
?>
