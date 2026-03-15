<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projets', function (Blueprint $table) {
            $table->string('lien_projet', 500)->nullable()->after('image_couverture');
        });
    }

    public function down(): void
    {
        Schema::table('projets', function (Blueprint $table) {
            $table->dropColumn('lien_projet');
        });
    }
};
