<?php

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
        Schema::create("carts", function(Blueprint $table){
            $table->id();
            $table->integer("prod_id");
            $table->string("prod_name");
            $table->integer("prod_qty");
            $table->integer("total_price");
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
