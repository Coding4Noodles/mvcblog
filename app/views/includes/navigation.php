<nav>
    <?php if(isLoggedIn()):  ?>
    <div class="logo">
        <?php $pathToImg = URLROOT."/public/img/icon-w.png";?>
        <a href="<?php echo URLROOT; ?>/pages/index">
            <img src=<?php echo "$pathToImg"; ?> />  
        </a>
    </div>
        <ul>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/index">Home</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/about">About</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/products">Products</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/posts">Blog</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/news">News</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/contact">Contact us</a>
            </li>
        </ul>
            <?php else : ?>
                <div class="logo">
                    <?php $pathToImg = URLROOT."/public/img/icon-w.png";?>
                    <a href="<?php echo URLROOT; ?>/index">
                        <img src=<?php echo "$pathToImg"; ?> />  
                    </a>
                </div>
                <ul>
                    <li>
                        <a href="<?php echo URLROOT; ?>/index">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/about">About</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/products">Products</a>
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
                </ul>
        <?php endif; ?>
</nav>