<?php
/**
 * Created by PhpStorm.
 * User: user018
 * Date: 28.06.2016
 * Time: 10:59
 */

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $user = $auth->createRole('user');
        $auth->add($user);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $user);

        $auth->assign($admin, 1);
        $auth->assign($user, 2);
    }
}