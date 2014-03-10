<?php
/* @var $this SaleController */
/* @var $model Sale */

$this->breadcrumbs=array(
	'Sales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sale', 'url'=>array('index')),
	array('label'=>'Manage Sale', 'url'=>array('admin')),
);
?>

<h1>Продажба на продукт</h1>

<?php $this->renderPartial('_form_create', array('model'=>$model, 'pr_id'=>$pr_id, 'product'=>$product)); ?>