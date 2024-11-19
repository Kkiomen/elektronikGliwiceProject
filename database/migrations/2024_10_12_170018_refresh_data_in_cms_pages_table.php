<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $jsonFilePath = database_path('json/example_page.json');

        // Odczytaj zawartość pliku
        $jsonData = file_get_contents($jsonFilePath);

        DB::table('cms_pages')->truncate();
        // Wstaw dane do tabeli
        DB::table('cms_pages')->insert([
            'name' => 'Strona Główna',
            'json_page' => $jsonData
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cms_pages', function (Blueprint $table) {
            //
        });
    }
};
