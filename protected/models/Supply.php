<?php

/**
 * This is the model class for table "supply".
 *
 * The followings are the available columns in table 'supply':
 * @property string $id
 * @property string $date_create
 * @property integer $bought_products
 * @property string $comment
 * @property integer $product_id
 * @property integer $firma_id
 */
class Supply extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supply';
	}

        public function beforeSave() {
             if ($this->isNewRecord) {
                $this->date_create = new CDbExpression('NOW()');
             }
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
			array('bought_products, firma_id', 'required'),
			array('product_id, firma_id', 'numerical', 'integerOnly'=>true),
                        array('bought_products', 'numerical'),
			array('comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date_create, bought_products, comment, product_id, firma_id', 'safe', 'on'=>'search'),
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
                    'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
                    'firma' => array(self::BELONGS_TO, 'Firma', 'firma_id'),
                );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date_create' => 'Date Create',
			'bought_products' => 'Bought Products',
			'comment' => 'Comment',
			'product_id' => 'Product',
			'firma_id' => 'Firma',
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
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('bought_products',$this->bought_products);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('firma_id',$this->firma_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Supply the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}