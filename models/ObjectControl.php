<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Object_control".
 *
 * @property integer $id
 * @property string $period_operation
 * @property string $name
 * @property string $person
 * @property string $event
 * @property string $method
 * @property string $kind
 * @property string $period_control
 *
 * @property Karta[] $kartas
 */
class ObjectControl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Object_control';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['period_operation', 'name', 'person', 'event', 'method', 'kind', 'period_control'], 'required'],
            [['period_operation', 'name', 'person', 'event', 'method', 'kind', 'period_control'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'period_operation' => 'Периодичность выполнения',
            'name' => 'Контрольная процедура',
            'person' => 'Должностное лицо, осуществляющее контрольную процедуру',
            'event' => 'Контрольное мероприятие',
            'method' => 'Метод контроля',
            'kind' => 'Вид/способ контроля',
            'period_control' => 'Срок/периодичность контрольных процедур',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKartas()
    {
        return $this->hasMany(Karta::className(), ['id_object' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ObjectControlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ObjectControlQuery(get_called_class());
    }
}
