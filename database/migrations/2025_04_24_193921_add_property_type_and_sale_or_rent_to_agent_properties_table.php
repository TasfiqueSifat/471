<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('agent_properties', function (Blueprint $table) {
            $table->string('property_type')->after('other_details');
            $table->string('sale_or_rent')->after('property_type');
        });
    }

    public function down()
    {
        Schema::table('agent_properties', function (Blueprint $table) {
            $table->dropColumn('property_type');
            $table->dropColumn('sale_or_rent');
        });
    }
};