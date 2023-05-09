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
        Schema::create('infirmier', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom_inf');
            $table->string('prenom_inf');
            $table->string('email');
            $table->string('telephone');
            $table->string('specialite');
            $table->string('sexe');
            $table->string('password');
            $table->integer('status');
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
        Schema::dropIfExists('infirmier');
    }
};
