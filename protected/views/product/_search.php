<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Име'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Код'); ?>
		<?php echo $form->textField($model,'code',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Набавна цена'); ?>
		<?php echo $form->textField($model,'purchase_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Продажна цена'); ?>
		<?php echo $form->textField($model,'sell_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Количина'); ?>
		<?php echo $form->textField($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Мерка'); ?>
		<?php echo $form->textField($model,'measurement',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Дата(креирање)'); ?>
		<?php echo $form->textField($model,'date_create'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Дата(ажурирање)'); ?>
		<?php echo $form->textField($model,'date_update'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Дата(излез)'); ?>
		<?php echo $form->textField($model,'date_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Дата(влез)'); ?>
		<?php echo $form->textField($model,'date_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Фирма за нарачка'); ?>
		<?php echo $form->textField($model,'firma_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image_url'); ?>
		<?php echo $form->textField($model,'image_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'На залиха'); ?>
		<?php echo $form->textField($model,'instock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Корисник_ID'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Пребарај'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->