<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationality', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('nationality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nationality', function (Blueprint $table) {
            Schema::dropIfExists('nationality');
        });
    }
}
