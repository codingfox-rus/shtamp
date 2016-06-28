<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "files".
 *
 * @property integer $id
 * @property string $path
 * @property string $desc
 */
class Files extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc'], 'required'],
            [['path'], 'string', 'max' => 512],
            [['desc'], 'string', 'max' => 1024],
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
            'path' => 'Путь к файлу',
            'desc' => 'Описание',
            'file' => 'Загрузить файл'
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->file = UploadedFile::getInstance($this, 'file');

            if ( !empty($this->file) ) {
                $path = 'files/' . uniqid() . "." . $this->file->extension;
                $this->file->saveAs($path);
                if ( !$this->isNewRecord ) {
                    $oldFile = Yii::getAlias('@webroot') . $this->path;
                    if ( file_exists($oldFile) ) {
                        unlink($oldFile);
                    }
                }
                $this->path = '/' . $path;
            }

            return true;
        }
        return false;
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $file = Yii::getAlias('@webroot') . $this->path;
            if ( file_exists($file) ) {
                unlink($file);
            }

            return true;
        }
        return false;
    }
}
