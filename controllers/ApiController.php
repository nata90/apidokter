<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\DetailRawatInap;
use app\models\DetailRawatJalan;
use app\models\DetailIrd;
use app\models\Tpelayanan;
use app\models\JadwalOperasi;

class ApiController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionTindakanharian()
    {
        $date = date('Y-m-d');
        $model_ri = DetailRawatInap::find()->select(['*','SUM(Jumlah) AS Jumlah'])->where(['KodeTKesehatan'=>'171', 'DATE(CreateTime)'=>$date])->groupBy('KodePelayanan')->all();

        $arr_json = array();

        if($model_ri != null){
            foreach ($model_ri as $key => $value) {
                $arr_json['data'][] = ['pelayanan'=>$value->pelayanan->Pelayanan, 'jumlah'=>$value->Jumlah, 'ruang'=>$value->header->ruang->Ruang];
            }
        }

        $model_rj = DetailRawatJalan::find()->select(['*','SUM(Jumlah) AS Jumlah'])->where(['KodeTKesehatan'=>'171', 'DATE(CreateTime)'=>$date])->groupBy('KodePelayanan')->all();

        if($model_rj != null){
            foreach ($model_rj as $key => $row) {
                $arr_json['data'][] = ['pelayanan'=>$row->pelayanan->Pelayanan, 'jumlah'=>$row->Jumlah, 'ruang'=>$row->header->ruang->Ruang];
            }
        }

        $model_ird = DetailIrd::find()->select(['*','SUM(Jumlah) AS Jumlah'])->where(['KodeTKesehatan'=>'171', 'DATE(CreateTime)'=>$date])->groupBy('KodePelayanan')->all();

        if($model_ird != null){
            foreach ($model_ird as $key => $val) {
                $arr_json['data'][] = ['pelayanan'=>$val->pelayanan->Pelayanan, 'jumlah'=>$val->Jumlah, 'ruang'=>$val->header->ruang->Ruang];
            }
        }


        return Json::encode($arr_json);
    }

    public function actionGetpasien(){
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand('SELECT a.`KodeBangsal`, d.`Ruang`, a.`NomorRM`, UPPER(c.`NamaPasien`) AS NamaPasien,  DATE_FORMAT(b.`data_input`, "%d-%m-%Y %k:%i:%s") AS data_input, c.`JK` AS jk   FROM `detailpelayananbangsal` a INNER JOIN `headerpelayananbangsal` b ON (a.`NomorRM`=b.`NomorRM` AND a.`Kunjungan`=b.`Kunjungan`)
                    INNER JOIN `dataindukpasien` c ON b.`NomorRM` =  c.`NomorRM`
                    INNER JOIN `tabelruang` d ON a.`KodeBangsal`= d.`KodeRuang`
                    WHERE  a.`Status` = 1 AND b.`KodeDokter`IN ("171") 
                    ORDER BY  d.`Ruang` ASC,  b.`data_input` DESC');

        $result['data'] = $command->queryAll();
        return Json::encode($result);

    }

    public function actionJadwaloperasi(){
        $result = array();
        $model = JadwalOperasi::find()->where(['status_delete'=>0])->andWhere(['>=','tgl_operasi',date('Y-m-d').' 00:00:00'])->all();

        if($model != null){
            foreach($model as $val){
               $result['data'][] = array(
                    'id'=>$val->id_jadwaloperasi,
                    'tanggalop'=>date('d-m-Y H:i', strtotime($val->tgl_operasi)),
                    'rm'=>$val->NomorRM, 
                    'tgl_lahir'=>date('d-m-Y', strtotime($val->datainduk->TglLahir)),
                    'kunjungan'=>$val->Kunjungan,
                    'nama'=>$val->datainduk->NamaPasien,
                    'asalruang'=>$val->asalruang->Ruang,
                    'ruang'=>$val->kamarop->nama_kamaroperasi,
                    'dokter1'=>$val->dokter1->Nama,
                    'dokter2'=>$val->dokter2->Nama,
                    'dokter3'=>$val->dokter3->Nama,
                    'keterangan'=>$val->keterangan,
                    'diagnosa'=>$val->diagnosa,
                    'info'=>$val->info
               );
            }
            
        }
        return Json::encode($result);

    }

    
}
