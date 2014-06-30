<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="title_category">
<h1> Категории </h1>
</div>
<div class="add_category">
    
    <?php echo CHtml::link('Додади категорија',array('category/create'),
            array('style'=>'float: right')); ?>
    
    
</div>
<div class="categories">
 <?php if($kategorii != NULL) {?>

  <?php foreach ($kategorii as $kategorija){?>
    <div class="single_category">
  <p><?php echo $kategorija->id;?></p>
  <p><?php echo CHtml::link($kategorija->name,array('category/allproducts',
      'id'=>$kategorija->id)); ?></p>
  
  <p><?php echo $kategorija->description;?></p>
  <p><?php echo $kategorija->image_url;?></p>
  
   <?php if($kategorija->image_url) {?>
        <img src="<?php echo $kategorija->image_url;?>" alt="<?php echo $kategorija->name;?>" width="200" height="150" />
      <?php } else { ?>
         <img src="images/no_img.png" alt="<?php echo $kategorija->name;?>" width="200" height="150" />
       <?php } ?>
         
  <p><?php echo $kategorija->date_create;?></p>
  <p><?php echo $kategorija->date_update;?></p>
  <p><?php echo $kategorija->user_id;?></p>
 </div>
  <?php } ?>
  <?php }else {?>
   <div class="flash-notice">Немате венсено категории!</div>
  <?php } ?>
</div>
