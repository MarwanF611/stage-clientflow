<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CharifyCountriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Config::get('countries.table_name'), function ($table) {

            if (Schema::getConnection()->getDriverName() == 'sqlite') {
                $table->char('country_code', 3)->default('')->change();
                $table->char('iso_3166_2', 2)->default('')->change();
                $table->char('iso_3166_3', 3)->default('')->change();
                $table->char('region_code', 3)->default('')->change();
                $table->char('sub_region_code', 3)->default('')->change();
            } else {
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY country_code CHAR(3) NOT NULL DEFAULT ''");
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY iso_3166_2 CHAR(2) NOT NULL DEFAULT ''");
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY iso_3166_3 CHAR(3) NOT NULL DEFAULT ''");
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY region_code CHAR(3) NOT NULL DEFAULT ''");
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY sub_region_code CHAR(3) NOT NULL DEFAULT ''");
            }
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {



        Schema::table(Config::get('countries.table_name'), function ($table) {

            if (Schema::getConnection()->getDriverName() == 'sqlite') {
                $table->string('country_code', 3)->default('')->change();
                $table->string('iso_3166_2', 2)->default('')->change();
                $table->string('iso_3166_3', 3)->default('')->change();
                $table->string('region_code', 3)->default('')->change();
                $table->string('sub_region_code', 3)->default('')->change();
            } else {
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY country_code VARCHAR(3) NOT NULL DEFAULT ''");
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY iso_3166_2 VARCHAR(2) NOT NULL DEFAULT ''");
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY iso_3166_3 VARCHAR(3) NOT NULL DEFAULT ''");
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY region_code VARCHAR(3) NOT NULL DEFAULT ''");
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY sub_region_code VARCHAR(3) NOT NULL DEFAULT ''");
            }
        });
    }
}
