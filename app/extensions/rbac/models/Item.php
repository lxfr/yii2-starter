<?php

namespace justcoded\yii2\rbac\models;

use Yii;
use yii\helpers\ArrayHelper;

class Item
{
	const TYPE_ROLE = 1;
	const TYPE_PERMISSION = 2;

	const ROLE_GUEST = 'Guest';
	const ROLE_AUTHENTICATED = 'Authenticated';
	const ROLE_ADMIN = 'Administrator';
	const ROLE_MASTER = 'Master';

	const PERMISSION_ADMINISTER = 'administer';
	const PERMISSION_MASTER = '*';

	/**
	 * @return array|bool
	 */
	public function getPermissionsList()
	{
		$data = Yii::$app->authManager->getPermissions();

		if (!is_array($data)){
			return false;
		}

		return ArrayHelper::map($data, 'name', 'name');
	}

	/**
	 * @return array|bool
	 */
	public function getRolesList()
	{
		$data = Yii::$app->authManager->getRoles();

		if (!is_array($data)){
			return false;
		}

		return ArrayHelper::map($data, 'name', 'name');
	}
}
