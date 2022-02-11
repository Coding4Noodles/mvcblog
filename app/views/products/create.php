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
        Add new product
    </h1>

    <form action="<?php echo URLROOT; ?>/products/create" method="POST" enctype="multipart/form-data">

        <div class="form-item">
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>

        <div class="form-item">
            <input type="text" name="title" placeholder="Title...">

            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div>

        <div class="form-item">
            <input type="text" name="descr" placeholder="description..."></input>

            <span class="invalidFeedback">
                <?php echo $data['descrError']; ?>
            </span>
        </div>

        <div class="form-item">
            <input type="text" name="itemlink" placeholder="Link to website..."></input>

            <span class="invalidFeedback">
                <?php echo $data['itemError']; ?>
            </span>
        </div>

        <button class="btn-create" name="submit" type="submit">Add product</button>
    </form>
</div>
