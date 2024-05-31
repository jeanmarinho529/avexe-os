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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('trade_name');
            $table->string('company_name');
            $table->string('document', 14);
            $table->enum('document_type', ['cpf', 'cnpj']);
            $table->string('email')->unique();
            $table->string('phone', 11);
            $table->foreignId('address_id')->constrained();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['document', 'document_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
