<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "company_details".
 *
 * @property int $id
 * @property string $company_name
 * @property string $address
 * @property string $mobile_no
 * @property string|null $alt_mobile_no
 * @property string $email
 * @property string $contact_name
 * @property string $logo
 * @property string|null $account_holder_name
 * @property string|null $account_no
 * @property string|null $ifsc_code
 * @property string|null $branch_name
 * @property string|null $gpay_no
 * @property string $created_at
 */
class CompanyDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name', 'address', 'mobile_no', 'email', 'contact_name', 'logo'], 'required'],
            [['address'], 'string'],
            [['created_at'], 'safe'],
            [['company_name', 'email', 'contact_name', 'logo', 'account_holder_name', 'branch_name'], 'string', 'max' => 255],
            [['mobile_no', 'alt_mobile_no', 'gpay_no'], 'string', 'max' => 10],
            [['account_no'], 'string', 'max' => 30],
            [['ifsc_code'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'address' => 'Address',
            'mobile_no' => 'Mobile No',
            'alt_mobile_no' => 'Alt Mobile No',
            'email' => 'Email',
            'contact_name' => 'Contact Name',
            'logo' => 'Logo',
            'account_holder_name' => 'Account Holder Name',
            'account_no' => 'Account No',
            'ifsc_code' => 'Ifsc Code',
            'branch_name' => 'Branch Name',
            'gpay_no' => 'Gpay No',
            'created_at' => 'Created At',
        ];
    }
}
