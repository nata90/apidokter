<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KamarOperasi]].
 *
 * @see KamarOperasi
 */
class KamaroperasiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return KamarOperasi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return KamarOperasi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
