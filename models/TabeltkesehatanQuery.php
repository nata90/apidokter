<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TabeltKesehatan]].
 *
 * @see TabeltKesehatan
 */
class TabeltkesehatanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TabeltKesehatan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TabeltKesehatan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
