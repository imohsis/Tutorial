<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSolutionColumnThreadsTable extends Migration
{

    public function up()
    {
        Schema::table('threads', function (Blueprint $table) {

            $table->unsignedInteger('solution')->nullable();
        });
    }


    public function down()
    {
        Schema::table('threads', function (Blueprint $table) {

            $table->dropColumn('solution');
        });
    }
}
