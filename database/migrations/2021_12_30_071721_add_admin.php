<?php

use App\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = [
            'name' => 'Bakibillah',
            'email' => 'bappypust@gmail.com',
            'password' => Hash::make('767121'),
            'phone' => '01841767121',
            'email_verified_at' => now(),
            'address'=> 'Dhaka, Bangladesh'
        ];
        Admin::create($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
