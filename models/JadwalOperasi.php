<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jadwaloperasi".
 *
 * @property int $id_jadwaloperasi
 * @property string $NomorRM
 * @property int $Kunjungan
 * @property string|null $kode_ruang
 * @property string|null $KodeDokter1
 * @property string|null $KodeDokter2
 * @property string|null $KodeDokter3
 * @property string|null $UserID
 * @property string $tgl_operasi
 * @property string|null $tanggal
 * @property string|null $tgl_keluar
 * @property int $id_kamaroperasi
 * @property string|null $user_delete
 * @property int|null $status_delete
 * @property string|null $date_delete
 * @property int|null $status_operasi 0 = belum operasi, 1 = sudah operasi, 2 = batal operasi, 3 = tunda operasi
 * @property string|null $info
 * @property string|null $keterangan
 * @property string|null $kodesmf1
 * @property string|null $kodesmf2
 * @property string|null $kodesmf3
 * @property string|null $diagnosa
 * @property string|null $craete_date
 */
class JadwalOperasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwaloperasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NomorRM', 'Kunjungan', 'tgl_operasi', 'id_kamaroperasi'], 'required'],
            [['Kunjungan', 'id_kamaroperasi', 'status_delete', 'status_operasi'], 'integer'],
            [['tgl_operasi', 'tanggal', 'tgl_keluar', 'date_delete', 'craete_date'], 'safe'],
            [['info'], 'string'],
            [['NomorRM', 'UserID', 'kodesmf1', 'kodesmf2', 'kodesmf3'], 'string', 'max' => 10],
            [['kode_ruang', 'KodeDokter1', 'KodeDokter2', 'KodeDokter3'], 'string', 'max' => 6],
            [['user_delete'], 'string', 'max' => 15],
            [['keterangan'], 'string', 'max' => 255],
            [['diagnosa'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jadwaloperasi' => Yii::t('app', 'Id Jadwaloperasi'),
            'NomorRM' => Yii::t('app', 'Nomor Rm'),
            'Kunjungan' => Yii::t('app', 'Kunjungan'),
            'kode_ruang' => Yii::t('app', 'Kode Ruang'),
            'KodeDokter1' => Yii::t('app', 'Kode Dokter1'),
            'KodeDokter2' => Yii::t('app', 'Kode Dokter2'),
            'KodeDokter3' => Yii::t('app', 'Kode Dokter3'),
            'UserID' => Yii::t('app', 'User ID'),
            'tgl_operasi' => Yii::t('app', 'Tgl Operasi'),
            'tanggal' => Yii::t('app', 'Tanggal'),
            'tgl_keluar' => Yii::t('app', 'Tgl Keluar'),
            'id_kamaroperasi' => Yii::t('app', 'Id Kamaroperasi'),
            'user_delete' => Yii::t('app', 'User Delete'),
            'status_delete' => Yii::t('app', 'Status Delete'),
            'date_delete' => Yii::t('app', 'Date Delete'),
            'status_operasi' => Yii::t('app', '0 = belum operasi, 1 = sudah operasi, 2 = batal operasi, 3 = tunda operasi'),
            'info' => Yii::t('app', 'Info'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'kodesmf1' => Yii::t('app', 'Kodesmf1'),
            'kodesmf2' => Yii::t('app', 'Kodesmf2'),
            'kodesmf3' => Yii::t('app', 'Kodesmf3'),
            'diagnosa' => Yii::t('app', 'Diagnosa'),
            'craete_date' => Yii::t('app', 'Craete Date'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return JadwaloperasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new JadwaloperasiQuery(get_called_class());
    }

    
    public function getDatainduk()
    {
        return $this->hasOne(DataIndukPasien::className(), ['NomorRM' => 'NomorRM']);
    }

    
    public function getKamarop()
    {
        return $this->hasOne(KamarOperasi::className(), ['id_kamaroperasi' => 'id_kamaroperasi']);
    }


    public function getDokter1()
    {
        return $this->hasOne(TabeltKesehatan::className(), ['KodeTKesehatan' => 'KodeDokter1']);
    }

    public function getDokter2()
    {
        return $this->hasOne(TabeltKesehatan::className(), ['KodeTKesehatan' => 'KodeDokter2']);
    }
    
    public function getDokter3()
    {
        return $this->hasOne(TabeltKesehatan::className(), ['KodeTKesehatan' => 'KodeDokter3']);
    }

    public function getAsalruang()
    {
        return $this->hasOne(TabelRuang::className(), ['KodeRuang' => 'kode_ruang']);
    }
}
