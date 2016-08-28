<?php

namespace app\components\widgets;

use yii\base\Widget;

class Spoiler extends Widget
{
    public $title;
    public $videoId;
    public $hidden;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('spoiler', [
            'title' => $this->title,
            'videoId' => $this->videoId,
            'hidden' => $this->hidden
        ]);
    }
}
