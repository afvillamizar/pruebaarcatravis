<?php

namespace frontend\controllers\wiki;

use Yii;
use common\models\wiki\Tipomonedavalidator;
use yii\web\Controller;
use yii\filters\VerbFilter;


class TipomonedaController extends Controller
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
     * Se necesita el modelo Tipofechasvalidator()
     * Si la validación es correcta se creará el cliente en la base de datos y se enviara a la vista /views/tipofechas/create.php junto con el mensaje exitoso, si no regresara a la vista del formulario /views/tipofechas/create.php presentando los errores
	 * Modelo de formulario POST
	 * @return mixed
     */
    public function actionCreate($msg=null)
    {
        $model = new Tipomonedavalidator();

        if ($model->load(Yii::$app->request->post())) {
			$passdata="Datos del Formulario capturados con exito Name: ".$model->dato1. " y ".$model->dato2;
			return $this->redirect(['create','msg'=>$passdata,]);
	    }else{
            return $this->render('/wiki/tipomoneda/create', [
                'model' => $model,'msg'=>$msg,
            ]);
        }


    }


}
