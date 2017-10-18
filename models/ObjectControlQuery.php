<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ObjectControl]].
 *
 * @see ObjectControl
 */
class ObjectControlQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ObjectControl[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ObjectControl|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
