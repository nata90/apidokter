<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kamaroperasi".
 *
 * @property int $id_kamaroperasi
 * @property string|null $nama_kamaroperasi
 * @property int|null $aktif
 */
class KamarOperasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kamaroperasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kamaroperasi'], 'required'],
            [['id_kamaroperasi', 'aktif'], 'integer'],
            [['nama_kamaroperasi'], 'string', 'max' => 10],
            [['id_kamaroperasi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kamaroperasi' => Yii::t('app', 'Id Kamaroperasi'),
            'nama_kamaroperasi' => Yii::t('app', 'Nama Kamaroperasi'),
            'aktif' => Yii::t('app', 'Aktif'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return KamaroperasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KamaroperasiQuery(get_called_class());
    }
}
