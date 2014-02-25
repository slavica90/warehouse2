<?php
/* @var $this SupplyController */
/* @var $model Supply */

$this->breadcrumbs=array(
	'Supplies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Supply', 'url'=>array('index')),
	array('label'=>'Create Supply', 'url'=>array('create')),
	array('label'=>'Update Supply', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Supply', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Supply', 'url'=>array('admin')),
);
?>

<h1>View Supply #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date_create',
		'bought_products',
		'comment',
		'product_id',
		'firma_id',
	),
)); ?>
