<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumnsIntoBucketListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bucket_lists', function (Blueprint $table) {
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->integer('publishing')->default(0);
            $table->integer('num')->default(0);
            $table->integer('seriousness')->default(0);
            $table->datetime('date')->nullable();
            $table->time('start')->nullable();
            $table->time('end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bucket_lists', function (Blueprint $table) {
             Schema::dropIfExists('bucket_lists');
        });
    }
}