<?php

/**
 * This is the model class for table "stock_moves".
 *
 * The followings are the available columns in table 'stock_moves':
 * @property string $id
 * @property string $date
 * @property string $user_id
 * @property string $from_id
 * @property string $to_id
 *
 * The followings are the available model relations:
 * @property StockMoveLines[] $stockMoveLines
 * @property Stocks $to
 * @property Users $user
 * @property Stocks $from
 */
class StockMoves extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StockMoves the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stock_moves';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, user_id, from_id, to_id', 'required', 'message' => 'Поле {attribute} не может быть пустым'),
			array('user_id, from_id, to_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, user_id, from_id, to_id', 'safe', 'on'=>'search'),
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
			'stockMoveLines' => array(self::HAS_MANY, 'StockMoveLines', 'move_id'),
			'to' => array(self::BELONGS_TO, 'Stocks', 'to_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'from' => array(self::BELONGS_TO, 'Stocks', 'from_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Дата',
			'user_id' => 'Создатель перемещения',
			'from_id' => 'Откуда',
			'to_id' => 'Куда',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('from_id',$this->from_id,true);
		$criteria->compare('to_id',$this->to_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}