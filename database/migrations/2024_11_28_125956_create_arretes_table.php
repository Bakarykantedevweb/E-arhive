<?php

use App\Models\Mention;
use App\Models\Nature;
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
        Schema::create('arretes', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->date('date_signature');
            $table->foreignIdFor(Nature::class)->constrained();
            $table->foreignIdFor(Mention::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arretes');
    }
};
