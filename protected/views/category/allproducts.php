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
   </div>
  <?php } ?>
  <?php }else {?>
   <div class="flash-notice">Немате венсено продукти!</div>
  <?php 
  } ?>
</div>

