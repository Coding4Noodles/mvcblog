<nav>
    <div class="logo">
		<img src="../public/img/icon-w.png" alt="logo">
    </div>
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/index">Home</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/about">About</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/work">Our work</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/posts">Blog</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/news">News</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/contact">Contact us</a>
        </li>
    
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>
