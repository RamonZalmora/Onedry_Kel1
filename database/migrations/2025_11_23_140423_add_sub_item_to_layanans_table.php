<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('layanans', function (Blueprint $table) {
        $table->string('sub_item')->nullable()->after('tipe');
    });
}

public function down()
{
    Schema::table('layanans', function (Blueprint $table) {
        $table->dropColumn('sub_item');
    });
}

};
