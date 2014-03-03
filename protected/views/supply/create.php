<?php
/* @var $this SupplyController */
/* @var $model Supply */

$this->breadcrumbs=array(
	'Supplies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Supply', 'url'=>array('index')),
	array('label'=>'Manage Supply', 'url'=>array('admin')),
);
?>

<h1>Create Supply</h1>

<?php $this->renderPartial('_form_create', array('model'=>$model, 'pr_id'=>$pr_id)); ?>