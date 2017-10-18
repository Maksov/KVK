<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Organization".
 *
 * @property integer $id
 * @property integer $sono
 * @property string $name
 *
 * @property Karta[] $kartas
 * @property Violation[] $violations
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sono', 'name'], 'required'],
            [['sono'], 'integer'],
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           // 'id' => 'ID',
            'sono' => 'СОНО',
            'name' => 'Наименование НО',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKartas()
    {
        return $this->hasMany(Karta::className(), ['id_organization' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViolations()
    {
        return $this->hasMany(Violation::className(), ['id_organization' => 'id']);
    }

    /**
     * @inheritdoc
     * @return OrganizationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrganizationQuery(get_called_class());
    }
}
