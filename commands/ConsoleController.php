<?php
namespace app\commands;

use yii\console\Controller;
use app\models\Pages;

class ConsoleController extends Controller
{
    public function actionAddGalleryImages()
    {
        $pages = Pages::find()->where([
            '<>', 'url', 'test'
        ])->all();

        foreach ($pages as $page) {
            $html = $page->content;

            $imgPattern = '/<img\s(.*)\/?>/U';
            preg_match_all($imgPattern, $html, $matches, PREG_SET_ORDER);

            $uId = 1;
            foreach ($matches as $match) {
                $img = trim($match[0]);
                $attrContent = trim($match[1]);
                
                preg_match('/src=\"(.*)\"/', $attrContent, $srcMatch);
                if (!empty($srcMatch)){
                    $src = $srcMatch[1];
                    $imgAttr = "Image-". $uId;
                    $out = '<a href="'. $src .'" data-lightbox="'. $imgAttr .'">'. $img .'</a>';
                    
                    $html = str_replace($img, $out, $html);
                }
                
                $uId += 1;
            }

            $page->content = $html;
            $page->save();
        }

        echo count($pages);
    }

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
