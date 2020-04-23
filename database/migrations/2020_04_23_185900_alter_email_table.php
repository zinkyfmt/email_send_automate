<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emails', function (Blueprint $table) {
            $table->integer('sent_count')->length(255)->nullable();
            $table->integer('is_replied')->length(2)->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emails', function (Blueprint $table) {
            //
        });
    }
}
