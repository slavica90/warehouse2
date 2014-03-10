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

	<p class="note">Полињата означени со <span class="required">*</span> се задолжителни.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Внесете набавена количина'); ?>
		<?php echo $form->textField($model,'bought_products', array('disabled'=>'true')); ?>
                <?php echo $product->measurement; ?>
		<?php echo $form->error($model,'bought_products'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Забелешка'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'product_id', array('value'=>$pr_id)); ?>
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
		<?php echo CHtml::submitButton('Save'); ?>
                <?php echo CHtml::button('Cancel', array('submit' => array('product/view', 'id'=>$pr_id))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

