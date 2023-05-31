<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')
                ->constrained()
                ->cascadeOnDelete()
                ->onUpdate('cascade');
            $table->foreignId('doctor_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->onUpdate('cascade');
            $table->foreignId('branch_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->onUpdate('cascade');
            $table->json('diagnosis')->nullable();
            $table->string('photo')->nullable();
            $table->float('longitudinal_arch_left')->nullable();
            $table->float('longitudinal_arch_right')->nullable();
            $table->float('transverse_arch')->nullable();
            $table->text('pronator_type')->nullable();
            $table->float('pronator_left')->nullable();
            $table->float('pronator_right')->nullable();
            $table->tinyText('bus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('appointments');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
    }
};
