<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PsHeader', function (Blueprint $table) {
            $table->integer('PsId');
            $table->string('PsCode');
            $table->dateTime('PsDate');
            $table->string('PsBranch');
            $table->string('PsBranchCode');
            $table->decimal('PsSales');
            $table->decimal('PsExpenses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PsHeader');
    }
}
