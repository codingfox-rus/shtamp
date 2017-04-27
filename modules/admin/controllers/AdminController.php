<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class AdminController extends Controller
{
    public function dd($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }
}
