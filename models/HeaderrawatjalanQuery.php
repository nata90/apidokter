<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[HeaderRawatJalan]].
 *
 * @see HeaderRawatJalan
 */
class HeaderrawatjalanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return HeaderRawatJalan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return HeaderRawatJalan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
