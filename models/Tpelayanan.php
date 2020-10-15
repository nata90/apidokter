<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tpelayanan".
 *
 * @property int $id
 * @property string|null $KodeKelompokPelayanan
 * @property string $KodePelayanan
 * @property string|null $Pelayanan
 * @property string|null $KodeKategoriPelayanan
 * @property int|null $TenagaKesehatan
 * @property string|null $KodeKelompokTKesehatan
 * @property int|null $InputTransaksi
 * @property int|null $NonKelas
 * @property int|null $RekeningBangsal
 * @property int|null $Cito
 * @property string|null $KodeJenisPendapatan
 * @property int $aktif
 * @property int $status
 * @property int $Karcis
 */
class Tpelayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tpelayanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KodePelayanan'], 'required'],
            [['TenagaKesehatan', 'InputTransaksi', 'NonKelas', 'RekeningBangsal', 'Cito', 'aktif', 'status', 'Karcis'], 'integer'],
            [['KodeKelompokPelayanan', 'KodeKategoriPelayanan', 'KodeKelompokTKesehatan', 'KodeJenisPendapatan'], 'string', 'max' => 6],
            [['KodePelayanan'], 'string', 'max' => 15],
            [['Pelayanan'], 'string', 'max' => 150],
            [['KodePelayanan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'KodeKelompokPelayanan' => Yii::t('app', 'Kode Kelompok Pelayanan'),
            'KodePelayanan' => Yii::t('app', 'Kode Pelayanan'),
            'Pelayanan' => Yii::t('app', 'Pelayanan'),
            'KodeKategoriPelayanan' => Yii::t('app', 'Kode Kategori Pelayanan'),
            'TenagaKesehatan' => Yii::t('app', 'Tenaga Kesehatan'),
            'KodeKelompokTKesehatan' => Yii::t('app', 'Kode Kelompok T Kesehatan'),
            'InputTransaksi' => Yii::t('app', 'Input Transaksi'),
            'NonKelas' => Yii::t('app', 'Non Kelas'),
            'RekeningBangsal' => Yii::t('app', 'Rekening Bangsal'),
            'Cito' => Yii::t('app', 'Cito'),
            'KodeJenisPendapatan' => Yii::t('app', 'Kode Jenis Pendapatan'),
            'aktif' => Yii::t('app', 'Aktif'),
            'status' => Yii::t('app', 'Status'),
            'Karcis' => Yii::t('app', 'Karcis'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TPelayananQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TPelayananQuery(get_called_class());
    }
}
