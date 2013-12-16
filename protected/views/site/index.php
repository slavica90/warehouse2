<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="title_category">
<h1> Категории </h1>
</div>
<div class="categories">
 <?php if($kategorii != NULL) {?>

  <?php foreach ($kategorii as $kategorija){?>
    <div class="single_category">
  <p><?php echo $kategorija->id;?></p>
  <p><?php echo $kategorija->name;?></p>
  <p><?php echo $kategorija->description;?></p>
  <p><?php echo $kategorija->image_url;?></p>
  <p><?php echo $kategorija->date_create;?></p>
  <p><?php echo $kategorija->date_update;?></p>
  <p><?php echo $kategorija->user_id;?></p>
 </div>
  <?php } ?>
  <?php }else {?>
   <div class="flash-notice">Немате венсено категории!</div>
  <?php } ?>
</div>
