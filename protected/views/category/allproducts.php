<div class="add_product">
    
    <?php echo CHtml::link('Додади нов продукт',array('product/create'),
            array('style'=>'float: right')); ?>
    
    
</div>
<div>
<?php if($allproducts != NULL) {?>

  <?php foreach ($allproducts as $singleproduct){?>
    <div class="single_category">
  <p><?php echo $singleproduct->id;?></p>
  <p><?php echo CHtml::link($singleproduct->name,array('product/view',
      'id'=>$singleproduct->id)); ?></p>
  <p><?php echo $singleproduct->code;?></p>
  
   <?php if($singleproduct->image_url) {?>
        <img src="<?php echo $singleproduct->image_url;?>" alt="<?php echo $singleproduct->name;?>" width="200" height="150" />
      <?php } else { ?>
         <img src="images/no_img.png" alt="<?php echo $singleproduct->name;?>" width="200" height="150" />
       <?php } ?>
   </div>
  <?php } ?>
  <?php }else {?>
   <div class="flash-notice">Немате венсено продукти!</div>
  <?php 
  } ?>
</div>

