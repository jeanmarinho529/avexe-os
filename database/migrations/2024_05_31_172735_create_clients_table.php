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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id')->constrained();
            $table->string('name');
            $table->string('document', 14);
            $table->enum('document_type', ['cpf', 'cnpj']);
            $table->date('birth_date');
            $table->string('email')->nullable();
            $table->string('phone_one', 11);
            $table->string('phone_two', 11)->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
