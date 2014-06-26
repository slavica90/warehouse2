<?php

class ProductController extends Controller
{
         /**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array(),
//				'users'=>array('@'),
//			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin','slavica'),
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
            $sales=Sale::model()->findAll('product_id =:product_id', array(':product_id' => $id)); // Pole od objekti od tipot sale
            $supplies=Supply::model()->findAll('product_id =:product_id', array(':product_id' => $id));
            $this->render('view',array(
			'model'=>$this->loadModel($id),
                        'sales'=>$sales,
                        'supplies'=>$supplies,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Product;
                
                $baseUrl = Yii::app()->baseUrl; 
                $cs = Yii::app()->getClientScript();
                $cs->registerScriptFile($baseUrl.'/js/jquery-mousewheel-master/jquery.mousewheel.js');
                $cs->registerScriptFile($baseUrl.'/js/numeric/jquery.numeric.js');
                //$cs->registerScriptFile($baseUrl.'/js/jquery-number-master/jquery.number.js');
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

            if(isset($_POST['Product']))
            {
                    $model->attributes=$_POST['Product'];
                    
                    $fileImage=CUploadedFile::getInstance($model,'image_url');
                     if(!is_null($fileImage)){
                        $model->image_url = $fileImage;
                   }
                   
                    $idNaKategorii=$model->kategorii;
                    
                    if($model->save()) 
                    {
                       
                   if(!empty($fileImage))  // check if uploaded file is set or not
                        {
                            $ds = DIRECTORY_SEPARATOR; // this is `/` or `\` in windows (wamp)
                            $imgdir = dirname(Yii::app()->basePath).$ds.'images'.$ds.'upload'.$ds.'productphotos'.$ds.$model->id;           // path   to images
                        if (!is_dir($imgdir)) {
                            mkdir($imgdir, 0777); // if folder does not exists, than create it 
                            }
                            
                            $filename = $imgdir.$ds.time().'_'.$model->id.'.'.$fileImage->getExtensionName();
                            $fileImage->saveAs($filename); 
                         }
                            
                        $idNewProduct=$model->id;
                        foreach ($idNaKategorii as $idNaKategorija)
                        {
                        $novZapis=new CategoryProduct; //kreirame nov zapis od tabelata CategoryProduct
                        $novZapis->product_id=$idNewProduct;
                        $novZapis->category_id=$idNaKategorija;
                        $novZapis->save();
                        }
         
                        $this->redirect(array('view','id'=>$model->id));
                    }
            }

            $this->render('create',array(
			'model'=>$model,
		));
            Yii::app()->clientScript->registerCoreScript('jquery.ui');
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

                $baseUrl = Yii::app()->baseUrl; 
                $cs = Yii::app()->getClientScript();
                $cs->registerScriptFile($baseUrl.'/js/jquery-mousewheel-master/jquery.mousewheel.js');
                $cs->registerScriptFile($baseUrl.'/js/numeric/jquery.numeric.js');
                //$cs->registerScriptFile($baseUrl.'/js/jquery-number-master/jquery.number.js');
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
                   $fileImage=CUploadedFile::getInstance($model,'image_url');
                   if(!is_null($fileImage)){
                        $model->image_url = $fileImage;
                   }
                   
                   $idNaKategorii=$model->kategorii;                              
                    $model->attributes=$_POST['Product'];
                    
                    if($model->save())
                    {
                        if(!empty($fileImage))  // check if uploaded file is set or not
                        {
                            $ds = DIRECTORY_SEPARATOR; // this is `/` or `\` in windows (wamp)
                            $imgdir = dirname(Yii::app()->basePath).$ds.'images'.$ds.'upload'.$ds.'productphotos'.$ds.$model->id;           // path   to images
                            if (!is_dir($imgdir)) {
                            mkdir($imgdir, 0777); // if folder does not exists, than create it 
                            }
                            
                            $filename = $imgdir.$ds.time().'_'.$model->id.'.'.$fileImage->getExtensionName();
                            $fileImage->saveAs($filename); 
                         }
                        $idProduct=$model->id;
                        CategoryProduct::model()->deleteAll('product_id=:product_id', array(":product_id"=>$idProduct)); // se brisat site stavki od categoryProduct so product_id=id na konkretniot product
                        foreach ($idNaKategorii as $idNaKategorija){
                            $novZapis=new CategoryProduct; //kreirame nov zapis od tabelata CategoryProduct
                            $novZapis->product_id=$idProduct;
                            $novZapis->category_id=$idNaKategorija;
                            $novZapis->save();
                        }
                         $this->redirect(array('view','id'=>$model->id));
                      }
                    }
		$this->render('update',array(
			'model'=>$model,
		));
                
                Yii::app()->clientScript->registerCoreScript('jquery.ui');
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
		$dataProvider=new CActiveDataProvider('Product');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Product('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Product the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Product $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
