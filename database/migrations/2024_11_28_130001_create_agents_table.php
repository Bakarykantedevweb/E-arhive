<?php

use App\Models\Cadre;
use App\Models\Corps;
use App\Models\Ministere;
use App\Models\Position;
use App\Models\Regimes;
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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->foreignIdFor(Position::class)->constrained();
            $table->foreignIdFor(Cadre::class)->constrained();
            $table->foreignIdFor(Corps::class)->constrained();
            $table->foreignIdFor(Regimes::class)->constrained();
            $table->foreignIdFor(Ministere::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
