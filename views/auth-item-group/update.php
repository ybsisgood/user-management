<?php

use ybsisgood\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var ybsisgood\modules\UserManagement\models\rbacDB\AuthItemGroup $model
 */

$this->title = UserManagementModule::t('back', 'Editing permission group') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Permission groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editing')
?>
<div class="auth-item-group-update">

	<div class="card">
		<div class="card-body">
			<?= $this->render('_form', compact('model')) ?>
		</div>
	</div>

</div>
