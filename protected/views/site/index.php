<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div>
    <div class="row-fluid">
        <div class="span12">
            <?php echo CHtml::link('Додади категорија',array('category/create'),
            array('style'=>'float: right', 'class' => 'btn btn-mini btn-primary')); ?>
        </div>
    </div>
    
    <div class="page-header">
        <h1>Категории
            <small> листа на сите категории</small>
        </h1>

    </div>
  
<div class="row-fluid">
    <?php if($kategorii != NULL) {?>
       <ul class="thumbnails">
           <?php $i = 0; ?>
    <?php foreach ($kategorii as $kategorija){ $i++; ?>
    <li class="span3">
        <div class="thumbnail grid-category">
         <?php if($kategorija->image_url) {
            $imghtml=CHtml::image($kategorija::categoryPhotoUrl($kategorija->id), 'categoryphoto');
            echo  CHtml::link($imghtml, array('category/allproducts','id'=>$kategorija->id));
         } else { 
            $imghtml=CHtml::image(Yii::app()->getBaseUrl(true).'/images/no_img.png', 'np_photo');
            echo  CHtml::link($imghtml, array('category/allproducts','id'=>$kategorija->id));
   } ?>
              
        <div class="caption">
            <h2><?php echo CHtml::link($kategorija->name,array('category/allproducts',
      'id'=>$kategorija->id)); ?> </h2>
        
            <p>
                <?php echo $kategorija->description;?>
            </p>
        </div>

    </div>
    </li>
    <?php if($i > 0 && $i%4==0){ ?>
       </ul>
    <ul class="thumbnails">
    <?php } ?>
  <?php } ?>
       </ul>
  <?php }else {?>
   <div class="flash-notice">Немате венсено категории!</div>
  <?php } ?>
   </div>
</div>


<div class="row-fluid">
    <div class="page-header">
        <h1> Продукти кои треба да се набават 
            <small>нема доволно на залиха</small></h1>
    </div>
    
    <script>
    $(function ()
    {
        $(".example6").colorbox({iframe:true, innerWidth:425, innerHeight:344});    
    })
</script>

    

<?php $dataProvider=new CActiveDataProvider('Product');

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
    'columns'=>array(
		array(
                    'header' => 'Ред.бр.',
                    'name'=>'id'),
		array(
                    'header' => 'Назив',
                    'name'=>'name'),
		array(
                    'header' => 'Код',
                    'name'=>'code'),
		array(
                    'header' => 'Набавна цена',
                    'name'=>'purchase_price'),
		array(
                    'header' => 'Продажна цена',
                    'name'=>'sell_price'),
		array(
                    'header' => 'Количина',
                    'name'=>'amount'),
                array(
                    'header' => 'Мерка',
                    'name'=>'measurement'),
		/*
		'date_create',
		'date_update',
		'date_out',
		'date_in',
		'firma_id',
		'image_url',
		'instock',
		'user_id',
		*/
		array(
                        'header' => 'Прегледај/Измени',
			'class'=>'CButtonColumn',
                        'template' => '{view} {update} {delete} {copy}',
                        'buttons'=>array(
                                'copy' => array(
                                        'label'=>'Copy', // text label of the button
                                        'url'=>"CHtml::normalizeUrl(array('copy', 'id'=>\$data->id))",
                                        'imageUrl'=>'#',  // image URL of the button. If not set or false, a text link is used
                                        'options' => array('class'=>'copy'), // HTML options for the button
                                ),
                        ),
               ),
                'link'=>array(
                        'header'=>'Браза нарачка',
                        'type'=>'raw',
                        'value'=> 'CHtml::button("Нарачај",array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("controller/action",array("id"=>$data->id))."\'"))',
                ),  
	),
));
?>

     
    <a class='example6' href="http://kostasusinov.edu.mk">Outside Webpage (Iframe)</a>   
    
    <!-- Button to trigger modal -->
<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>

</div>
