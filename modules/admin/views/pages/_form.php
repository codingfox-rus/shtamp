<?php
/* @var $this yii\web\View */
/* @var $model app\models\Pages */
/* @var $form yii\widgets\ActiveForm */
/* @var $image mixed */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Tag;
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea([
        'rows' => 6,
        'class' => 'ckeditor'
    ]) ?>
    
    <div class="row">
        <div class="col-md-12">
            <?php if (!$model->isNewRecord): ?>
                <?= Html::a('Загрузить изображение', '#', [
                    'class' => 'btn btn-success upload-image-to-page',
                    'data-toggle' => 'modal',
                    'data-target' => '#upload-image'
                ]); ?>
            <?php endif; ?>
            
            <?php if ($model->images): ?>
                <br>
                <table class="table">
                <?php foreach ($model->images as $img): ?>
                    <tr>
                        <td><?= $img->path ?></td>
                        <td>
                            <?= Html::img(Yii::getAlias('@web') . $img->path, [
                                'style' => 'width: 200px;'
                            ]) ?>
                        </td>
                        <td>
                            <?= Html::a('Удалить', ['delete-image', 'id' => $img->id], [
                                'class' => 'btn btn-danger btn-xs',
                                'data' => [
                                    'method' => 'post'
                                ]
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>

    <?php $data = ArrayHelper::map(Tag::find()->all(), 'id', 'name') ?>

    <?= $form->field($model, 'tags_')->widget(Select2::className(), [
        'data' => $data,
        'options' => ['placeholder' => 'Выберите тэг...', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 10
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
    if ( !$model->isNewRecord ) {
?>
        <!-- Modal -->
        <div class="modal fade" id="upload-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Загрузить изображение</h4>
                    </div>
                    <div class="modal-body">
                        <?php $form = ActiveForm::begin([
                            'action' => 'upload-image',
                            'options' => [
                                'enctype' => 'multipart/form-data'
                            ]
                        ]) ?>
                            <?= $form->field($image, 'title') ?>
                            <?= $form->field($image, 'file')->fileInput() ?>
                            <?= $form->field($image, 'page_id')->hiddenInput(['value' => $model->id])->label(false) ?>
                            <div class="form-group">
                                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                            </div>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?>

<?php
    $this->registerJsFile('/js/fixes.js', [
        'depends' => [\yii\web\JqueryAsset::className()]
    ]);
?>