<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAIToConsentform extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consentform', function (Blueprint $table) {
        $table->increments('consentForm_id');
        $table->text('form');
        $table->integer('adminid');
        $table->text('title');
        $table->timestamps();
        });

        DB::table('consentform')->insert(
          array(
            'consentForm_id'=>1,
            'form'=>'dummy 1',
            'adminid'=>1,
            'title'=>'form 1'
          )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
