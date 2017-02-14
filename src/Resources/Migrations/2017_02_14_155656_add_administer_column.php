<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdministerColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = app(config('administer.user_model', App\User::class))->getTable();

        Schema::table($table, function (Blueprint $table) {
            $table->integer('administer')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table = app(config('administer.user_model', App\User::class))->getTable();

        Schema::table($table, function (Blueprint $table) {
            $table->dropColumn('administer');
        });
    }
}
