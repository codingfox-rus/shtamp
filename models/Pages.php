<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $content
 */
class Pages extends \yii\db\ActiveRecord
{
    public $tags_;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'content'], 'string'],
            [['url', 'title', 'keywords'], 'string', 'max' => 255],
            [['tags_'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'title' => 'Заголовок',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание',
            'content' => 'Контент',
            'tags_' => 'Тэги'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['page_id' => 'id']);
    }

    /**
     * @return $this
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('page_tags', ['page_id' => 'id']);
    }

    /**
     * @return string
     */
    public function viewTags()
    {
        $tagNames = ArrayHelper::getColumn($this->tags, 'name');
        return implode(', ', $tagNames);
    }

    public function afterFind()
    {
        $this->tags_ = $this->tags;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        PageTag::deleteAll(['page_id' => $this->id]);
        if ( !empty($this->tags_) ) {
            foreach ($this->tags_ as $tag) {
                $model = new PageTag();
                $model->page_id = $this->id;
                $model->tag_id = $tag;
                $model->save();
            }
        }
    }
}
