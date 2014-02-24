<?php
/* @var $this FirmaController */
/* @var $model Firma */

$this->breadcrumbs=array(
	'Firmas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Firma', 'url'=>array('index')),
	array('label'=>'Create Firma', 'url'=>array('create')),
	array('label'=>'View Firma', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Firma', 'url'=>array('admin')),
);
?>

<h1>Update Firma <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>