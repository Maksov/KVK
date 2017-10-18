<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ReestrOperation]].
 *
 * @see ReestrOperation
 */
class ReestrOperationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ReestrOperation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ReestrOperation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
