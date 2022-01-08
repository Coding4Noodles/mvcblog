<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container center">
    <h1>
        Update post
    </h1>

    <form
    action="<?php echo URLROOT; ?>/products/update/<?php echo $data['product']->id ?>" method="POST">
        <div class="form-item">
            <input
                type="text"
                name="title"
                value="<?php echo $data['product']->title ?>">

            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div>

        <div class="form-item">
            <input type="text" name="descr" value="<?php echo $data['product']->descr ?>"></input>

            <span class="invalidFeedback">
                <?php echo $data['descrError']; ?>
            </span>
        </div>

        <div class="form-item">
            <input type="text" name="itemlink" value="<?php echo $data['product']->itemlink ?>"></input>
            <span class="invalidFeedback">
                <?php echo $data['itemError']; ?>
            </span>
        </div>
        <button class="btn-create" name="submit" type="submit">Submit</button>
    </form>
</div>
