<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesSeeder extends Seeder
{

    protected $defaultTypes = [
        [
            'id'                => 1,
            'display_name'      => 'Personal',
            'code'              => 'personal',
            'description'       => 'User type for personal accounts.',
            'can_receive_money' => 1,
            'can_send_money'    => 1
        ],
        [
            'id'                => 2,
            'display_name'      => 'Business',
            'code'              => 'business',
            'description'       => 'User type for business accounts.',
            'can_receive_money' => 1,
            'can_send_money'    => 0,
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('user_types')->insert($this->defaultTypes);
    }
}
