<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Karta]].
 *
 * @see Karta
 */
class KartaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Karta[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Karta|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
