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
<h1>View Product #<?php echo $model->id; ?></h1>

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
		'date_create',
		'date_update',
		'date_out',
		'date_in',
		'order_from',
		'order_phone',
		'image_url',
		'instock',
		'user_id',
	),
)); ?>
</div>
<div class="product_buttons">
    <?php echo CHtml::link("Измени го продуктот",array('product/update',
      'id'=>$model->id)); ?>
       
</div>