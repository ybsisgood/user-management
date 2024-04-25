<?php

namespace ybsisgood\modules\UserManagement\controllers;

use Yii;
use ybsisgood\modules\UserManagement\models\UserVisitLog;
use ybsisgood\modules\UserManagement\models\search\UserVisitLogSearch;
use ybsisgood\components\AdminDefaultController;

/**
 * UserVisitLogController implements the CRUD actions for UserVisitLog model.
 */
class UserVisitLogController extends AdminDefaultController
{
	/**
	 * @var UserVisitLog
	 */
	public $modelClass = 'ybsisgood\modules\UserManagement\models\UserVisitLog';

	/**
	 * @var UserVisitLogSearch
	 */
	public $modelSearchClass = 'ybsisgood\modules\UserManagement\models\search\UserVisitLogSearch';

	public $enableOnlyActions = ['index', 'view', 'grid-page-size'];
}
