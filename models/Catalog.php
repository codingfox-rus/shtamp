<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property integer $id
 * @property string $image
 * @property string $desc
 * @property integer $published
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'desc', 'published'], 'required'],
            [['published'], 'integer'],
            [['image', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Изображение',
            'desc' => 'Описание',
            'published' => 'Опубликовано',
        ];
    }
}
