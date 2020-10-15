<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TabelRuang]].
 *
 * @see TabelRuang
 */
class TabelruangQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TabelRuang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TabelRuang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
