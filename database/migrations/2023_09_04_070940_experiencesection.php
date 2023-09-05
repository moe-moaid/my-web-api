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
        Schema::create('experiencesection', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('position')->nullable(false);
            $table->string('company')->nullable(false);
            $table->string('start_date')->nullable(false);
            $table->string('end_date')->nullable();
            $table->string('exp_Image')->nullable(false);
            $table->string('currently_working')->nullable();
            $table->string('summery')->nullable(false);
            $table->string('technologies')->nullable(false);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiencesection');
    }
};
