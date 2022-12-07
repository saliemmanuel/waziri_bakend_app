<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_administrations', function (Blueprint $table) {
            $table->id();
            $table->string("code_admin");
            $table->string("remember_code_admin");
            $table->unsignedBigInteger('id_admin')->unique();
            $table->foreign('id_admin')->references('id')->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('code_administrations');
    }
};
