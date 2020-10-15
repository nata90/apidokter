<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[HeaderIrd]].
 *
 * @see HeaderIrd
 */
class HeaderirdQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return HeaderIrd[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return HeaderIrd|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
