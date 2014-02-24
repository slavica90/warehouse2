<?php
/* @var $this FirmaController */
/* @var $model Firma */

$this->breadcrumbs=array(
	'Firmas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Firma', 'url'=>array('index')),
	array('label'=>'Create Firma', 'url'=>array('create')),
	array('label'=>'Update Firma', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Firma', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Firma', 'url'=>array('admin')),
);
?>

<h1>View Firma #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'address',
		'phone_number',
		'lat',
		'lng',
	),
)); ?>
