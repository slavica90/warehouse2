<?php
/* @var $this SupplyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Supplies',
);

$this->menu=array(
	array('label'=>'Create Supply', 'url'=>array('create')),
	array('label'=>'Manage Supply', 'url'=>array('admin')),
);
?>

<h1>Supplies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
