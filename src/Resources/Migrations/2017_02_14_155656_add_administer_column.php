<?php

use Facades\Administer\Administer;
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
        Schema::table(Administer::user()->getTable(), function (Blueprint $table) {
            $table->integer('administer')->default(0);
            $table->integer('administer_role')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Administer::user()->getTable(), function (Blueprint $table) {
            $table->dropColumn('administer');
        });
    }
}
