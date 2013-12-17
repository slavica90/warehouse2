<?php if($allproducts != NULL) {?>

  <?php foreach ($allproducts as $singleproduct){?>
    <div class="single_category">
  <p><?php echo $singleproduct->id;?></p>
  <p><a href=""><?php echo $singleproduct->name;?></a></p>
  <p><?php echo $singleproduct->code;?></p>
   </div>
  <?php } ?>
  <?php }else {?>
   <div class="flash-notice">Немате венсено продукти!</div>
  <?php 
  } ?>

