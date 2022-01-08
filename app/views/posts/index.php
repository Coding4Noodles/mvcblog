<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

<div class="container">
    <?php if(isLoggedIn()): ?>
        <div class="btn-holder">
            <a class="btn border" href="<?php echo URLROOT; ?>/posts/create">
                Create a post
            </a>
        </div>
        <main>
            <?php foreach($data['posts'] as $post): ?>               
                <div class="blogpost">
                    <h2>
                        <?php echo $post->title; ?>
                    </h2>

                    <p>
                        <?php echo $post->body ?>
                    </p>
                    <div class="blogpost-info">
                        <div class="blog-btns">
                            <a
                                class="btn orange"
                                href="<?php echo URLROOT . "/posts/update/" . $post->id ?>">
                                Update
                            </a>
                            <form action="<?php echo URLROOT . "/posts/delete/" . $post->id ?>" method="POST">
                                <input type="submit" name="delete" value="Delete" class="btn red">
                            </form>
                        </div> 
                        <small>
                            <?php echo 'Created on: ' . date('F j Y', strtotime($post->created_at)) ?>
                        </small>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
                <h1>Blog</h1>
                <main>
                    <?php foreach($data['posts'] as $post): ?>
                        <div class="blogpost">
                            <h2>
                                <?php echo $post->title; ?>
                            </h2>
                            
                            <p>
                                <?php echo $post->body ?>
                            </p>

                            <div class="blogpost-info">
                                <small> 
                                    <?php echo 'Created on: ' . date('F j Y', strtotime($post->created_at)) ?>
                                </small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </main>
        </main>
    <?php endif; ?>            
</div>


<?php
    require APPROOT . '/views/includes/footer.php';
?>