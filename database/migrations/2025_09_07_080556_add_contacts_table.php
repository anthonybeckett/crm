<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('company_number')->nullable();

			$table->enum('company_type', ['lead', 'prospect', 'client'])->default('lead');

			$table->string('address_line1')->nullable();
			$table->string('address_line2')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('postal_code')->nullable();
			$table->string('country')->nullable();

			$table->string('phone_number')->nullable();
			$table->string('email')->nullable();
			$table->string('website_url')->nullable();

			$table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->nullOnDelete();

			$table->string('industry')->nullable();
			$table->unsignedInteger('size')->nullable();
			$table->decimal('annual_revenue', 15, 2)->nullable();

			$table->timestamps();
		});
    }

    public function down(): void
    {
		Schema::dropIfExists('companies');
    }
};
