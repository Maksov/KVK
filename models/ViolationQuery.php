<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Violation]].
 *
 * @see Violation
 */
class ViolationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Violation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Violation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
