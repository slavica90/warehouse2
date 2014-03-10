<?php
/* @var $this SaleController */
/* @var $model Sale */
/* @var $form CActiveForm */
?>
 <script type="text/javascript">
$(document).ready(function(){
     var spinner = $( "#Sale_sold_products" ).spinner();
    spinner.spinner( "value", 0 );
    $('#Sale_sold_products').number( true, 2 );
    
});
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sale-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sold_products'); ?>
		<?php echo $form->textField($model,'sold_products'); ?>
		<?php echo $form->error($model,'sold_products'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'product_id', array('value'=>$pr_id)); ?>
		<?php echo $form->error($model,'product_id'); ?>
        </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->