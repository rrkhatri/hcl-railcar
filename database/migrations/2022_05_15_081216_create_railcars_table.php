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
        Schema::create('railcars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('area', \App\Models\Railcar::areas());
            $table->timestamp('arrival_date')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->enum('status', \App\Models\Railcar::statuses());
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
        Schema::dropIfExists('railcars');
    }
};
