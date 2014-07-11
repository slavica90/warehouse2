<?php
/* @var $this FirmaController */
/* @var $model Firma */
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
		<?php echo $form->label($model,'Адреса'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Телефон'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Пребарај'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->