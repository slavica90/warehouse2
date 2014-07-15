<?php
/* @var $this SupplyController */
/* @var $data Supply */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Датум на креирање')); ?>:</b>
	<?php echo CHtml::encode($data->date_create); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Број на купени продукти')); ?>:</b>
	<?php echo CHtml::encode($data->bought_products); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Забелешка')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

<!--	<b><?php // echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php // echo CHtml::encode($data->product_id); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('Фирма ID')); ?>:</b>
	<?php echo CHtml::encode($data->firma_id); ?>
	<br />


</div>