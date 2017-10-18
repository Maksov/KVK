<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Reestr_Operation".
 *
 * @property integer $id
 * @property integer $id_operation
 * @property integer $id_reestr
 *
 * @property Operation $idOperation
 * @property Reestr $idReestr
 * @property Violation[] $violations
 */
class ReestrOperation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Reestr_Operation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_operation', 'id_reestr'], 'required'],
            [['id_operation', 'id_reestr'], 'integer'],
            [['id_operation'], 'exist', 'skipOnError' => true, 'targetClass' => Operation::className(), 'targetAttribute' => ['id_operation' => 'id']],
            [['id_reestr'], 'exist', 'skipOnError' => true, 'targetClass' => Reestr::className(), 'targetAttribute' => ['id_reestr' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_operation' => 'Id Operation',
            'id_reestr' => 'Id Reestr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperation()
    {
        return $this->hasOne(Operation::className(), ['id' => 'id_operation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReestr()
    {
        return $this->hasOne(Reestr::className(), ['id' => 'id_reestr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViolations()
    {
        return $this->hasMany(Violation::className(), ['id_or' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ReestrOperationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReestrOperationQuery(get_called_class());
    }
}
