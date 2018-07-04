<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('country_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('category_id');
            $table->string('made_date')->nullable();
            $table->string('expire_date')->nullable();
            $table->text('remark')->nullable();
            //0 we have in store
            //1 do not have
            $table->integer('isFinished')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drugs');
    }
}
