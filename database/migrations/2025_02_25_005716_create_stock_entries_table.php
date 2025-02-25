<?php

use App\Models\InventoryLogs;
use App\Models\StockItem;
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
        Schema::create('stock_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(StockItem::class)->nullable();
            $table->foreignIdFor(InventoryLogs::class)->nullable();
            $table->double('cost_per_unit');
            $table->double('quantity_added');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_entries');
    }
};
