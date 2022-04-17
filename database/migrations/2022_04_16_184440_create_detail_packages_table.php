<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('product_id')->unsignedBiginteger();
            $table->foreign('product_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->unsignedBiginteger('package_id')->unsignedBiginteger();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->integer('qty');
            $table->bigInteger('sub_total');
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
        Schema::dropIfExists('detail_packages');
    }
}
