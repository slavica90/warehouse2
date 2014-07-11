<?php
/* @var $this FirmaController */
/* @var $model Firma */

$this->breadcrumbs=array(
	'Firmas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Firma', 'url'=>array('index')),
	array('label'=>'Create Firma', 'url'=>array('create')),
	array('label'=>'Update Firma', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Firma', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Firma', 'url'=>array('admin')),
);
?>

<h1>Преглед на фирмата: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'address',
		'phone_number',
		'lat',
		'lng',
	),
)); ?>
<div>
    <?php echo CHtml::link("Ажурирај ја фирмата",array('firma/update',
      'id'=>$model->id), array('style'=>'float: right')); ?>
       
</div>

<div class="mapWrap">
            <div id="map"></div>            
</div>


 <script type="text/javascript">
                var lat = <?php echo $model->lat; ?>;  //статички дефинирана латитуда
                var lng = <?php echo $model->lng; ?>;  //статички дефинирана лонгитуда
                var map; //вариајбла која ќе ја употребуваме за дефинирање на објектот од тип Map
                var myLatlng = new google.maps.LatLng(lat,lng);  //објект од типот LatLng пар со кој дефинираме точки односно позиции на мапата
                
                function initMap(){
                    var mapOptions = {
                        zoom: 8, //зумирана мапа на почетокот
                        center: myLatlng, //кога ќе се покаже мапата , каде да биде центарот на вчитаната мапа
                        mapTypeId: google.maps.MapTypeId.ROADMAP  // од кој тип да биде мапата која ќе биде покажана при вчитување, инаку постојат повеќе видови
                        };// опциите со кој ја сетираме мапата при вчитување
                        
                    //го сетираме објектот од тип Map
                    //првиот аргумент е елементот кој ќе ја прикажува мапата
                    //вториот аргумент се опциите кој се подесени за мапата (доколку немаме, се поставуваат стандардните опции
                    map = new google.maps.Map(document.getElementById('map'), mapOptions); 
                    
                    
                    //го дефнираме маркерот кој ќе биде поставен на мапата
                    var marker = new google.maps.Marker({
                        position: myLatlng, //позиција на маркерот на мапата
                        map: map,  //на која мапа ќе биде поставен маркерот, мапата предходно мора да биде дефинирана
                        title: 'Hello World!' //текст кој ќе се прикажува кога со гувчето ќе поминеме преку маркерот
                    }); 
                }
                
                $(document).ready(function(){
                    initMap();
                });
            </script>