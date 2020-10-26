<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DataIndukPasien]].
 *
 * @see DataIndukPasien
 */
class DataindukpasienQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DataIndukPasien[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DataIndukPasien|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
