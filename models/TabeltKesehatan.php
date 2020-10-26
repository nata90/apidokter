<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabeltkesehatan".
 *
 * @property int $id
 * @property string|null $KodeKelompokTKesehatan
 * @property string $KodeTKesehatan
 * @property int $kode_dpjp Kode Brasal dari BPJS/Vclaim
 * @property string|null $Nama
 * @property string|null $Alamat
 * @property string|null $Kota
 * @property string|null $NoTelpon
 * @property string|null $KodeSMF
 * @property string|null $KodeSpesialiasi
 * @property int $aktif
 * @property int|null $type 0=undifine 1=dokter 2=perawat 3=gizi
 * @property string|null $keterangan
 */
class TabeltKesehatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tabeltkesehatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KodeTKesehatan'], 'required'],
            [['kode_dpjp', 'aktif', 'type'], 'integer'],
            [['keterangan'], 'string'],
            [['KodeKelompokTKesehatan', 'KodeTKesehatan', 'KodeSMF', 'KodeSpesialiasi'], 'string', 'max' => 6],
            [['Nama'], 'string', 'max' => 100],
            [['Alamat'], 'string', 'max' => 50],
            [['Kota', 'NoTelpon'], 'string', 'max' => 30],
            [['KodeTKesehatan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'KodeKelompokTKesehatan' => Yii::t('app', 'Kode Kelompok T Kesehatan'),
            'KodeTKesehatan' => Yii::t('app', 'Kode T Kesehatan'),
            'kode_dpjp' => Yii::t('app', 'Kode Brasal dari BPJS/Vclaim'),
            'Nama' => Yii::t('app', 'Nama'),
            'Alamat' => Yii::t('app', 'Alamat'),
            'Kota' => Yii::t('app', 'Kota'),
            'NoTelpon' => Yii::t('app', 'No Telpon'),
            'KodeSMF' => Yii::t('app', 'Kode Smf'),
            'KodeSpesialiasi' => Yii::t('app', 'Kode Spesialiasi'),
            'aktif' => Yii::t('app', 'Aktif'),
            'type' => Yii::t('app', '0=undifine 1=dokter 2=perawat 3=gizi'),
            'keterangan' => Yii::t('app', 'Keterangan'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TabeltkesehatanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TabeltkesehatanQuery(get_called_class());
    }
}
