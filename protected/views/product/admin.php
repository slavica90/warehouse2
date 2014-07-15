<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row-fluid">
        <div class="span12">
    <?php echo CHtml::link('Додади нов продукт',array('product/create'),
            array('style'=>'float: right', 'class' => 'btn btn-mini btn-primary')); ?>
</div>
    </div>

<div class="page-header">
        <h1>Продукти
            <small> листа на сите продукти</small>
        </h1>

    </div>

<?php echo CHtml::link('Напредно пребарување','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'summaryText' => 'Приказ: {start} - {end} од вкупно {count} записи',
        'pager' => array('header' => 'Оди на страница: '),
	'columns'=>array(
		array(
                    'header' => 'Ред.бр.',
                    'name'=>'id'),
		array(
                    'header' => 'Назив',
                    'name'=>'name'),
		array(
                    'header' => 'Код',
                    'name'=>'code'),
		array(
                    'header' => 'Набавна цена',
                    'name'=>'purchase_price'),
		array(
                    'header' => 'Продажна цена',
                    'name'=>'sell_price'),
		array(
                    'header' => 'Количина',
                    'name'=>'amount'),
                array(
                    'header' => 'Мерка',
                    'name'=>'measurement'),
		/*
		'date_create',
		'date_update',
		'date_out',
		'date_in',
		'firma_id',
		'image_url',
		'instock',
		'user_id',
		*/
		array(
                        'header' => 'Прегледај/Измени',
			'class'=>'CButtonColumn',
		),
	),
)); ?>

