<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabelruang".
 *
 * @property string $KodeRuang
 * @property string $Ruang
 * @property int $Indikator
 * @property int $Kelompok 0=rawat jalan,1=igd,2=rawat inap, 3=penunjang
 * @property string $KodeSMF
 * @property int $KamarOperasi
 * @property int $aktif
 * @property int $mandiri
 * @property int $expertise
 * @property string|null $inisial
 * @property int|null $no_terakhir_1
 * @property int|null $no_terakhir_2
 * @property int $on_line
 *
 * @property Truangperunitpelayanan[] $truangperunitpelayanans
 */
class TabelRuang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tabelruang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KodeRuang', 'Ruang', 'Indikator', 'Kelompok', 'KodeSMF', 'KamarOperasi'], 'required'],
            [['Indikator', 'Kelompok', 'KamarOperasi', 'aktif', 'mandiri', 'expertise', 'no_terakhir_1', 'no_terakhir_2', 'on_line'], 'integer'],
            [['KodeRuang', 'KodeSMF', 'inisial'], 'string', 'max' => 6],
            [['Ruang'], 'string', 'max' => 50],
            [['KodeRuang'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KodeRuang' => Yii::t('app', 'Kode Ruang'),
            'Ruang' => Yii::t('app', 'Ruang'),
            'Indikator' => Yii::t('app', 'Indikator'),
            'Kelompok' => Yii::t('app', '0=rawat jalan,1=igd,2=rawat inap, 3=penunjang'),
            'KodeSMF' => Yii::t('app', 'Kode Smf'),
            'KamarOperasi' => Yii::t('app', 'Kamar Operasi'),
            'aktif' => Yii::t('app', 'Aktif'),
            'mandiri' => Yii::t('app', 'Mandiri'),
            'expertise' => Yii::t('app', 'Expertise'),
            'inisial' => Yii::t('app', 'Inisial'),
            'no_terakhir_1' => Yii::t('app', 'No Terakhir 1'),
            'no_terakhir_2' => Yii::t('app', 'No Terakhir 2'),
            'on_line' => Yii::t('app', 'On Line'),
        ];
    }

    /**
     * Gets query for [[Truangperunitpelayanans]].
     *
     * @return \yii\db\ActiveQuery|TruangperunitpelayananQuery
     */
    public function getTruangperunitpelayanans()
    {
        return $this->hasMany(Truangperunitpelayanan::className(), ['KodeRuang' => 'KodeRuang']);
    }

    /**
     * {@inheritdoc}
     * @return TabelruangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TabelruangQuery(get_called_class());
    }
}
