<?php

namespace frontend\models;
use common\models\User;
use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $created_at
 * @property int $created_by
 * @property int $record_status
 *
 * @property User $createdBy
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public $total,$tax,$grand_total;
    public function rules()
    {
        return [
            [['name', 'address', 'created_by'], 'required'],
            [['address'], 'string'],
            [['created_at','mobile_no','total','tax','grand_total'], 'safe'],
            [['created_by', 'record_status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Customer Name/Company Name',
            'address' => 'Address',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'record_status' => 'Record Status',
            'mobile_no' => 'Mobile No'
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }
}
