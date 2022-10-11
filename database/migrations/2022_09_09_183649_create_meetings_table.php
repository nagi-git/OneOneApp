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
            $table->string('title')->comment('会議のタイトル');
            $table->dateTime('start_date_time')->comment('開始日時');
            $table->dateTime('end_date_time')->comment('終了日時');
            $table->text('agenda')->comment('会議の内容');
            $table->text('how')->comment('会議の方法');
            $table->systemColumns();
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
