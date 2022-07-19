<?php

use App\Models\ProductType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('barcode');
            $table->string('name_th')->comment('ชื่อสินค้าภาษาไทย');
            $table->string('name_en')->nullable();
            $table->float('cost')->default(0);
            $table->float('price')->default(0);
            $table->text('photo')->nullable();
            $table->foreignIdFor(ProductType::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
