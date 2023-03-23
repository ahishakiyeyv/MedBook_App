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
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->string('nom_patient');
            $table->string('prenom_patient');
            $table->string('email');
            $table->string('telephone');
            $table->string('adresse');
            $table->string('password');
            $table->unsignedBigInteger('rendezvous_id');
            $table->foreign('rendezvous_id')->references('id')->on('rendezvous')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('patient');
    }
};
