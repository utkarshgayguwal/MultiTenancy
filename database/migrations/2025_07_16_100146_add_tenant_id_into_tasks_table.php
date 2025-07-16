<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table("tasks", function (Blueprint $table){
            $table->foreignId("tenant_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("tasks", function (Blueprint $table){
            $table->dropForeign(["tenant_id"]);
            $table->dropColumn("tenant_id");
        });
    }
};
