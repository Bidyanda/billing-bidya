<?php

namespace frontend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string $name
 * @property float $rate
 * @property string $created_at
 * @property int $created_by
 * @property int $record_status
 *
 * @property User $createdBy
 * @property RegistrationItem[] $registrationItems
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'rate', 'created_by'], 'required'],
            [['rate'], 'number'],
            [['created_at'], 'safe'],
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
            'name' => 'Item Name',
            'rate' => 'Item Rate',
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
        return $this->hasMany(RegistrationItem::class, ['item_id' => 'id']);
    }
}
