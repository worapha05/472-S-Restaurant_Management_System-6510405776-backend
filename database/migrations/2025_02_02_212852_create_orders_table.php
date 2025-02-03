<?php

use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
//            $table->foreignIdFor(App\Models\Table::class); //wait for Table 'table'
            $table->text('address')->nullable();
            $table->timestamp('accept')->nullable();
            $table->string('status')->default('PENDING');
            $table->string('type');
            $table->string('payment_method');
            $table->double('sum_price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
