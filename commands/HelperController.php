<?php
namespace app\commands;

use yii\console\Controller;
use app\models\Pages;

class HelperController extends Controller
{
    public function actionFixImages()
    {
        $data = Pages::findOne(['url' => 'test']);
        $content = $data->content;

        preg_match('/<img\s(.+)\/>/U', $content, $out);

        echo $out[0];
    }

    public function formatImage($html, $url)
    {
        return '<a href="' . $url . '" rel="prettyPhoto">' . $html . '</a>';
    }
}
