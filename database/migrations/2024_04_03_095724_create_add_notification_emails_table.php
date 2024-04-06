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
        Schema::create('add_notification_emails', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('meeting_room_id')->nullable();
            $table->foreign('meeting_room_id')->references('id')->on('meeting_rooms')->onDelete('cascade')->onUpdate('cascade');

            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_notification_emails');
    }
};
