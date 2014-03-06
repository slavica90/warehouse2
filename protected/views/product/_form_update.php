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
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Полињата означени со<span class="required">*</span> се задолжителни.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Име'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Код'); ?>
		<?php echo $form->textField($model,'code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Набавна цена'); ?>
		<?php echo $form->textField($model,'purchase_price'); ?>
		<?php echo $form->error($model,'purchase_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Продажна цена'); ?>
		<?php echo $form->textField($model,'sell_price'); ?>
		<?php echo $form->error($model,'sell_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Количина'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Мерка'); ?>
                <?php echo CHtml::activeDropDownList( $model,'measurement', array('l' => 'l (litar)', 'br' => 'br (brojka)', 'm' => 'm (metar)')); ?>
		<?php echo $form->error($model,'measurement'); ?>
       </div>

	<div class="row">
                <?php echo $form->labelEx($model,'Дата(излез)'); ?>
                <?php echo $form->textField($model,'date_out',array('id'=>'datepicker')); ?>
		<?php echo $form->error($model,'date_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Дата(влез)'); ?>
		<?php echo $form->textField($model,'date_in',array('id'=>'datepicker1')); ?>
		<?php echo $form->error($model,'date_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Фирма за нарачка'); ?>
		<?php echo $form->textField($model,'firma_id'); ?>
		<?php echo $form->error($model,'firma_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'image_url'); ?>
                <?php echo $form->fileField($model, 'image_url'); ?>
                <?php echo $form->error($model, 'image_url'); ?>
	</div>
        
       
	<div class="row">
		<?php echo $form->labelEx($model,'На залиха'); ?>
		<?php echo $form->textField($model,'instock'); ?>
		<?php echo $form->error($model,'instock'); ?>
	</div>

	<div class="row">
            <?php $categoryproductitems=  CategoryProduct::model()->findAll('product_id=:product_id', array(":product_id"=>$model->id)); // site stavki od tabelata CategoryProduct
                if($categoryproductitems != NULL){   
                    foreach ($categoryproductitems as $categoryproductitem) {
                           $idkategorii[]= $categoryproductitem->category_id; // niza od site id-a na categorybook
                        }
                }
                else {
                    $idkategorii[]= NULL;
                }?>
            
             <?php $categorylist=Category::model()->findAll(); ?>
            
               <?php foreach($categorylist as $singlecategory){
                    if($idkategorii!= NULL && in_array($singlecategory->id, $idkategorii)){?>
                        <label>
                            <input type="checkbox" name="chbox[]" value="<?php echo $singlecategory->id ?>" checked="true"/>
                            <?php echo $singlecategory->name; ?>
                        </label>
                <?php } else{?>
                        <label>
                            <input type="checkbox" name="chbox[]" value="<?php echo $singlecategory->id ?>" />
                            <?php echo $singlecategory->name; ?>
                        </label>
                <?php } ?>
            <?php } ?>
         
        </div> 

	<div class="row buttons">
		<?php echo CHtml::submitButton('Update'); ?>
	</div>

<?php $this->endWidget(); ?>

             
</div><!-- form -->