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

    
}
