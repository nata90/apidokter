<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Tpelayanan]].
 *
 * @see Tpelayanan
 */
class TPelayananQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tpelayanan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tpelayanan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
