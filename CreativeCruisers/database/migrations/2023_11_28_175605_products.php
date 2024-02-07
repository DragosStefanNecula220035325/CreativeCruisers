<?php

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("products", function (Blueprint $table) {
            $table->id()->nullable();
            
            $table->string("name")->nullable();
            $table->string("price")->nullable();
            $table->string("description")->nullable();
            $table->string("file")->nullable();
            $table->string("category")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
