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
     Schema::create('tech_set', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('tech_name')->nullable(false); // 'platform' column, not nullable
            $table->string('tech_image')->nullable(false); // 'platform' column, not nullable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tech_set');
    }
};
