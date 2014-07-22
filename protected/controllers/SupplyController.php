<?php

class SupplyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'brzanaracka'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Supply;
       
                $baseUrl = Yii::app()->baseUrl; 
                $cs = Yii::app()->getClientScript();
                $cs->registerScriptFile($baseUrl.'/js/jquery-mousewheel-master/jquery.mousewheel.js');
                $cs->registerScriptFile($baseUrl.'/js/numeric/jquery.numeric.js');
                Yii::app()->clientScript->registerCoreScript('jquery.ui');
                //$cs->registerScriptFile($baseUrl.'/js/jquery-number-master/jquery.number.js');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                 if(isset($_GET['p_id']))
                {
                        $pr_id=$_GET['p_id'];
                        $product = Product::model()->findByPk($pr_id);
                        if(isset($_POST['Supply']))
                        {
                            $model->attributes=$_POST['Supply'];
                            $bought=(float) $model->bought_products;
                            $total=(float) $product->amount;
                            $result = $total+$bought;
                            $product->amount = (string)$result;
                            if($result < $product->warning_amount ){ // moze da ima nabavka na produkt ama pak da nad granicnata vrednost
                                   $product->instock = 0; 
                             }
                             else {
                                 $product->instock = 1; 
                             }
                            
                            $product->save() ;
                            if($model->save()) 
                                 $this->redirect(array('product/view','id'=>$pr_id));
                         }
		}else 
                {      
                    $this->redirect(array('site/index'));   
                }
                
                $this->render('create',array(
			'model'=>$model,'pr_id'=>$pr_id, 'product'=>$product
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

                              
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $pr_id=$model->product_id;
                
//                if(isset($_GET['p_id']))
//                {
//                    $pr_id=$_GET['p_id'];
//                    $product = Product::model()->findByPk($pr_id);
//                    $product->amount = $product->amount+$model->bought_products;
//                    $product->save() ;
//                }
//                 else if
//                {   
//                     
//                    $this->redirect(array('site/index'));   
//                }
                $product = Product::model()->findByPk($pr_id);
		if(isset($_POST['Supply']))
		{
			$model->attributes=$_POST['Supply'];
			if($model->save())
				$this->redirect(array('product/view','id'=>$pr_id));
		}

		$this->render('update',array(
			'model'=>$model, 'pr_id'=>$pr_id,'product'=>$product
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Supply');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Supply('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Supply']))
			$model->attributes=$_GET['Supply'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
       /**
        * Akcija za brza naracka
        */
        public function actionBrzanaracka()
	{
            $model=new Supply;
       
               // $baseUrl = Yii::app()->baseUrl; 
              //  $cs = Yii::app()->getClientScript();
               // $cs->registerScriptFile($baseUrl.'/js/jquery-mousewheel-master/jquery.mousewheel.js');
              //  $cs->registerScriptFile($baseUrl.'/js/numeric/jquery.numeric.js');
              //  Yii::app()->clientScript->registerCoreScript('jquery.ui');
                //$cs->registerScriptFile($baseUrl.'/js/jquery-number-master/jquery.number.js');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                 if(isset($_POST["id_produkt"])&&isset($_POST["nab_kol"])&&isset($_POST["zabeleska"])&&isset($_POST["firma_id"]))
                {
                        $pr_id=$_POST["id_produkt"];
                        $nabavena_kolicina = $_POST["nab_kol"];
                        $zabeleska_naracka = $_POST["zabeleska"];
                        $firmaid = $_POST["firma_id"];
                        
                        $product = Product::model()->findByPk($pr_id);
                      
                            $model->product_id = $pr_id;
                            $model->bought_products = $nabavena_kolicina;
                            $model->comment = $zabeleska_naracka;
                            $model->firma_id = $firmaid;
                            
                           // $model->attributes=$_POST['Supply'];
                            $bought=(float) $nabavena_kolicina;
                            $total=(float) $product->amount;
                            $result = $total+$bought;
                            $product->amount = (string)$result;
                            if($result < $product->warning_amount ){ // moze da ima nabavka na produkt ama pak da nad granicnata vrednost
                                   $product->instock = 0; 
                             }
                             else {
                                 $product->instock = 1; 
                             }
                            
                            $product->save() ;
                            $model->save();
                           echo json_encode(array("status"=>"Uspesno kreirana naracka"));
                            Yii::app()->end();
                            
                }
                else {      
                      echo json_encode(array("status"=>"Ne moze da se kreira narackata"));
                        Yii::app()->end();
                }
                
             
            
//             if (isset($_POST["prv"])&&isset($_POST["op"])&&isset($_POST["vtor"])){
//                 $productid = $_POST["id_produkt"];
//                 $nabavena_kolicina = $_POST["nab_kol"];
//                 $zabeleska_naracka = $_POST["zabeleska"];
//                 $firmaid = $_POST["firma_id"];
            //    $rezultat = "0";
             
              
          
   
//            }


	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Supply the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Supply::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Supply $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='supply-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
