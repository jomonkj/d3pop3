<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace d3yii2\d3pop3\models\base;

use Yii;

/**
 * This is the base-model class for table "d3pop3_emails".
 *
 * @property string $id
 * @property string $model_name
 * @property string $model_id
 * @property string $receive_datetime
 * @property string $read_datetime
 * @property string $subject
 * @property string $body
 * @property string $from
 * @property string $to
 * @property string $cc
 * @property string $status
 * @property string $aliasModel
 */
abstract class D3pop3Email extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */
    const STATUS_NEW = 'NEW';
    const STATUS_READ = 'READ';
    const STATUS_DELETED = 'DELETED';
    var $enum_labels = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd3pop3_emails';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_name', 'model_id', 'receive_datetime'], 'required'],
            [['model_id'], 'integer'],
            [['receive_datetime', 'read_datetime'], 'safe'],
            [['subject', 'body', 'to', 'cc', 'status'], 'string'],
            [['model_name'], 'string', 'max' => 50],
            [['from'], 'string', 'max' => 256],
            ['status', 'in', 'range' => [
                    self::STATUS_NEW,
                    self::STATUS_READ,
                    self::STATUS_DELETED,
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('d3pop3', 'ID'),
            'model_name' => Yii::t('d3pop3', 'Model'),
            'model_id' => Yii::t('d3pop3', 'Model Record'),
            'receive_datetime' => Yii::t('d3pop3', 'Received'),
            'read_datetime' => Yii::t('d3pop3', 'Read'),
            'subject' => Yii::t('d3pop3', 'Subject'),
            'body' => Yii::t('d3pop3', 'Body'),
            'from' => Yii::t('d3pop3', 'From'),
            'to' => Yii::t('d3pop3', 'To'),
            'cc' => Yii::t('d3pop3', 'CC'),
            'status' => Yii::t('d3pop3', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'model_name' => Yii::t('d3pop3', 'Model'),
            'model_id' => Yii::t('d3pop3', 'Model Record'),
            'receive_datetime' => Yii::t('d3pop3', 'Received'),
            'read_datetime' => Yii::t('d3pop3', 'Read'),
            'subject' => Yii::t('d3pop3', 'Subject'),
            'body' => Yii::t('d3pop3', 'Body'),
            'from' => Yii::t('d3pop3', 'From'),
            'to' => Yii::t('d3pop3', 'To'),
            'cc' => Yii::t('d3pop3', 'CC'),
            'status' => Yii::t('d3pop3', 'Status'),
        ]);
    }




    /**
     * get column status enum value label
     * @param string $value
     * @return string
     */
    public static function getStatusValueLabel($value){
        $labels = self::optsStatus();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column status ENUM value labels
     * @return array
     */
    public static function optsStatus()
    {
        return [
            self::STATUS_NEW => Yii::t('d3pop3', self::STATUS_NEW),
            self::STATUS_READ => Yii::t('d3pop3', self::STATUS_READ),
            self::STATUS_DELETED => Yii::t('d3pop3', self::STATUS_DELETED),
        ];
    }

}
