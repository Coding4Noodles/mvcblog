<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

<div class="container">
    <div class="content-landing">
        <div class="content-text">
            <h1>Digital Solutions</h1>
            <p>Do you like to stay up to date with the latest trends and features? Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus nemo ut est voluptatum qui et neque nostrum amet! Dolorem unde esse tenetur quibusdam, dure sequi, alias repellat natus omnis sunt architecto! Adipisci accusantium ratione consectetur quaerat officiis!</p>
        </div>
        <div class="content-img">
            <?php if(isLoggedIn()):  ?>
                <img src="../public/img/digital-owl.svg" alt="landingsimage">
            <?php else : ?>
                <img src="public/img/digital-owl.svg" alt="landingsimage">
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
    require APPROOT . '/views/includes/footer.php';
?>

 
