<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 

/* @var $this yii\web\View */
/* @var $searchModel app\models\auth\SearchLoaitaikhoan */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loaitaikhoans';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="loaitaikhoan-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('Thêm mới', ['create'],
                    ['role'=>'modal-remote','title'=> 'Thêm mới','class'=>'btn btn-success']).
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Loaitaikhoans listing',
                'after'=>false,
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
