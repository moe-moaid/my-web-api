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
        Schema::create('herosection', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('position')->nullable(false); // 'link' column, not nullable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::table('herosection')->truncate();
        Schema::dropIfExists('herosection');
    }
};
