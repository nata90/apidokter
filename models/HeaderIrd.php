<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "headerird".
 *
 * @property string|null $KodeUnitPelayanan
 * @property string $NoTransaksi
 * @property string|null $TglTransaksi
 * @property string|null $NoRef
 * @property string|null $KodeRuang
 * @property string|null $JenisPasien
 * @property string|null $NoPasien
 * @property int|null $Kunjungan
 * @property string|null $JenisTransaksi
 * @property string|null $Keterangan
 * @property float|null $TotalPiutang
 * @property float|null $TotalBayar
 * @property int|null $Bayar
 * @property string|null $Posting
 * @property string|null $UserID
 * @property string|null $KodeKasirTunai
 * @property string|null $NoPembayaranTunai
 * @property string|null $TglBayar
 * @property string|null $user_delete
 * @property int|null $status_delete
 * @property string|null $date_delete
 * @property int $status_update
 */
class HeaderIrd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'headerird';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NoTransaksi'], 'required'],
            [['TglTransaksi', 'TglBayar', 'date_delete'], 'safe'],
            [['Kunjungan', 'Bayar', 'status_delete', 'status_update'], 'integer'],
            [['TotalPiutang', 'TotalBayar'], 'number'],
            [['KodeUnitPelayanan', 'KodeRuang', 'KodeKasirTunai'], 'string', 'max' => 6],
            [['NoTransaksi', 'NoRef', 'NoPembayaranTunai'], 'string', 'max' => 15],
            [['JenisPasien', 'JenisTransaksi', 'Posting'], 'string', 'max' => 1],
            [['NoPasien'], 'string', 'max' => 11],
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
            'JenisPasien' => Yii::t('app', 'Jenis Pasien'),
            'NoPasien' => Yii::t('app', 'No Pasien'),
            'Kunjungan' => Yii::t('app', 'Kunjungan'),
            'JenisTransaksi' => Yii::t('app', 'Jenis Transaksi'),
            'Keterangan' => Yii::t('app', 'Keterangan'),
            'TotalPiutang' => Yii::t('app', 'Total Piutang'),
            'TotalBayar' => Yii::t('app', 'Total Bayar'),
            'Bayar' => Yii::t('app', 'Bayar'),
            'Posting' => Yii::t('app', 'Posting'),
            'UserID' => Yii::t('app', 'User ID'),
            'KodeKasirTunai' => Yii::t('app', 'Kode Kasir Tunai'),
            'NoPembayaranTunai' => Yii::t('app', 'No Pembayaran Tunai'),
            'TglBayar' => Yii::t('app', 'Tgl Bayar'),
            'user_delete' => Yii::t('app', 'User Delete'),
            'status_delete' => Yii::t('app', 'Status Delete'),
            'date_delete' => Yii::t('app', 'Date Delete'),
            'status_update' => Yii::t('app', 'Status Update'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return HeaderirdQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HeaderirdQuery(get_called_class());
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
