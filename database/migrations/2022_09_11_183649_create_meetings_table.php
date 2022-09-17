<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->timestamp('meeting_date')->comment('会議の日時');
            $table->string('title')->comment('会議のタイトル');
            $table->text('agenda')->comment('会議の内容');
            $table->text('other')->comment('その他');
            $table->foreignId('minute_id')->constrained('minutes')->onDelete('cascade')->comment('議事録id');
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
        Schema::dropIfExists('meetings');
    }
};
