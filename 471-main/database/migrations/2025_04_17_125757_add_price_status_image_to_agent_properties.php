<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('agent_properties', function (Blueprint $table) {
            $table->decimal('price', 12, 2)->nullable()->after('other_details');
            $table->string('status')->default('pending')->after('price'); 
            $table->string('image_path')->nullable()->after('status');
        });
    }

    public function down()
    {
        Schema::table('agent_properties', function (Blueprint $table) {
            $table->dropColumn(['price', 'status', 'image_path']);
        });
    }
};