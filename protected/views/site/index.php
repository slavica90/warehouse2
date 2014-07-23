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
    'dataProvider' => $produkti->searchnarachka(),
     'id' => 'gridid',
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
                        'template' => '{view} {update}',
                      ),
        
          array(
                        'header'=>'Брза Нарачка',
                        'type'=>'raw',
                        'value'=> 'CHtml::link("<img src=\'img/icons/brza_naracka.png\' />","#myModal", array("rel"=> $data->id.",".$data->purchase_price.",".$data->name , "role"=>"button", "data-toggle" => "modal", "class" => "kosnicka" ))',
                ),
        
                
	),
));
?>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Нарачка за: <div class="ime_produkt" style="display:inline"> </div> </h3>
  </div>
  <div class="modal-body">
      <input type="hidden" value="" id="skrieno_pole">
      Внесете набавена количина: <br> <input type="text" value="" id="kolicina_brza_naracka" name="kol"><br>
      Забелешка: <br> <input type="text" name="zabeleska" value="" id="zabeleska_brza_naracka"><br>
      Фирма за набавка: <br> 
      <select id="firma_brza_naracka">
          <?php foreach ($firmi as $firma) { ?>
        <option value="<?php echo $firma->id?>"><?php echo $firma->name ?></option>
          <?php } ?>
       </select> <br> 
      Сума за нарачаните продукти: <br> <input type="text" value="" id="suma_brza_naracka" disabled="true">  <br>    
      <div id="info_status"></div>
  </div>
  <div class="modal-footer">
    <button id="zatvori_kopce" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button id="smotano_kopce" class="btn btn-primary">Save changes</button>
  </div>
</div>

</div>


<script type="text/javascript">
$(document).ready(function(){
     var spinner = $( "#kolicina_brza_naracka" ).spinner({
      step: 0.1,
      numberFormat: "n",
      page: 0.1
    });
    spinner.spinner( "value", 0 );
    $("#kolicina_brza_naracka").numeric();
    
    $(".kosnicka").click(function(){
        $('#skrieno_pole').val($(this).attr('rel').split(",")[0]);
        $('.ime_produkt').text($(this).attr('rel').split(",")[2]);
        var nabavna_cena = $(this).attr('rel').split(",")[1];
        
        $( "#kolicina_brza_naracka" ).change(function() {
           var suma = $( "#kolicina_brza_naracka" ).val() * nabavna_cena;
           $("#suma_brza_naracka").val(suma);
          });
          
          $( "#kolicina_brza_naracka" ).on( "spinstop", function() {
              var suma1 = $( "#kolicina_brza_naracka" ).val() * nabavna_cena;
                $("#suma_brza_naracka").val(suma1);
          });
    });
    
     $('#smotano_kopce').on('click', function(){
         var url_do_akcijata =' <?php echo Yii::app()->createAbsoluteUrl("supply/brzanaracka")?>';
            var id_produkt = $('#skrieno_pole').val();
            var nab_kol = $( "#kolicina_brza_naracka" ).val();
            var zabeleska = $ ("#zabeleska_brza_naracka").val();
            var firma_id = $( "#firma_brza_naracka" ).val();
     
     $.post(url_do_akcijata, 
             { id_produkt:id_produkt, 
                 nab_kol:nab_kol, 
                 zabeleska:zabeleska,
                 firma_id:firma_id
             },
              function(data){ $("#info_status").text(data.status);
              },
              "json");
           
              
          });
          
           $('#smotano_kopce').on('click', function(){
            $.fn.yiiGridView.update("gridid");
             });

});
</script>
