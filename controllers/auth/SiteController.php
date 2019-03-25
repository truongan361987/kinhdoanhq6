<?php

namespace app\controllers\auth;

use app\models\ContactForm;
use app\models\form\LoginForm;
use app\services\DebugService;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionLogin()
    {
        $this->layout = "@app/views/layouts/layout_login";
        $request = Yii::$app->request;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($request->isPost && $model->load($request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
          return $this->redirect(Yii::$app->urlManager->createUrl('user/bando'));
    }
}
