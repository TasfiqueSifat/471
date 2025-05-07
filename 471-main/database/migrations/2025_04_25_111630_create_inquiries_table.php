<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('sender_username');
            $table->string('receiver_username');
            $table->integer('property_id');
            $table->text('message');
            $table->boolean('read')->default(false);
            $table->timestamps();
            
           
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};