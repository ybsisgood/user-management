<?php
/**
 * @var $this yii\web\View
 * @var $model ybsisgood\modules\UserManagement\models\forms\LoginForm
 */
$this->title = 'Login';

use yii\helpers\Url;
use kartik\form\ActiveForm;
use yii\helpers\Html;

$baseUrl = Url::base();

if(isset(Yii::$app->params['themesFolderImage'])) {
    $themeFolderImage = Yii::$app->params['themesFolderImage'];
} else {
    $themeFolderImage = 'themes/skote/assets/images';
}

if(isset(Yii::$app->params['themeProfileImage'])) {
    $themeProfileImage = Yii::$app->params['themeProfileImage'];
} else {
    $themeProfileImage = 'profile-img.png';
}

if(isset(Yii::$app->params['author'])) {
    $author = Yii::$app->params['author'];
} else {
    $author = 'Juara Kedua';
}

if(isset(Yii::$app->params['themeLogoLoginLight'])) {
    $themeLogoLoginLight = Yii::$app->params['themeLogoLoginLight'];
} else {
    $themeLogoLoginLight = 'logo-light.svg';
}

if(isset(Yii::$app->params['themeLogoLoginDark'])) {
    $themeLogoLoginDark = Yii::$app->params['themeLogoLoginDark'];
} else {
    $themeLogoLoginDark = 'logo.svg';
}

?>

<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary-subtle">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to continue.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="<?= $baseUrl; ?>/<?= $themeFolderImage; ?>/<?= $themeProfileImage; ?>" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div class="auth-logo">
                            <a href="javascript:void(0);" onclick="window.location.reload(true);" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="<?= $baseUrl; ?>/<?= $themeFolderImage; ?>/<?= $themeLogoLoginLight; ?>" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>

                            <a href="javascript:void(0);" onclick="window.location.reload(true);" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="<?= $baseUrl; ?>/<?= $themeFolderImage; ?>/<?= $themeLogoLoginDark; ?>" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <?php 
                                $form = ActiveForm::begin([
                                    'id' => 'login-form-vertical', 
                                    'type' => ActiveForm::TYPE_FLOATING,
                                    'class' => 'disable-submit-buttons',
                                ]); 
                            ?>
                                <?= $form->field($model, 'username') ?>

                                <?= $form->field($model, 'password')->passwordInput() ?>

                                <?= $form->field($model, 'rememberMe')->checkbox(['custom' => true]) ?>
                                
                                <div class="mt-3 d-grid">
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary waves-effect waves-light', 'data' => ['disabled-text' => 'Please Wait']]) ?>
                                </div>

                            <?php ActiveForm::end(); ?>
                        </div>
    
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <div>
                        <p><?= Yii::$app->params['yearCopyright'] . ' © ' . Yii::$app->params['companyName'];?>. Crafted with <i class="mdi mdi-coffee text-danger"></i> by <?= $author; ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php 
$scriptThemes = <<<JS

(function ($) {
    'use strict';
    function initPassword() {
        // show password input value
        $("#password-addon").on('click', function () {
            if ($(this).siblings('input').length > 0) {
                $(this).siblings('input').attr('type') == "password" ? $(this).siblings('input').attr('type', 'input') : $(this).siblings('input').attr('type', 'password');
            }
        })
    }

    function init() {
        initPassword();
    }

    init();
})(jQuery);

JS;
$this->registerJs($scriptThemes, yii\web\View::POS_END);
?>
