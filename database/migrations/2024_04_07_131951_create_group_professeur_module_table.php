<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('group_professeur_module', function (Blueprint $table) {
            $table->id();
            $table->string('group_code');
            $table->string('professeur_code');
            $table->string('module_code');
            $table->string('date_debut')->default('');
            $table->string('date_Efm')->default('');
            $table->integer('nbr_h_semaine')->default(0);
            $table->integer('nbr_pre_s_1');
            $table->integer('nbr_pre_s_2');
            $table->integer('nbr_dis_s_1');
            $table->integer('nbr_dis_s_2');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('group_code')->references('code_group')->on('groups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('professeur_code')->references('code_professeur')->on('professeurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('module_code')->references('code_module')->on('modules')->onDelete('cascade')->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_professeur_module');
    }
};
