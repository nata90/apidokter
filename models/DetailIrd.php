<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detailird".
 *
 * @property int $id
 * @property string|null $KodeUnitPelayanan
 * @property string|null $NoTransaksi
 * @property string|null $KodePelayanan
 * @property string|null $Kelas
 * @property float|null $Tarif
 * @property int|null $Jumlah
 * @property string|null $KodeKelompokTKesehatan
 * @property string|null $KodeTKesehatan
 * @property string|null $Cito
 * @property int|null $NoUrut
 * @property string|null $KodeTarif
 * @property float|null $TarifJasaSarana
 * @property float|null $TarifJasaPelayanan
 * @property string $CreateTime
 * @property string|null $user_delete
 * @property int $status_delete
 * @property string|null $date_delete
 */
class DetailIrd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detailird';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tarif', 'TarifJasaSarana', 'TarifJasaPelayanan'], 'number'],
            [['Jumlah', 'NoUrut', 'status_delete'], 'integer'],
            [['CreateTime', 'date_delete'], 'safe'],
            [['KodeUnitPelayanan', 'KodeKelompokTKesehatan', 'KodeTKesehatan'], 'string', 'max' => 6],
            [['NoTransaksi', 'KodePelayanan', 'Kelas'], 'string', 'max' => 15],
            [['Cito'], 'string', 'max' => 1],
            [['KodeTarif'], 'string', 'max' => 30],
            [['user_delete'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'KodeUnitPelayanan' => Yii::t('app', 'Kode Unit Pelayanan'),
            'NoTransaksi' => Yii::t('app', 'No Transaksi'),
            'KodePelayanan' => Yii::t('app', 'Kode Pelayanan'),
            'Kelas' => Yii::t('app', 'Kelas'),
            'Tarif' => Yii::t('app', 'Tarif'),
            'Jumlah' => Yii::t('app', 'Jumlah'),
            'KodeKelompokTKesehatan' => Yii::t('app', 'Kode Kelompok T Kesehatan'),
            'KodeTKesehatan' => Yii::t('app', 'Kode T Kesehatan'),
            'Cito' => Yii::t('app', 'Cito'),
            'NoUrut' => Yii::t('app', 'No Urut'),
            'KodeTarif' => Yii::t('app', 'Kode Tarif'),
            'TarifJasaSarana' => Yii::t('app', 'Tarif Jasa Sarana'),
            'TarifJasaPelayanan' => Yii::t('app', 'Tarif Jasa Pelayanan'),
            'CreateTime' => Yii::t('app', 'Create Time'),
            'user_delete' => Yii::t('app', 'User Delete'),
            'status_delete' => Yii::t('app', 'Status Delete'),
            'date_delete' => Yii::t('app', 'Date Delete'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return DetailirdQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetailirdQuery(get_called_class());
    }

    /**
     * Gets query for [[KlpJabatan]].
     *
     * @return \yii\db\ActiveQuery|KlpJabatanQuery
     */
    public function getPelayanan()
    {
        return $this->hasOne(TPelayanan::className(), ['KodePelayanan' => 'KodePelayanan']);
    }

    /**
     * Gets query for [[KlpJabatan]].
     *
     * @return \yii\db\ActiveQuery|KlpJabatanQuery
     */
    public function getHeader()
    {
        return $this->hasOne(HeaderIrd::className(), ['NoTransaksi' => 'NoTransaksi']);
    }
}
