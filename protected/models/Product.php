<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property string $id
 * @property string $name
 * @property string $code
 * @property integer $purchase_price
 * @property integer $sell_price
 * @property double $amount
 * @property string $measurement
 * @property string $date_create
 * @property string $date_update
 * @property string $date_out
 * @property string $date_in
 * @property string $firma_id
 * @property string $image_url
 * @property integer $instock
 * @property integer $user_id
 */
class Product extends CActiveRecord
{
    
            
         public function getKategorii()
   {
            $siteshtiklirani=$this->categories;
             foreach ($siteshtiklirani as $shtiklirana){
                        $category_array[] = (int)$shtiklirana->id; // za sekoja od selektiranite kategorii se zema id
                   }  
      return $category_array;
   }
   
   public function setKategorii($value){
        $this->kategorii = $value;
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}
        
        
         public function beforeSave() {
             if ($this->isNewRecord) {
                $this->date_create = new CDbExpression('NOW()');
                $this->user_id = Yii::app()->user->id;
                
             }
            $this->date_update = new CDbExpression('NOW()');
 
            return parent::beforeSave();
        }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, code, purchase_price, sell_price, amount, instock, image_url, firma_id', 'required'),
			array('purchase_price, sell_price, instock, user_id, firma_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical', 'integerOnly'=>false,'min'=>0),
			array('name, image_url', 'length', 'max'=>255),
			array('code, measurement', 'length', 'max'=>50),
			array('date_create, date_update, date_out, date_in, kategorii', 'safe'),
                        array('user_id', 'numerical', 'integerOnly'=>true),
                        array('kategorii', 'shtikliraniKategorii'), //se proveruva dali ima stiklirani kategorii
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, code, purchase_price, sell_price, amount, measurement, date_create, date_update, date_out, date_in, image_url, instock, user_id, firma_id', 'safe', 'on'=>'search'),
                        // za prikacuvanje na slika
                        array('image_url', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
      'productCategory' => array(self::HAS_MANY, 'CategoryProduct', 'product_id'),
      'sales' => array(self::HAS_MANY, 'Sale', 'product_id'),
      'supplies' => array(self::HAS_MANY, 'Supply', 'product_id'),
      'categories'=>array(self::MANY_MANY, 'Category',
                'category_product(product_id, category_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'code' => 'Code',
			'purchase_price' => 'Purchase Price',
			'sell_price' => 'Sell Price',
			'amount' => 'Amount',
			'measurement' => 'Measurement',
			'date_create' => 'Date Create',
			'date_update' => 'Date Update',
			'date_out' => 'Date Out',
			'date_in' => 'Date In',
			'firma_id' => 'Firma',
			'image_url' => 'Image Url',
			'instock' => 'Instock',
			'user_id' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('purchase_price',$this->purchase_price);
		$criteria->compare('sell_price',$this->sell_price);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('measurement',$this->measurement,true);
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('date_out',$this->date_out,true);
		$criteria->compare('date_in',$this->date_in,true);
		$criteria->compare('firma_id',$this->firma_id,true);
		$criteria->compare('image_url',$this->image_url,true);
		$criteria->compare('instock',$this->instock);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * get metod za zemanje na site kategorii
         * @return array
         */
        
  
        
        /**
        * proverka dali ima barem edna stiklirana kategorija
        * dokolku nema nitu edna stiklirana kategorija da se pojavi poraka za
        * greska
        * Ovoj 'shtikliraniKategorii' validator e deklariran vo rules().
        */
        public function shtikliraniKategorii($attribute)
        {
            
            if (!is_array($this->$attribute)){
                 $this->addError($attribute, 'Nemate stiklirano kategorii');
            }
        }
}
