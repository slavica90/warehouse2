
<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>
<div class="back_link">
<?php echo CHtml::link('Врати се назад',Yii::app()->request->urlReferrer); ?>
</div>
<div class="product_details">
<h1>Преглед на продуктот: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'purchase_price',
		'sell_price',
		'amount',
		'measurement',
                'warning_amount',
		'date_create',
		'date_update',
		'firma_id',
		'image_url',
		'instock',
		'user_id',
	),
)); ?>


</div>
<div class="row-fluid">
    
    <?php echo CHtml::link("Продажба на продукт",array('sale/create',
      'p_id'=>$model->id), array('class' => 'btn btn-mini btn-primary')); ?>
    
    <?php echo CHtml::link("Набавка на продукт",array('supply/create',
      'p_id'=>$model->id), array('class' => 'btn btn-mini btn-primary')); ?>
   
    <?php echo CHtml::link("Измени го продуктот",array('product/update',
      'id'=>$model->id), array('class' => 'btn btn-mini btn-primary')); ?>
     
</div>
<div class="row-fluid">
    <div class="span-12">
        <h3 class="header">
            Набавки и Продажби
            <span class="header-line"></span>
        </h3>
    <ul class="nav nav-tabs">
    <li><a href="#tabs-1" data-toggle="tab">Продажба</a></li>
    <li><a href="#tabs-2" data-toggle="tab">Набавка</a></li>
  </ul>
<div id="tab-content">
  <div class="tab-pane" id="tabs-1">
       
    <?php if($sales != NULL) {?>

    <?php foreach ($sales as $sale){?>
            <div>
            <p> Датум на креирање: <?php echo $sale->date_create;?></p>
            <p> Продадени продукти: <?php echo $sale->sold_products;?></p>
            <p> Забелешка: <?php echo $sale->comment;?></p>
          <?php echo CHtml::link("Измени",array('sale/update', 'id'=>$sale->id)); ?>
            <hr>
        </div>
    <?php } ?>
    <?php }else {?>
        <div class="flash-notice">Нема продажби за овој продукт!</div>
     <?php } ?>
  </div>
  <div class="tab-pane" id="tabs-2">
    <?php if($supplies != NULL) {?>

    <?php foreach ($supplies as $supply){?>
            <div>
            <p> Датум на креирање: <?php echo $supply->date_create;?></p>
            <p> Набавени продукти: <?php echo $supply->bought_products;?></p>
            <p> Забелешка: <?php echo $supply->comment;?></p>
            <p> Фирма: 
                <?php
                $model = Firma::model()->findByAttributes(array('id'=>$supply->firma_id));
                echo $model->name;
           ?></p>
            <?php echo CHtml::link("Измени",array('supply/update',
      'id'=>$supply->id)); ?>
            <hr>
        </div>
        <?php } ?>
        <?php }else {?>
        <div class="flash-notice">Нема набавки за овој продукт!</div>
     <?php } ?>
  </div>
 </div>
          </div>
 </div>