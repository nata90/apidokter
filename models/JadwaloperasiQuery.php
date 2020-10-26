<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[JadwalOperasi]].
 *
 * @see JadwalOperasi
 */
class JadwaloperasiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return JadwalOperasi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return JadwalOperasi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
