  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>
<div class="back_link">
<?php echo CHtml::link('Врати се назад',Yii::app()->request->urlReferrer); ?>
</div>
<div class="product_details">
<h1>View Product #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'purchase_price',
		'sell_price',
		'amount',
		'measurement',
		'date_create',
		'date_update',
		'date_out',
		'date_in',
		'firma_id',
		'image_url',
		'instock',
		'user_id',
	),
)); ?>
</div>
<div class="product_buttons">
    <?php echo CHtml::link("Продажба на продукт",array('sale/create',
      'p_id'=>$model->id)); ?>
    <?php echo CHtml::link("Набавка на продукт",array('supply/create',
      'p_id'=>$model->id)); ?>
    <?php echo CHtml::link("Измени го продуктот",array('product/update',
      'id'=>$model->id)); ?>
       
</div>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Продажба</a></li>
    <li><a href="#tabs-2">Набавка</a></li>
  </ul>
  <div id="tabs-1">
    <div>
       
    <?php if($sales != NULL) {?>

    <?php foreach ($sales as $sale){?>
            <div>
            <p> saleID: <?php echo $sale->id;?></p>
            <p> Date Create: <?php echo $sale->date_create;?></p>
            <p> Sold Products: <?php echo $sale->sold_products;?></p>
            <p> Note: <?php echo $sale->comment;?></p>
            <p> ProductID: <?php echo $sale->product_id;?></p>
           <?php echo CHtml::link("Измени",array('sale/update',
      'id'=>$sale->id)); ?>
            <hr>
        </div>
    <?php } ?>
    <?php }else {?>
        <div class="flash-notice">Нема продажби за овој продукт!</div>
     <?php } ?>
    </div>
  </div>
  <div id="tabs-2">
    <div>
    <?php if($supplies != NULL) {?>

    <?php foreach ($supplies as $supply){?>
            <div>
            <p> supplyID: <?php echo $supply->id;?></p>
            <p> Date Create: <?php echo $supply->date_create;?></p>
            <p> Bought Products: <?php echo $supply->bought_products;?></p>
            <p> Note: <?php echo $supply->comment;?></p>
            <p> ProductID: <?php echo $supply->product_id;?></p>
            <p> CompanyID: <?php echo $supply->firma_id;?></p>
            <?php echo CHtml::link("Измени",array('supply/update',
      'id'=>$supply->id)); ?>
            <hr>
        </div>
        <?php } ?>
        <?php }else {?>
        <div class="flash-notice">Нема набавки за овој продукт!</div>
     <?php } ?>
    </div>
  </div>
 </div>