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
        Schema::create('projectsection', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('project_image')->nullable(false); // 'platform' column, not nullable
            $table->string('project_title')->nullable(false); // 'link' column, not nullable
            $table->string('project_desc')->nullable(false); // 'link' column, not nullable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projectsection');
    }
};
