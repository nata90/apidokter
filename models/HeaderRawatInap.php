<?php

namespace app\models;

use Yii;
use app\models\TabelRuang;

/**
 * This is the model class for table "headerrawatinap".
 *
 * @property string|null $KodeUnitPelayanan
 * @property string $NoTransaksi
 * @property string|null $TglTransaksi
 * @property string|null $NoRef
 * @property string|null $KodeRuang
 * @property string|null $Kelas
 * @property string|null $NoPasien
 * @property int|null $Kunjungan
 * @property string|null $Keterangan
 * @property float|null $TotalPiutang
 * @property int|null $Bayar
 * @property string|null $UserID
 * @property string|null $NoPembayaranTunai
 * @property string $TglBayar
 * @property string $user_delete
 * @property int $status_delete
 * @property string $date_delete
 */
class HeaderRawatInap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'headerrawatinap';
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
            [['TotalPiutang'], 'number'],
            [['KodeUnitPelayanan', 'KodeRuang'], 'string', 'max' => 6],
            [['NoTransaksi', 'NoRef', 'Kelas', 'NoPembayaranTunai'], 'string', 'max' => 15],
            [['NoPasien', 'UserID', 'user_delete'], 'string', 'max' => 10],
            [['Keterangan'], 'string', 'max' => 50],
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
            'Kelas' => Yii::t('app', 'Kelas'),
            'NoPasien' => Yii::t('app', 'No Pasien'),
            'Kunjungan' => Yii::t('app', 'Kunjungan'),
            'Keterangan' => Yii::t('app', 'Keterangan'),
            'TotalPiutang' => Yii::t('app', 'Total Piutang'),
            'Bayar' => Yii::t('app', 'Bayar'),
            'UserID' => Yii::t('app', 'User ID'),
            'NoPembayaranTunai' => Yii::t('app', 'No Pembayaran Tunai'),
            'TglBayar' => Yii::t('app', 'Tgl Bayar'),
            'user_delete' => Yii::t('app', 'User Delete'),
            'status_delete' => Yii::t('app', 'Status Delete'),
            'date_delete' => Yii::t('app', 'Date Delete'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return HeaderrawatinapQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HeaderrawatinapQuery(get_called_class());
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
