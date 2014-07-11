<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Листа на сите корисници</h1>

<?php echo CHtml::link('Напредно пребарување','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'summaryText' => 'Приказ: {start} - {end} од вкупно {count} записи',
        'pager' => array('header' => 'Оди на страница: '),
	'columns'=>array(
		array (
                    'header' => 'Ред.бр.',
                    'name'=>'id'),
		array (
                    'header' => 'Име',
                    'name'=>'firstname'),
		array (
                    'header' => 'e-mail',
                    'name'=>'email'),
		array (
                    'header' => 'Корисничко име',
                    'name'=>'username'),
		array (
                    'header' => 'Лозинка',
                    'name'=>'password'),
		array(
                        'header' => 'Прегледај/Измени',
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<div class="add_category">
    
    <?php echo CHtml::link('Додади нов корисник',array('user/create'),
            array('style'=>'float: right')); ?>
</div>