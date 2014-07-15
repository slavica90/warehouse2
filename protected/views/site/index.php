<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div>
    <div class="row-fluid">
        <div class="span12">
            <?php echo CHtml::link('Додади категорија',array('category/create'),
            array('style'=>'float: right', 'class' => 'btn btn-mini btn-primary')); ?>
        </div>
    </div>
    
    <div class="page-header">
        <h1>Категории
            <small> листа на сите категории</small>
        </h1>

    </div>
  
<div class="row-fluid">
    <?php if($kategorii != NULL) {?>
       <ul class="thumbnails">
           <?php $i = 0; ?>
    <?php foreach ($kategorii as $kategorija){ $i++; ?>
    <li class="span3">
        <div class="thumbnail grid-category">
         <?php if($kategorija->image_url) {
            $imghtml=CHtml::image($kategorija::categoryPhotoUrl($kategorija->id), 'categoryphoto');
            echo  CHtml::link($imghtml, array('category/allproducts','id'=>$kategorija->id));
         } else { 
            $imghtml=CHtml::image(Yii::app()->getBaseUrl(true).'/images/no_img.png', 'np_photo');
            echo  CHtml::link($imghtml, array('category/allproducts','id'=>$kategorija->id));
   } ?>
              
        <div class="caption">
            <h2><?php echo CHtml::link($kategorija->name,array('category/allproducts',
      'id'=>$kategorija->id)); ?> </h2>
        
            <p>
                <?php echo $kategorija->description;?>
            </p>
        </div>

    </div>
    </li>
    <?php if($i > 0 && $i%4==0){ ?>
       </ul>
    <ul class="thumbnails">
    <?php } ?>
  <?php } ?>
       </ul>
  <?php }else {?>
   <div class="flash-notice">Немате венсено категории!</div>
  <?php } ?>
   </div>
</div>


<div class="row-fluid">
    <div class="page-header">
        <h1> Продукти кои треба да се набават 
            <small>нема доволно на залиха</small></h1>
    </div>
    
    <script>
    $(function ()
    {
        $(".example6").colorbox({iframe:true, innerWidth:425, innerHeight:344});    
    })
</script>

    
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
     
    <a class='example6' href="http://google.com">Outside Webpage (Iframe)</a>       
</div>
</div>