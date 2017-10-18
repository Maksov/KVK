<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Reestr".
 *
 * @property integer $id
 * @property string $code_v
 * @property string $point_v
 * @property string $name_v
 * @property string $risk1
 * @property string $risk2
 * @property string $risk3
 * @property string $risk4
 * @property string $risk5
 *
 * @property ReestrOperation[] $reestrOperations
 */
class Reestr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Reestr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code_v', 'point_v', 'name_v', 'risk1', 'risk2', 'risk3', 'risk4', 'risk5'], 'required'],
            [['code_v', 'point_v', 'name_v', 'risk1', 'risk2', 'risk3', 'risk4', 'risk5'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_v' => 'Код риска',
            'point_v' => 'Пункт программы',
            'name_v' => 'Наименование риска',
            'risk1' => 'Risk1',
            'risk2' => 'Risk2',
            'risk3' => 'Risk3',
            'risk4' => 'Risk4',
            'risk5' => 'Risk5',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReestrOperations()
    {
        return $this->hasMany(ReestrOperation::className(), ['id_reestr' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ReestrQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReestrQuery(get_called_class());
    }
}
