<div class="main_container">
    
    <div class="row-fluid">
        <div class="span12">
    <?php echo CHtml::link('Додади нов продукт',array('product/create'),
           array('style'=>'float: right', 'class' => 'btn btn-mini btn-primary')); ?>
    </div>  
</div>
    
<div class="page-header">
        <h1>Продукти
            <small> листа на продукти во категоријата:  <?php echo $model->name?></small>
        </h1>

</div>

    
<div class="row-fluid">
<?php if($allproducts != NULL) {?>
 <ul class="thumbnails">
           <?php $i = 0; ?>
  <?php foreach ($allproducts as $singleproduct){?>
     <li class="span3">
        <div class="thumbnail grid-category">
             <?php if($singleproduct->image_url) {
                $imghtml=CHtml::image($singleproduct::productPhotoUrl($singleproduct->id), 'productphoto');
                echo  CHtml::link($imghtml, array('product/view','id'=>$singleproduct->id));
          } else {
               $imghtml=CHtml::image(Yii::app()->getBaseUrl(true).'/images/no_img.png', 'no_photo');
            echo  CHtml::link($imghtml, array('product/view','id'=>$singleproduct->id));
          } ?>
            
             <div class="caption">
            <h3><?php echo CHtml::link($singleproduct->name,array('product/view',
      'id'=>$singleproduct->id)); ?> </h3>
        
              <p> Набавна цена: <?php echo $singleproduct->purchase_price?> </p>
              <p> Продажна цена: <?php echo $singleproduct->sell_price?> </p>
              <p> Количина: <?php echo $singleproduct->amount .' '. $singleproduct->measurement?> </p>
              
            
        </div>
   </div>
         </li>
    <?php if($i > 0 && $i%4==0){ ?>
       </ul>
     <ul class="thumbnails">
  <?php } ?>
  <?php }?>
         </ul>
  <?php }else {?>
   <div class="flash-notice">Немате венсено продукти од оваа категорија!</div>
  <?php } ?>
</div>
</div>

