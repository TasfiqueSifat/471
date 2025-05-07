<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('agent_properties', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('property_name');
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->string('address');
            $table->text('other_details')->nullable();
    
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agent_properties');
    }
};