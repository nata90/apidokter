<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DetailRawatJalan]].
 *
 * @see DetailRawatJalan
 */
class DetailrawatjalanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DetailRawatJalan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DetailRawatJalan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
