<?php
use ybsisgood\extensions\GridBulkActions\GridBulkActions;
use ybsisgood\extensions\GridPageSize\GridPageSize;
use ybsisgood\modules\UserManagement\components\GhostHtml;
use ybsisgood\modules\UserManagement\models\rbacDB\AuthItemGroup;
use ybsisgood\modules\UserManagement\models\rbacDB\Role;
use ybsisgood\modules\UserManagement\UserManagementModule;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/**
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var ybsisgood\modules\UserManagement\models\rbacDB\search\RoleSearch $searchModel
 * @var yii\web\View $this
 */
$this->title = UserManagementModule::t('back', 'Roles');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<p>
					<?= GhostHtml::a(
						'<span class="glyphicon glyphicon-plus-sign"></span> ' . UserManagementModule::t('back', 'Create'),
						['create'],
						['class' => 'btn btn-success']
					) ?>
				</p>
			</div>

			<div class="col-sm-6 text-right">
				<?= GridPageSize::widget(['pjaxId'=>'role-grid-pjax']) ?>
			</div>
		</div>

		<?php Pjax::begin([
			'id'=>'role-grid-pjax',
		]) ?>

		<?= GridView::widget([
			'id'=>'role-grid',
			'dataProvider' => $dataProvider,
			'pager'=>[
				'options'=>['class'=>'pagination pagination-sm'],
				'hideOnSinglePage'=>true,
				'lastPageLabel'=>'>>',
				'firstPageLabel'=>'<<',
			],
			'filterModel' => $searchModel,
			'layout'=>'{items}<div class="row"><div class="col-sm-8">{pager}</div><div class="col-sm-4 text-right">{summary}'.GridBulkActions::widget([
						'gridId'=>'role-grid',
						'actions'=>[ Url::to(['bulk-delete'])=>GridBulkActions::t('app', 'Delete'),],
					]).'</div></div>',
			'columns' => [
				['class' => 'yii\grid\SerialColumn', 'options'=>['style'=>'width:10px'] ],

				[
					'attribute'=>'description',
					'value'=>function(Role $model){
							return Html::a($model->description, ['view', 'id'=>$model->name], ['data-pjax'=>0]);
						},
					'format'=>'raw',
				],
				'name',
				['class' => 'yii\grid\CheckboxColumn', 'options'=>['style'=>'width:10px'] ],
				[
					'class' => 'yii\grid\ActionColumn',
					'contentOptions'=>['style'=>'width:70px; text-align:center;'],
				],
			],
		]); ?>

		<?php Pjax::end() ?>
	</div>
</div>