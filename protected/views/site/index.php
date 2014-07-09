<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div>
    <div class="add_category">
    
    <?php echo CHtml::link('Додади категорија',array('category/create'),
            array('style'=>'float: right')); ?>
    </div>
    
<div class="title_category">
<h1> Категории1 </h1>
</div>
  
<div class="categories">
   <div>
    <?php if($kategorii != NULL) {?>

    <?php foreach ($kategorii as $kategorija){?>
    <div class="single_category">
         <?php if($kategorija->image_url) {?>
        <a class="single_photo" href="#" title="Category">
        <img width="245" height="309" src="<?php echo $kategorija::categoryPhotoUrl($kategorija->id);?>" alt="<?php echo $kategorija->name;?>" style="opacity: 1; visibility: visible;" />
        </a>     
        <?php } else { ?>
         <a class="single_photo" href="#" title="Category">
         <img width="245" height="309" src="images/no_img.png" alt="<?php echo $kategorija->name;?>" style="opacity: 1; visibility: visible;" />
        </a>          
        <?php } ?>
        
           
        <div class="category_desc">
            <h4><?php echo CHtml::link($kategorija->name,array('category/allproducts',
      'id'=>$kategorija->id)); ?> </h4>
        
            <span>
                <?php echo $kategorija->description;?>
            </span>
        </div>

    </div>
  <?php } ?>
  <?php }else {?>
   <div class="flash-notice">Немате венсено категории!</div>
  <?php } ?>
   </div>
</div>


<div class="nemazaliha">
    <div class="title_category">
        <h1> Продукти кои треба да се набават </h1>
    </div>
    
    
   <?php $this->widget('application.extensions.tablesorter.Sorter', array(
    'data'=>$produkti,
    'columns'=>array(
        'id',
        'name',
        'amount', 
        'measurement', // Relation value given in model
    )
));
   ?>
     
           
</div>
</div>