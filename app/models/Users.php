<?php

namespace app\models;

use app\records\ActiveRecord;

class Users extends ActiveRecord
{
    public function table()
    {
        return 'users';
    }

    public function create()
    {
        return [
            'id' => 'integer',
            'name' => 'string',
            'gender' => 'integer',
            'dep_id' => 'integer',
        ];
    }

    public function fields()
    {
        return [];
    }
}
