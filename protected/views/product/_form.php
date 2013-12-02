<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purchase_price'); ?>
		<?php echo $form->textField($model,'purchase_price'); ?>
		<?php echo $form->error($model,'purchase_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sell_price'); ?>
		<?php echo $form->textField($model,'sell_price'); ?>
		<?php echo $form->error($model,'sell_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'measurement'); ?>
		<?php echo $form->textField($model,'measurement',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'measurement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_create'); ?>
		<?php echo $form->textField($model,'date_create'); ?>
		<?php echo $form->error($model,'date_create'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_update'); ?>
		<?php echo $form->textField($model,'date_update'); ?>
		<?php echo $form->error($model,'date_update'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_out'); ?>
		<?php echo $form->textField($model,'date_out'); ?>
		<?php echo $form->error($model,'date_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_in'); ?>
		<?php echo $form->textField($model,'date_in'); ?>
		<?php echo $form->error($model,'date_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_from'); ?>
		<?php echo $form->textField($model,'order_from',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'order_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_phone'); ?>
		<?php echo $form->textField($model,'order_phone',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'order_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_url'); ?>
		<?php echo $form->textField($model,'image_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'image_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'instock'); ?>
		<?php echo $form->textField($model,'instock'); ?>
		<?php echo $form->error($model,'instock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
  
  <div class="row">
    <?php $categorylist=Category::model()->findAll(); ?>
    <?php foreach($categorylist as $singlecategory){?>
    <label>
    <input type="checkbox" name="chbox[]" value="<?php echo $singlecategory->id ?>" class="checkbox_bookcreate" />
    <?php echo $singlecategory->name; ?>
    </label>
    <?php } ?>
  </div> 

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->