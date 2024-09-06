<?php

namespace frontend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "registration".
 *
 * @property int $id
 * @property int $customer_id
 * @property float $total_amt
 * @property float $gst_amt
 * @property float $grand_total
 * @property string $created_at
 * @property int $created_by
 * @property int $record_status
 *
 * @property User $createdBy
 * @property RegistrationItem[] $registrationItems
 */
class Registration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'total_amt', 'gst_amt', 'grand_total', 'created_by'], 'required'],
            [['customer_id', 'created_by', 'record_status'], 'integer'],
            [['total_amt', 'gst_amt', 'grand_total'], 'number'],
            [['created_at'], 'safe'],
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
            'customer_id' => 'Customer ID',
            'total_amt' => 'Total Amt',
            'gst_amt' => 'Gst Amt',
            'grand_total' => 'Grand Total',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'record_status' => 'Record Status',
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

    /**
     * Gets query for [[RegistrationItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrationItems()
    {
        return $this->hasMany(RegistrationItem::class, ['registration_id' => 'id']);
    }
}
