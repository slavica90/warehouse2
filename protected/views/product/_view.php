<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Име')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Код')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Набавна цена')); ?>:</b>
	<?php echo CHtml::encode($data->purchase_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Продажна цена')); ?>:</b>
	<?php echo CHtml::encode($data->sell_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Количина')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('Мерка')); ?>:</b>
	<?php echo CHtml::encode($data->measurement); ?>
	<br />

         <b><?php echo CHtml::encode($data->getAttributeLabel('Количина за предупредување')); ?>:</b>
	<?php echo CHtml::encode($data->warning_amount); ?>
	<br />     
        
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_create')); ?>:</b>
	<?php echo CHtml::encode($data->date_create); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_update')); ?>:</b>
	<?php echo CHtml::encode($data->date_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_out')); ?>:</b>
	<?php echo CHtml::encode($data->date_out); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_in')); ?>:</b>
	<?php echo CHtml::encode($data->date_in); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firma_id')); ?>:</b>
	<?php echo CHtml::encode($data->firma_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_url')); ?>:</b>
	<?php echo CHtml::encode($data->image_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('instock')); ?>:</b>
	<?php echo CHtml::encode($data->instock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

</div>