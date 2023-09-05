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
        Schema::create('contactinfo', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('platform')->nullable(false); // 'platform' column, not nullable
            $table->string('link')->nullable(false); // 'link' column, not nullable
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
        DROP TABLE `herosection`;
        DROP TABLE `migrations`;
        DROP TABLE `contactinfo`;
        DROP TABLE `experiencesection`;
        DROP TABLE `aboutsection`;
     */
    public function down()
    {
        Schema::dropIfExists('contactinfo');
    }
};