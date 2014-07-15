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

<div class="row-fluid">
        <div class="span12">
    <?php echo CHtml::link('Додади нова фирма',array('firma/create'),
            array('style'=>'float: right', 'class' => 'btn btn-mini btn-primary')); ?>
</div>
    </div>
<div class="page-header">
        <h1>Фирми
            <small> листа на сите фирми</small>
        </h1>

    </div>

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
        'summaryText' => 'Приказ: {start} - {end} од вкупно {count} записи',
        'pager' => array('header' => 'Оди на страница: '),
	'columns'=>array(
		array(
                    'header' => 'Ред.бр.',
                    'name'=>'id'),
		array(
                    'header' => 'Назив.',
                    'name'=>'name'),
		array(
                    'header' => 'Адреса',
                    'name'=>'address'),
		array(
                    'header' => 'Телефон',
                    'name'=>'phone_number'),
		array(
                    'header' => 'Координати',
                    'name'=>'lat'),
		array(
                    'header' => 'Координати',
                    'name'=>'lng'),
		array(
                        'header' => 'Прегледај/Измени',
			'class'=>'CButtonColumn',
		),
	),
)); ?>
