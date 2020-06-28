<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->uuid('company_uuid');
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->timestamps();

            //Set indexes
            $table->index(['name'], 'name_index');
            $table->index(['uuid'], 'uuid_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
