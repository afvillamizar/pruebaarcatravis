<?php

namespace backend\controllers;

use Yii;
use common\models\autenticacion\Regionentidades;
use backend\models\autenticacion\RegionentidadesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * RegionentidadesController implementa las acciones a través del sistema CRUD para el modelo Regionentidades.
 */
class RegionentidadesController extends Controller
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
	
	
	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/
	
	public function actionProgress($urlroute=null,$id=null){
		
	
		/*echo "<div style='display:block;margin:auto;width:50%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>"; 
        echo "<div style='display:block;margin:auto;width:50%;text-align:center'>Guardando</div>"; */
        echo "<div class='imgProgress'>".Html::img('@web/images/lazul.gif')."</div>"; 
		echo "<div class='textProgress'>Guardando</div>"; 
				
		echo "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
	}

	
	
    /**
     * Listado todos los datos del modelo Regionentidades que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RegionentidadesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo Regionentidades.
     * @param string $cod_region
     * @param string $id_entidad
     * @return mixed
     */
    public function actionView($cod_region, $id_entidad)
    {
        return $this->render('view', [
            'model' => $this->findModel($cod_region, $id_entidad),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Regionentidades .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Regionentidades();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			Yii::$app->session->setFlash('FormSubmitted','2');
            return	$this->redirect(['progress', 'urlroute' => 'view', 'cod_region' => $model->cod_region, 'id_entidad' => $model->id_entidad]);
			
			
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo Regionentidades.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $cod_region
     * @param string $id_entidad
     * @return mixed
     */
    public function actionUpdate($cod_region, $id_entidad)
    {
        $model = $this->findModel($cod_region, $id_entidad);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			Yii::$app->session->setFlash('FormSubmitted','1');
			return $this->redirect(['progress', 'urlroute' => 'view', 'cod_region' => $model->cod_region, 'id_entidad' => $model->id_entidad]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Regionentidades model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $cod_region
     * @param string $id_entidad
     * @return mixed
     */
    public function actionDeletep($cod_region, $id_entidad)
    {
        $this->findModel($cod_region, $id_entidad)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Regionentidades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $cod_region
     * @param string $id_entidad
     * @return Regionentidades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cod_region, $id_entidad)
    {
        if (($model = Regionentidades::findOne(['cod_region' => $cod_region, 'id_entidad' => $id_entidad])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
