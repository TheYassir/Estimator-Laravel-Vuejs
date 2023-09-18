<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatePresetValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate_preset_values', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('value');
            $table->integer('time')->nullable();
            $table->integer('startup_time')->nullable();
            $table->integer('total_percentage')->nullable();
            $table->foreignId('estimate_field_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('estimate_preset_values');
    }
}
