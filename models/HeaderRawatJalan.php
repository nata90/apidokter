<?php

namespace app\models;

use Yii;
use app\models\TabelRuang;

/**
 * This is the model class for table "headerrawatjalan".
 *
 * @property string|null $KodeUnitPelayanan
 * @property string $NoTransaksi
 * @property string|null $TglTransaksi
 * @property string|null $NoRef
 * @property string|null $KodeRuang
 * @property string|null $NomorRM
 * @property int|null $Kunjungan
 * @property string|null $Keterangan
 * @property float|null $TotalTransaksi
 * @property float|null $TotalTanggungan
 * @property float|null $TotalTunai
 * @property int|null $Bayar 0=blm bayar, 1=sdh bayar
 * @property string|null $UserID
 * @property string|null $KodeKasir
 * @property string|null $NoPembayaranTunai
 * @property string|null $TglBayar
 * @property string|null $user_delete
 * @property int|null $status_delete
 * @property string|null $date_delete
 */
class HeaderRawatJalan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'headerrawatjalan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NoTransaksi'], 'required'],
            [['TglTransaksi', 'TglBayar', 'date_delete'], 'safe'],
            [['Kunjungan', 'Bayar', 'status_delete'], 'integer'],
            [['TotalTransaksi', 'TotalTanggungan', 'TotalTunai'], 'number'],
            [['KodeUnitPelayanan', 'KodeRuang', 'KodeKasir'], 'string', 'max' => 6],
            [['NoTransaksi', 'NoRef', 'NoPembayaranTunai'], 'string', 'max' => 15],
            [['NomorRM'], 'string', 'max' => 11],
            [['Keterangan'], 'string', 'max' => 50],
            [['UserID', 'user_delete'], 'string', 'max' => 10],
            [['NoTransaksi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KodeUnitPelayanan' => Yii::t('app', 'Kode Unit Pelayanan'),
            'NoTransaksi' => Yii::t('app', 'No Transaksi'),
            'TglTransaksi' => Yii::t('app', 'Tgl Transaksi'),
            'NoRef' => Yii::t('app', 'No Ref'),
            'KodeRuang' => Yii::t('app', 'Kode Ruang'),
            'NomorRM' => Yii::t('app', 'Nomor Rm'),
            'Kunjungan' => Yii::t('app', 'Kunjungan'),
            'Keterangan' => Yii::t('app', 'Keterangan'),
            'TotalTransaksi' => Yii::t('app', 'Total Transaksi'),
            'TotalTanggungan' => Yii::t('app', 'Total Tanggungan'),
            'TotalTunai' => Yii::t('app', 'Total Tunai'),
            'Bayar' => Yii::t('app', '0=blm bayar, 1=sdh bayar'),
            'UserID' => Yii::t('app', 'User ID'),
            'KodeKasir' => Yii::t('app', 'Kode Kasir'),
            'NoPembayaranTunai' => Yii::t('app', 'No Pembayaran Tunai'),
            'TglBayar' => Yii::t('app', 'Tgl Bayar'),
            'user_delete' => Yii::t('app', 'User Delete'),
            'status_delete' => Yii::t('app', 'Status Delete'),
            'date_delete' => Yii::t('app', 'Date Delete'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return HeaderrawatjalanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HeaderrawatjalanQuery(get_called_class());
    }

    /**
     * Gets query for [[KlpJabatan]].
     *
     * @return \yii\db\ActiveQuery|KlpJabatanQuery
     */
    public function getRuang()
    {
        return $this->hasOne(TabelRuang::className(), ['KodeRuang' => 'KodeRuang']);
    }
}
