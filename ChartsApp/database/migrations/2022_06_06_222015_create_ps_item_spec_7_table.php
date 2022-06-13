<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsItemSpec7Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PsItemSpec7', function (Blueprint $table) {
            $table->integer('PsId');
            $table->string('PsCode');
            $table->dateTime('PsDate');
            $table->string('PsBranch');
            $table->string('PsBranchCode');
            $table->integer('Is7Id');
            $table->string('Is7Code');
            $table->string('Is7Name1');
            $table->string('Is7Name2');
            $table->decimal('PsIs7Sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PsItemSpec7');
    }
}
