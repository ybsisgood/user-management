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
                                <img src="<?= $baseUrl; ?>/themes/skote/assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div class="auth-logo">
                            <a href="javascript:void(0);" onclick="window.location.reload(true);" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="<?= $baseUrl; ?>/themes/skote/assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>

                            <a href="javascript:void(0);" onclick="window.location.reload(true);" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="<?= $baseUrl; ?>/themes/skote/assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <?php 
                                $form = ActiveForm::begin([
                                    'id' => 'login-form-vertical', 
                                    'type' => ActiveForm::TYPE_FLOATING
                                ]); 
                            ?>
                                <?= $form->field($model, 'username') ?>

                                <?= $form->field($model, 'password')->passwordInput() ?>

                                <?= $form->field($model, 'rememberMe')->checkbox(['custom' => true]) ?>
                                
                                <div class="mt-3 d-grid">
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary waves-effect waves-light']) ?>
                                </div>

                            <?php ActiveForm::end(); ?>
    
                                <!-- <div class="mt-4 text-center">
                                    <h5 class="font-size-14 mb-3">Sign in with</h5>
    
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                <i class="mdi mdi-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->

                                <!-- <div class="mt-4 text-center">
                                    <a href="#" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                </div> -->
                        </div>
    
                    </div>
                </div>
                <div class="mt-5 text-center">
                    
                    <div>
                        <p><?= Yii::$app->params['yearCopyright'] . ' © ' . Yii::$app->params['companyName'];?>. Crafted with <i class="mdi mdi-coffee text-danger"></i></p>
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
