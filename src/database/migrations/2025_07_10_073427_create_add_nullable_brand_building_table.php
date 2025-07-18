
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddNullableBrandBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('brand_name', 100)->nullable()->change(); // brand_nameをnullableに変更
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->string('building', 255)->nullable()->change(); // buildingをnullableに変更
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('brand_name', 100)->nullable(false)->change(); // brand_nameを元に戻す
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->string('building', 255)->nullable(false)->change(); // buildingを元に戻す
        });
    }
}
