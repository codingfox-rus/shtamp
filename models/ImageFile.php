<?php

namespace app\models;

use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $page_id
 * @property string $path
 * @property string $title
 * @property mixed $file
 *
 * @property Pages $page
 */
class ImageFile extends \yii\db\ActiveRecord
{
    public $file;
    const IMAGE_WIDTH = 1024;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'path', 'title'], 'required'],
            [['page_id'], 'integer'],
            [['path', 'title'], 'string', 'max' => 255],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pages::className(), 'targetAttribute' => ['page_id' => 'id']],
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
            'page_id' => 'Page ID',
            'path' => 'Путь',
            'title' => 'Заголовок',
            'file' => 'Файл'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Pages::className(), ['id' => 'page_id']);
    }
    
    /**
     * Загружаем файл изображения, сохраняем его и запись в таблице
     * @return boolean
     */
    public function uploadAndSave()
    {
        $this->file = UploadedFile::getInstance($this, 'file');
        if (!empty($this->file)){
            $path = '/img/uploads/' . $this->file->baseName . '.' . $this->file->extension;
            $fullPath = Yii::getAlias('@webroot') . $path;
            if ($this->file->saveAs($fullPath)){
                $img = Image::getImagine()->open($path);
                $width = $img->getSize()->getWidth();
                if ($width > self::IMAGE_WIDTH){
                    Image::thumbnail($fullPath, $width)->save($fullPath);
                }
                
                $this->path = $path;
                if ($this->save()){
                    return true;
                } else {
                    return false;
                }
            }
        }
    }        
}
