<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "violation".
 *
 * @property integer $id
 * @property integer $id_or
 * @property integer $id_organization
 * @property double $weight
 * @property string $status
 *
 * @property Organization $idOrganization
 * @property ReestrOperation $idOr
 */
class Violation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'violation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_or', 'id_organization'], 'integer'],
            [['weight'], 'number'],
            [['status'], 'string'],
            [['id_organization'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['id_organization' => 'id']],
            [['id_or'], 'exist', 'skipOnError' => true, 'targetClass' => ReestrOperation::className(), 'targetAttribute' => ['id_or' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_or' => 'Id Or',
            'id_organization' => 'Организация',
            'weight' => 'Удельный вес',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'id_organization']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOr()
    {
        return $this->hasOne(ReestrOperation::className(), ['id' => 'id_or']);
    }

    public function getReestr()
    {
        return $this->hasOne(Reestr::className(), ['id' => 'id_reestr'])->via('or');
    }

    public function getOperation()
    {
        return $this->hasOne(Operation::className(), ['id' => 'id_operation'])->via('or');
    }

    /**
     * @inheritdoc
     * @return ViolationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ViolationQuery(get_called_class());
    }
}
