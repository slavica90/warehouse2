<?php
/* @var $this SaleController */
/* @var $model Sale */

$this->breadcrumbs=array(
	'Sales'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sale', 'url'=>array('index')),
	array('label'=>'Create Sale', 'url'=>array('create')),
	array('label'=>'View Sale', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sale', 'url'=>array('admin')),
);
?>

<h1>Update Sale <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form_update', array('model'=>$model, 'pr_id'=>$pr_id)); ?>