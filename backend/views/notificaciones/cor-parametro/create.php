<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorParametro */

$this->title = 'Nuevo Parametro';
$this->params['breadcrumbs'][] = ['label' => 'Parametro', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cor-parametro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
