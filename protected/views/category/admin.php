<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row-fluid">
        <div class="span12">
    <?php echo CHtml::link('Додади нова категорија',array('category/create'),
            array('style'=>'float: right', 'class' => 'btn btn-mini btn-primary')); ?>
        </div>
</div>

<div class="page-header">
        <h1>Категории
            <small> листа на сите категории</small>
        </h1>

    </div>

<?php echo CHtml::link('Напредно пребарување','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
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
                    'header' => 'Опис',
                    'name'=>'description'),
		array(
                    'header' => 'Датум на креирање',
                    'name'=>'date_create'),
		array(
                    'header' => 'Датум на ажурирање',
                    'name'=>'date_update'),
		/*
                'image_url',
		'user_id',
		*/
		array(
                        'header' => 'Прегледај/Измени',
			'class'=>'CButtonColumn',
		),
	),
)); ?>

 
