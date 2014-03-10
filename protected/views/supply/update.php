<?php
/* @var $this SupplyController */
/* @var $model Supply */

$this->breadcrumbs=array(
	'Supplies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Supply', 'url'=>array('index')),
	array('label'=>'Create Supply', 'url'=>array('create')),
	array('label'=>'View Supply', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Supply', 'url'=>array('admin')),
);
?>

<h1>Ажурирај набавка: <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form_update', array('model'=>$model, 'pr_id'=>$pr_id, 'product'=>$product)); ?>