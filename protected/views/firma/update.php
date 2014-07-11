<?php
/* @var $this FirmaController */
/* @var $model Firma */

$this->breadcrumbs=array(
	'Firmas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Firma', 'url'=>array('index')),
	array('label'=>'Create Firma', 'url'=>array('create')),
	array('label'=>'View Firma', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Firma', 'url'=>array('admin')),
);
?>

<h1>Ажурирај фирма: <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<div class="mapWrap">
            <div id="map"></div>            
</div>

 <script type="text/javascript">
                var lat = <?php echo $model->lat; ?>;
                var lng = <?php echo $model->lng; ?>;
                var map;
                var myLatlng = new google.maps.LatLng(lat,lng);
                var marker;
                
                function initMap(){
                    var mapOptions = {
                        zoom: 8,
                        center: new google.maps.LatLng(lat, lng),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                        };// opcii koi gi podesuvame za 
                    map = new google.maps.Map(document.getElementById('map'), mapOptions);
                    
                    //го дефнираме маркерот кој ќе биде поставен на мапата
                    var marker = new google.maps.Marker({
                        position: myLatlng, //позиција на маркерот на мапата
                        map: map,  //на која мапа ќе биде поставен маркерот, мапата предходно мора да биде дефинирана
                        title: 'Локација на фирма!' //текст кој ќе се прикажува кога со гувчето ќе поминеме преку маркерот
                    }); 
                    
                    //овде додаваме евент кој ке активира со кликање на мапата
                    google.maps.event.addListener(map, 'click', function(e) {
                        
                        //доколку постои маркер , изврши само промена на неговата позиција
                        if(marker){
                            marker.setOptions({
                                position: e.latLng,
                                animation: google.maps.Animation.DROP
                            });
                        }else{// во спротивно , додај нов маркер на мапата
                            marker = new google.maps.Marker({
                                position: e.latLng,
                                map: map,
                                title: 'Hello World!',
                                animation: google.maps.Animation.DROP
                            }); 
                        }
                       
                        // додатни информации за позицијата на која е поставен маркерот
                        $('#Firma_lat').val(e.latLng.lat());
                        $('#Firma_lng').val(e.latLng.lng());
                        $('#Firma_address').val(google.maps.latlng_to_address('40.714224,-73.961452'));
                        
                    });
                }
                
                $(document).ready(function(){
                    initMap();
                });
            </script>