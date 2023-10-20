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
        Schema::create('terminis', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('time');
            $table->longText('text');
            $table->text('name');
            $table->text('lname');
            $table->text('email');
            $table->text('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terminis');
    }
};
