<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Karta".
 *
 * @property integer $id
 * @property integer $id_operation
 * @property string $person
 * @property integer $id_organization
 * @property string $period_operation
 * @property string $person_control
 * @property string $name_procedure
 * @property string $event
 * @property string $method
 * @property string $kind
 * @property string $period_control
 * @property string $date_create
 * @property string $date_edit
 *
 * @property Operation $idOperation
 * @property Organization $idOrganization
 */
class Karta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Karta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_operation', 'id_organization'], 'integer'],
            [['id_operation', 'id_organization','person','period_operation', 'person_control', 'name_procedure', 'event', 'method', 'kind', 'period_control'], 'required'],
            [['person', 'period_operation', 'person_control', 'name_procedure', 'event', 'method', 'kind', 'period_control'], 'string'],
            [['date_create', 'date_edit'], 'safe'],
            [['id_operation'], 'exist', 'skipOnError' => true, 'targetClass' => Operation::className(), 'targetAttribute' => ['id_operation' => 'id']],
            [['id_organization'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['id_organization' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_operation' => 'Операция',
            'person' => 'Должностное лицо, ответственное за выполнение операции',
            'id_organization' => 'Налоговый орган',
            'period_operation' => 'Периодичность выполнения операции',
            'person_control' => 'Должностное лицо, выполняющее контрольную процедуру',
            'name_procedure' => 'Контрольная процедура',
            'event' => 'Контрольное мероприятие',
            'method' => 'Метод контроля',
            'kind' => 'Вид\способ контроля',
            'period_control' => 'Периодичность выполнения',
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
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'id_organization']);
    }

    public function getOperationReestrs()
    {
        return $this->hasOne(ReestrOperation::className(), ['id_operation' => 'id_operation']);

    }
    public function getReestrs()
    {
        return $this->hasOne(Reestr::className(), ['id' => 'id_reestr'])->via('operationReestrs');
    }

    /**
     * @inheritdoc
     * @return KartaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KartaQuery(get_called_class());
    }
}
