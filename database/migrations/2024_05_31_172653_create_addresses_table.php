<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('number', 10)->nullable();
            $table->string('neighborhood');
            $table->string('city');
            $table->enum('state', [
                'ac',
                'al',
                'ap',
                'am',
                'ba',
                'ce',
                'df',
                'es',
                'go',
                'ma',
                'mt',
                'ms',
                'mg',
                'pa',
                'pb',
                'pr',
                'pe',
                'pi',
                'rj',
                'rn',
                'rs',
                'ro',
                'rr',
                'sc',
                'sp',
                'se',
                'to',
            ]);
            $table->string('zip_code', 8);
            $table->string('complement')->nullable();
            $table->string('landmark')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
