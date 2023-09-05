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
        Schema::create('aboutsection', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('title')->nullable(false); // 'platform' column, not nullable
            $table->string('description')->nullable(false); // 'link' column, not nullable
            $table->string('aboutImage')->nullable(false); // 'link' column, not nullable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutsection');
    }
};
