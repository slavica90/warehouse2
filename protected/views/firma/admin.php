<?php
/* @var $this FirmaController */
/* @var $model Firma */

$this->breadcrumbs=array(
	'Firmas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Firma', 'url'=>array('index')),
	array('label'=>'Create Firma', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#firma-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Листа на сите фирми</h1>

<?php echo CHtml::link('Напредно пребарување','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'firma-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'address',
		'phone_number',
		'lat',
		'lng',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<div class="add_category">
    
    <?php echo CHtml::link('Додади нова фирма',array('firma/create'),
            array('style'=>'float: right')); ?>
</div>