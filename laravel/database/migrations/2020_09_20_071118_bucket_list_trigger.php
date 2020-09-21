<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BucketListTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bucket_list_trigger', function (Blueprint $table) {
            $table->integer('bucket_list_id')->unsigned();
            $table->foreign('bucket_list_id')->references('id')->on('bucket_lists');
            $table->integer('trigger_id')->unsigned();
            $table->foreign('trigger_id')->references('id')->on('triggers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bucket_list_trigger');
    }
}
