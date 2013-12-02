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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'purchase_price'); ?>
		<?php echo $form->textField($model,'purchase_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sell_price'); ?>
		<?php echo $form->textField($model,'sell_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'measurement'); ?>
		<?php echo $form->textField($model,'measurement',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_create'); ?>
		<?php echo $form->textField($model,'date_create'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_update'); ?>
		<?php echo $form->textField($model,'date_update'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_out'); ?>
		<?php echo $form->textField($model,'date_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_in'); ?>
		<?php echo $form->textField($model,'date_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_from'); ?>
		<?php echo $form->textField($model,'order_from',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_phone'); ?>
		<?php echo $form->textField($model,'order_phone',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image_url'); ?>
		<?php echo $form->textField($model,'image_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'instock'); ?>
		<?php echo $form->textField($model,'instock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->