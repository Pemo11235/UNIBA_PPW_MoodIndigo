<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('project_id')->unsigned()->nullable()->after('id');
            $table->foreign('project_id')
                ->on('projects')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->bigInteger('share_1_id')->unsigned()->nullable();
            $table->bigInteger('share_2_id')->unsigned()->nullable();
            $table->bigInteger('share_3_id')->unsigned()->nullable();

        });

        Schema::table('projects', function (Blueprint $table) {
            $table->bigInteger('share_1_id')->unsigned()->nullable();

            $table->bigInteger('share_2_id')->unsigned()->nullable();

            $table->bigInteger('share_3_id')->unsigned()->nullable();

        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('share_1_id')
                ->on('projects')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('share_2_id')
                ->on('projects')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('share_3_id')
                ->on('projects')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('projects', function (Blueprint $table) {

            $table->foreign('share_1_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('share_2_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('share_3_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
