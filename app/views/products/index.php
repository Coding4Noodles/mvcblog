<?php
   require APPROOT . '/views/includes/head.php';
?>


<?php
   require APPROOT . '/views/includes/navigation.php';
?>


<div class="container">
   <h1>Products</h1>
   <h4>Interested in the latest hardware? Take a look below.</h4>
   <main> 
      <?php if(isAdmin()): ?>
        <a class="product btn-product" href="<?php echo URLROOT; ?>/products/create">
            Add new product
        </a>        
        <?php foreach($data['products'] as $product): ?>
            <div class="product">
                <div class="product-header">
                <img src=<?php echo $product->imgPath ?> >
                </div>
                <div class="product-body">
                  <h3 class="product-h3"><?php echo $product->title; ?></h3>
                  <h5 class="product-desc"><?php echo $product->descr; ?></h5>
                  <a href="<?php echo $product->itemlink; ?>" class="product-btn" target="_blank">Shop now</a>
                  <div class="product-btns">
                      <a
                          class="btn orange"
                          href="<?php echo URLROOT . "/products/update/" . $product->id ?>">
                          Update
                      </a>
                      <form action="<?php echo URLROOT . "/products/delete/" . $product->id ?>" method="POST">
                        <input type="submit" name="delete" value="Delete" class="btn red">
                    </form>
                  </div>
                </div>
            </div>
        <?php endforeach; ?>
      <?php else: ?>
        <?php foreach($data['products'] as $product): ?>
            <div class="product">
                <div class="product-header">
                  <img src=<?php echo $product->imgPath ?> >
                </div>
                <div class="product-body">
                  <h3 class="product-h3"><?php echo $product->title; ?></h3>
                  <h5 class="product-desc"><?php echo $product->descr; ?></h5>
                  <a href="<?php echo $product->itemlink; ?>" class="product-btn" target="_blank">Shop now</a>
                </div>
            </div>
        <?php endforeach; ?>
      <?php endif; ?>
   </main>
</div>

<?php
   require APPROOT . '/views/includes/footer.php';
?>