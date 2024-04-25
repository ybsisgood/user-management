<?php
/**
 * @var $this yii\web\View
 * @var $model ybsisgood\modules\UserManagement\models\forms\LoginForm
 */

use ybsisgood\modules\UserManagement\components\GhostHtml;
use ybsisgood\modules\UserManagement\UserManagementModule;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
?>

<div class="container" id="login-wrapper">
	<div class="row justify-content-md-center">
		<div class="col col-md-4 col-md-offset-4">
			<div class="card panel">
				<div class="card-header">
					<?= Yii::$app->params['panelTitle'] ?? UserManagementModule::t('front', 'Authorization') ?>
				</div>
				<div class="card-body">

					<?php $form = ActiveForm::begin([
						'id'      => 'login-form',
						'options'=>['autocomplete'=>'off'],
						'validateOnBlur'=>false,
						'fieldConfig' => [
							'template'=>"{input}\n{error}",
						],
					]) ?>

					<?= $form->field($model, 'username')
						->textInput(['placeholder'=>$model->getAttributeLabel('username'), 'autocomplete'=>'off']) ?>

					<?= $form->field($model, 'password')
						->passwordInput(['placeholder'=>$model->getAttributeLabel('password'), 'autocomplete'=>'off']) ?>

					<?= (isset(Yii::$app->user->enableAutoLogin) && Yii::$app->user->enableAutoLogin) ? $form->field($model, 'rememberMe')->checkbox(['value'=>true]) : '' ?>

					<?= Html::submitButton(
						UserManagementModule::t('front', 'Login'),
						['class' => 'btn btn-lg btn-primary btn-block']
					) ?>

					<div class="row registration-block">
						<div class="col-sm-6">
							<?= GhostHtml::a(
								UserManagementModule::t('front', "Registration"),
								['/user-management/auth/registration']
							) ?>
						</div>
						<div class="col-sm-6 text-right">
							<?= GhostHtml::a(
								UserManagementModule::t('front', "Forgot password ?"),
								['/user-management/auth/password-recovery']
							) ?>
						</div>
					</div>
					<?php ActiveForm::end() ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$css = <<<CSS
html, body {
	background: #eee;
	-webkit-box-shadow: inset 0 0 100px rgba(0,0,0,.5);
	box-shadow: inset 0 0 100px rgba(0,0,0,.5);
	height: 100%;
	min-height: 100%;
	position: relative;
}
#login-wrapper {
	position: relative;
	top: 30%;
}
#login-wrapper .registration-block {
	margin-top: 15px;
}
CSS;

$this->registerCss($css);
?>