<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Operation".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_edit
 * @property integer $author_id
 *
 * @property Karta[] $kartas
 * @property Reestr[] $reestrs
 */
class Operation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Operation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['date_create', 'date_edit'], 'safe'],
            [['author_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Наименование операции',
            'date_create' => 'Дата создания',
            'date_edit' => 'Дата редактирования',
            'author_id' => 'Автор',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getOperationReestrs()
    {
        return $this->hasMany(ReestrOperation::className(), ['id_operation' => 'id']);

    }


    public function getReestrs()
    {
        return $this->hasMany(Reestr::className(), ['id' => 'id_reestr'])->via('operationReestrs');
    }

    public function getKartas()
    {
        return $this->hasMany(Karta::className(), ['id_operation'=>'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    /**
     * @inheritdoc
     * @return OperationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OperationQuery(get_called_class());
    }
}
