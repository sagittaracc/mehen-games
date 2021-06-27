<?php

use app\models\Users;
use suql\db\Container;
use suql\syntax\Field;
use suql\syntax\Raw;

require 'vendor/autoload.php';

// Connect to the database
Container::create(require __DIR__ . '/app/config/db.php');

// Fetch data from the database
$data = Users::all()
			->select([
				'dep_id',
				Raw::expression("IF(gender=1, 'male', 'female') as gender"),
			])
			->group(['dep_id', 'gender'])
			->count(['gender' => 'count'])
			->fetchAll();
			
foreach ($data as $row) {
	echo sprintf(
		"Dep #%d: %d %s(s)\n",
		$row['dep_id'],
		$row['count'],
		$row['gender']
	);
}