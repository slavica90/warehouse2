<?php
/* @var $this SupplyController */
/* @var $model Supply */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supply-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date_create'); ?>
		<?php echo $form->textField($model,'date_create'); ?>
		<?php echo $form->error($model,'date_create'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bought_products'); ?>
		<?php echo $form->textField($model,'bought_products'); ?>
		<?php echo $form->error($model,'bought_products'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_id'); ?>
		<?php echo $form->textField($model,'product_id'); ?>
		<?php echo $form->error($model,'product_id'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'Фирма за набавка'); ?>
                <?php 
                $allcompanies=CHtml::listData(Firma::model()->findAll(), 'id', 'name');
                echo CHtml::activeDropDownList( $model,'firma_id', $allcompanies,array('empty'=>'Изберете фирма за нарачка')); ; ?>
		<?php echo $form->error($model,'firma_id'); ?>
       </div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->