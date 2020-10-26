<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dataindukpasien".
 *
 * @property string $NomorRM
 * @property string|null $NamaPasien
 * @property string|null $NamaKeluarga
 * @property string|null $GolDarah
 * @property string|null $JK
 * @property string|null $TglLahir
 * @property string|null $Alamat
 * @property string|null $NoTelpon
 * @property string|null $KodePos
 * @property string|null $Kelurahan
 * @property int|null $KodeKecamatan
 * @property int|null $KodeKabupaten
 * @property int|null $KodePropinsi
 * @property string|null $KodeAgama
 * @property string|null $KodeSukuBangsa
 * @property string|null $KodeMarital
 * @property string|null $KodePekerjaan
 * @property string|null $KodePendidikan
 * @property string|null $NoIdentitas
 * @property int|null $StatusPasien 0=non aktif, 1=rawat jalan, 2=igd, 3=rawat inap
 * @property int|null $Kunjungan update berdasarkan kunjungan terakhir
 * @property int|null $Umur
 * @property int|null $id_user
 * @property string|null $date_created
 * @property int $id
 * @property int|null $bukanpasien
 * @property string|null $last_use_time
 * @property string $expired_use_time
 * @property int|null $last_user
 * @property string|null $last_ip
 * @property int $last_user_group 1 = kassa , 2 = lainnya
 */
class DataIndukPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dataindukpasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NomorRM'], 'required'],
            [['TglLahir', 'date_created', 'last_use_time', 'expired_use_time'], 'safe'],
            [['KodeKecamatan', 'KodeKabupaten', 'KodePropinsi', 'StatusPasien', 'Kunjungan', 'Umur', 'id_user', 'bukanpasien', 'last_user', 'last_user_group'], 'integer'],
            [['NomorRM'], 'string', 'max' => 11],
            [['NamaPasien', 'NamaKeluarga', 'Kelurahan', 'last_ip'], 'string', 'max' => 50],
            [['GolDarah'], 'string', 'max' => 2],
            [['JK'], 'string', 'max' => 1],
            [['Alamat'], 'string', 'max' => 100],
            [['NoTelpon'], 'string', 'max' => 25],
            [['KodePos'], 'string', 'max' => 10],
            [['KodeAgama', 'KodeSukuBangsa', 'KodeMarital', 'KodePekerjaan', 'KodePendidikan'], 'string', 'max' => 6],
            [['NoIdentitas'], 'string', 'max' => 30],
            [['NomorRM'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NomorRM' => Yii::t('app', 'Nomor Rm'),
            'NamaPasien' => Yii::t('app', 'Nama Pasien'),
            'NamaKeluarga' => Yii::t('app', 'Nama Keluarga'),
            'GolDarah' => Yii::t('app', 'Gol Darah'),
            'JK' => Yii::t('app', 'Jk'),
            'TglLahir' => Yii::t('app', 'Tgl Lahir'),
            'Alamat' => Yii::t('app', 'Alamat'),
            'NoTelpon' => Yii::t('app', 'No Telpon'),
            'KodePos' => Yii::t('app', 'Kode Pos'),
            'Kelurahan' => Yii::t('app', 'Kelurahan'),
            'KodeKecamatan' => Yii::t('app', 'Kode Kecamatan'),
            'KodeKabupaten' => Yii::t('app', 'Kode Kabupaten'),
            'KodePropinsi' => Yii::t('app', 'Kode Propinsi'),
            'KodeAgama' => Yii::t('app', 'Kode Agama'),
            'KodeSukuBangsa' => Yii::t('app', 'Kode Suku Bangsa'),
            'KodeMarital' => Yii::t('app', 'Kode Marital'),
            'KodePekerjaan' => Yii::t('app', 'Kode Pekerjaan'),
            'KodePendidikan' => Yii::t('app', 'Kode Pendidikan'),
            'NoIdentitas' => Yii::t('app', 'No Identitas'),
            'StatusPasien' => Yii::t('app', '0=non aktif, 1=rawat jalan, 2=igd, 3=rawat inap'),
            'Kunjungan' => Yii::t('app', 'update berdasarkan kunjungan terakhir'),
            'Umur' => Yii::t('app', 'Umur'),
            'id_user' => Yii::t('app', 'Id User'),
            'date_created' => Yii::t('app', 'Date Created'),
            'id' => Yii::t('app', 'ID'),
            'bukanpasien' => Yii::t('app', 'Bukanpasien'),
            'last_use_time' => Yii::t('app', 'Last Use Time'),
            'expired_use_time' => Yii::t('app', 'Expired Use Time'),
            'last_user' => Yii::t('app', 'Last User'),
            'last_ip' => Yii::t('app', 'Last Ip'),
            'last_user_group' => Yii::t('app', '1 = kassa , 2 = lainnya'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return DataindukpasienQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataindukpasienQuery(get_called_class());
    }
}
