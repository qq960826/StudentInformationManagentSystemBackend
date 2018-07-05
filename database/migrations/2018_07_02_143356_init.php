<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Init extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserAccount', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 16)->nullable(false)->unique()->index();
            $table->string('password', 32)->nullable(false);
            $table->unsignedTinyInteger('type');
            $table->boolean('locked')->default(false);

            $table->timestamps();
        });

        Schema::create('UserInfo', function (Blueprint $table) {
            $table->integer("uid")->unsigned()->unique()->index();
            $table->foreign('uid')->references('id')->on('UserAccount')->onDelete('cascade');;

            $table->string('name', 16)->nullable(false)->index();
            $table->boolean('sex')->nullable(false);
            $table->string('identity', 18)->nullable(false)->unique()->index();
            $table->date("birthday")->nullable(false);
            $table->string("nativeplace", 20)->nullable(false);
            $table->string("hobby", 100)->nullable(true);


            $table->timestamps();

        });

        Schema::create('Classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique()->index();
            $table->timestamps();
        });

        Schema::create('Instructor', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("uid")->unsigned()->index();
            $table->foreign('uid')->references('id')->on('UserAccount')->onDelete('cascade');;

            $table->integer("classid")->unsigned()->index();
            $table->foreign('classid')->references('id')->on('Classes')->onDelete('cascade');;

            $table->unique(['uid', 'classid']);
            $table->timestamps();
        });


        Schema::create('StudentInfo', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("uid")->unsigned()->index();
            $table->foreign('uid')->references('id')->on('UserAccount')->onDelete('cascade');

            $table->integer("classid")->unsigned()->index();
            $table->foreign('classid')->references('id')->on('Classes')->onDelete('cascade');;

            $table->string('studentid', 20)->nullable(false)->unique()->index();

            $table->date("enrollyear")->nullable(false);

            $table->timestamps();
        });

        Schema::create('Course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique()->index();
            $table->timestamps();
        });

        Schema::create('Semester', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique()->index();
            $table->timestamps();
        });

        Schema::create('CourseScore', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("uid")->unsigned()->index();
            $table->foreign('uid')->references('id')->on('UserAccount')->onDelete('cascade');;

            $table->integer("courseid")->unsigned()->index();
            $table->foreign('courseid')->references('id')->on('Course')->onDelete('cascade');;

            $table->integer("semesterid")->unsigned()->index();
            $table->foreign('semesterid')->references('id')->on('Semester')->onDelete('cascade');;

            $table->float('score');

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

        Schema::dropIfExists("CourseScore");
        Schema::dropIfExists("Semester");
        Schema::dropIfExists("Course");
        Schema::dropIfExists("StudentInfo");

        Schema::dropIfExists("Instructor");
        Schema::dropIfExists("Classes");

        Schema::dropIfExists("UserInfo");

        Schema::dropIfExists("UserAccount");

    }
}
