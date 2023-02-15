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
        Schema::create('where_am_i', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(now());
            $table->string('description');

            $table  ->foreignId('location_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->cascadeOnDelete();

            $table  ->foreignId('user_id')
                    ->constrained()
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();

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
        Schema::table('where_am_i', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->dropConstrainedForeignId('location_id');
        });
        Schema::dropIfExists('where_am_i');
    }
};
