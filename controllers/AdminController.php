<?php

namespace app\controllers;

use Yii;
use app\models\Admin;
use app\models\AdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Admin model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Admin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          $model->password = md5($model->password);
        }
        if ($model->save()){
          return $this->redirect(['index', 'id' => $model->id]);
        }
        return $this->render('create', ['model' => $model,]);
    }


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
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        # render views/mahasiswa/update
        # di dalam file create bisa langsung ambil $model
        # contoh, panggil nama_lengkap, cukup $model->nama_lengkap
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
