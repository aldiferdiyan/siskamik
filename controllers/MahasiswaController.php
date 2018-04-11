<?php

namespace app\controllers;

# jangan lupa di use / include dlu
use Yii;
use yii\filters\AccessControl;
use app\models\Mahasiswa;
use app\models\MahasiswaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

# Controller Mahasiswa
class MahasiswaController extends Controller
{

    #fungsi untuk mengatur behavior controller
    public function behaviors(){
        return [

        # untuk mengatur akses dari user
        # tanda @ berarti hanya user yg sudah login saja yg bisa mengakses
        # kalo blom login, maka auto redirect ke halaman login
        # wajib di taro ya, untuk controller ini, dan controller lain sejenisnya
        'access' => [
            'class' => AccessControl::className(), 
            'rules' => [
                [ 
                'allow' => true,
                'roles' => ['@'],
                ],
            ],
        ],

        # fungsi untuk mengatur type GET/POST apa saja yg di perbolehkan pada method di controller
        # dalam contoh ini, fungsi actionDelete hanya boleh di akses jika type nya POST
        # default jika method/function  gak di set, maka GET
        'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
                'delete' => ['POST'],
            ],
        ],
        ];
    }

    # fungsi index
    # type : GET
    # menampilkan list dari mahasiswa 
    public function actionIndex()
    {
        # model yg di pakai untuk index ini adalah MahasiswaSearch
        $searchModel = new MahasiswaSearch();

        # dataprovider merupakan class / library dari YII untuk membuat list
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    # fungsi untuk view detail
    # parameter : id
    # type : GET
    public function actionView($nim)
    {   
        # ambil mahasiswa berdasarkan nim
        $model = $this->findModel($nim);

        # render views/mahasiswa/create
        # di dalam file create bisa langsung ambil $model
        # contoh, panggil nama_lengkap, cukup $model->nama_lengkap
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    # fungsi untuk create
    # type : GET
    # ketika di submit : POST
    public function actionCreate()
    {
        # Model Mahasiswa harus di inisialisasi dlu
        $model = new Mahasiswa();

        # jika di klik submit : POST
        if ($model->load(Yii::$app->request->post())) {

            # hash password di sini
            $model->password = md5($model->password);

            # simpan dan redirect
            if($model->save()){
                return $this->redirect(['view', 'nim' => $model->nim]);
            }
            
        }

        # render views/mahasiswa/create
        # di dalam file create bisa langsung ambil $model
        # contoh, panggil nama_lengkap, cukup $model->nama_lengkap
        return $this->render('create', [
            'model' => $model,
        ]);
    }


    # fungsi untuk update
    # parameter id (nim)
    # type : GET
    # ketika di submit POST
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        # fix update password di mahasiswa
        # jadi jika password lama dan baru sama (tidak di edit)
        # maka jangan simpan / md5 lg pass nya
        # terlebih dahulu harus simpan password lama untuk di cek 
        $old_password = $model->password;

        # jika di klik submit : POST
        if ($model->load(Yii::$app->request->post())) {
            
            # cek password lama dan baru di sini
            $new_password = $model->password;
            if($old_password != $new_password){
                $model->password = md5($new_password);
            }

            # simpan dan redirect
            if($model->save()){
                return $this->redirect(['view', 'nim' => $model->nim]);
            } 
        }

        # render views/mahasiswa/update
        # di dalam file create bisa langsung ambil $model
        # contoh, panggil nama_lengkap, cukup $model->nama_lengkap
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    # fungsi untuk delete
    # parameter ID
    # type : POST
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        # setelah di delete maka di redirect ke index lg
        return $this->redirect(['index']);
    }

    # find Model
    # jadi ambil data di mahasiswa berdasarkan id nya (NIM)
    # jika gak ada, maka auto redirect ke halaman tidak ditemukan
    protected function findModel($id)
    {
        if (($model = Mahasiswa::findOne($id)) !== null) {
            return $model;
        }

        # disini redirect ke halaman gak di temukan
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
