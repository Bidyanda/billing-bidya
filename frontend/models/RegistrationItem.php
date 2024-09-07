<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "registration_item".
 *
 * @property int $id
 * @property int $item_id
 * @property int $quantity
 * @property float $rate
 * @property int $registration_id
 *
 * @property Item $item
 * @property Registration $registration
 */
class RegistrationItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registration_item';
    }

    /**
     * {@inheritdoc}
     */
    public $total;
    public function rules()
    {
        return [
            [['item_id', 'quantity', 'rate', 'registration_id'], 'required'],
            [['item_id', 'quantity', 'registration_id'], 'integer'],
            [['rate','total'], 'number'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::class, 'targetAttribute' => ['item_id' => 'id']],
            [['registration_id'], 'exist', 'skipOnError' => true, 'targetClass' => Registration::class, 'targetAttribute' => ['registration_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item',
            'quantity' => 'Quantity',
            'rate' => 'Rate',
            'registration_id' => 'Registration',
            'total'=>'Amount'
        ];
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::class, ['id' => 'item_id']);
    }

    /**
     * Gets query for [[Registration]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegistration()
    {
        return $this->hasOne(Registration::class, ['id' => 'registration_id']);
    }
}
