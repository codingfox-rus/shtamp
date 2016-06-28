<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "novelties".
 *
 * @property integer $id
 * @property string $image
 * @property string $desc
 * @property integer $published
 */
class Novelties extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'novelties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc', 'published'], 'required'],
            [['published'], 'integer'],
            [['image', 'desc'], 'string', 'max' => 255],
            [['file'], 'file']
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
            'file' => 'Загрузить файл'
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->file = UploadedFile::getInstance($this, 'file');

            if ( !empty($this->file) ) {
                $path = 'img/novelties/' . $this->file->baseName . "." . $this->file->extension;
                $this->file->saveAs($path);
                if ( !$this->isNewRecord ) {
                    $oldFile = Yii::getAlias('@webroot') . $this->image;
                    if ( file_exists($oldFile) ) {
                        unlink($oldFile);
                    }
                }
                $this->image = '/' . $path;
            }

            return true;
        }
        return false;
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $file = Yii::getAlias('@webroot') . $this->image;
            if ( file_exists($file) ) {
                unlink($file);
            }

            return true;
        }
        return false;
    }
}
