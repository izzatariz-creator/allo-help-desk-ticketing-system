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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_ref')->nullable();
            $table->string('user_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->string('category')->nullable();
            $table->string('priority')->nullable();
            $table->string('address')->nullable();
            $table->string('rsp_id')->nullable();
            $table->string('modem_id')->nullable();
            $table->string('router_id')->nullable();
            $table->string('technician_id')->nullable()->comment('Assigned Technician ID');
            $table->timestamps();
            $table->dateTime('date_closed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
