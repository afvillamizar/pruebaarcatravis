<?php

namespace backend\controllers\poc;

use Yii;
use backend\controllers\poc\FdClasificacionPreguntaControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdClasificacionPreguntaController implementa las acciones a través del sistema CRUD para el modelo FdClasificacionPregunta.
 */
class FdClasificacionPreguntaController extends ControllerPry
{
  //private $facade =    FdClasificacionPreguntaControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  FdClasificacionPreguntaControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  FdClasificacionPreguntaControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo FdClasificacionPregunta que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  FdClasificacionPreguntaControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo FdClasificacionPregunta.
     * @param integer $id_clasificacion
     * @param integer $id_pregunta
     * @return mixed
     */
    public function actionView($id_clasificacion, $id_pregunta)
    {
        $facade =  new  FdClasificacionPreguntaControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id_clasificacion, $id_pregunta),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo FdClasificacionPregunta .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  FdClasificacionPreguntaControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id_clasificacion' => $model->id_clasificacion, 'id_pregunta' => $model->id_pregunta]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo FdClasificacionPregunta.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id_clasificacion
     * @param integer $id_pregunta
     * @return mixed
     */
    public function actionUpdate($id_clasificacion, $id_pregunta)
    {
        $facade =  new  FdClasificacionPreguntaControllerFachada;
        $modelE= $facade->actionUpdate($id_clasificacion, $id_pregunta,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id_clasificacion' => $model->id_clasificacion, 'id_pregunta' => $model->id_pregunta]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FdClasificacionPregunta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_clasificacion
     * @param integer $id_pregunta
     * @return mixed
     */
    public function actionDeletep($id_clasificacion, $id_pregunta)
    {
        $facade =  new  FdClasificacionPreguntaControllerFachada;
        $facade->actionDeletep($id_clasificacion, $id_pregunta);

        return $this->redirect(['index']);
    }

    
}
