<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sitename_ar');
            $table->string('sitename_en');
            $table->string('email');
            $table->string('tel');
            $table->string('address_ar');
            $table->string('address_en');
            $table->string('logo');
            $table->string('icon')->nullable();
            $table->enum('system_status', ['open', 'close'])->default('open');
            $table->longtext('system_message')->nullable();
            $table->longtext('footer_message_ar');
            $table->longtext('footer_message_en');
            $table->string('keywords');
            $table->string('description');
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
        Schema::dropIfExists('settings');
    }
}
