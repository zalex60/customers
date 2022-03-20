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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('dni',45);
            $table->unsignedBigInteger('id_com');
            $table->foreign('id_com')->references('id_com')->on('communes');
            $table->unsignedBigInteger('id_reg');
            $table->foreign('id_reg')->references('id_reg')->on('regions');
            $table->string('email',120);
            $table->string('name',45);
            $table->string('last_name',45);
            $table->string('address',45)->nullable();
            $table->enum("status", ['A', 'I', 'trash']);
            $table->date('date_reg');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
