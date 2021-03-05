<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('activity_title');
            $table->string('venue');
            $table->date('target_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->foreignId('org_id')->constrained();
            $table->string('coorganization')->nullable();
            $table->string('organizer_name');
            $table->string('organizer_contact');
            $table->string('organizer_email');
            $table->string('coorganizer_name')->nullable(); //nullable
            $table->string('coorganizer_contact')->nullable(); //nullable
            $table->string('coorganizer_email')->nullable(); //nullable
            $table->string('activity_classification');
            $table->string('activity_classification2');
            $table->string('description');
            $table->string('rationale');
            $table->string('outcome');
            $table->string('primary_beneficiary');
            $table->integer('num_primary_beneficiary');
            $table->string('secondary_beneficiary')->nullable(); //nullable
            $table->integer('num_secondary_beneficiary')->nullable(); //nullable
            $table->boolean('has_rf');
            $table->string('activities');
            $table->date('date_needed')->nullable();
            $table->string('requi_type')->nullable();
            $table->json('item_details')->nullable();
            $table->float('total_cost')->nullable();
            $table->string('remarks')->nullable(); 
            $table->string('charged')->nullable();
            $table->string('comments')->nullable();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
