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
<h1> Категории</h1>
</div>
  
<div class="categories">
   <div>
    <?php if($kategorii != NULL) {?>

    <?php foreach ($kategorii as $kategorija){?>
    <div class="single_category">
         <?php if($kategorija->image_url) {
       
            $imghtml=CHtml::image($kategorija::categoryPhotoUrl($kategorija->id), 'categoryphoto',
                    array( 'width'=> '245', 'height'=>'309'));
            echo  CHtml::link($imghtml, array('category/allproducts','id'=>$kategorija->id));
         } else { 
            $imghtml=CHtml::image(Yii::app()->getBaseUrl(true).'/images/no_img.png', 'np_photo', array( 'width'=> '245', 'height'=>'309'));
            echo  CHtml::link($imghtml, array('category/allproducts','id'=>$kategorija->id));
            
      } ?>
              
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
        'purchase_price',
        'sell_price',
        'amount', 
        'measurement', 
       
    )
));
   ?>
     
           
</div>
</div>