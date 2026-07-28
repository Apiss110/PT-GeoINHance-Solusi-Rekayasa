<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Helper privat untuk menambah kolom _en secara aman jika belum ada.
     */
    private function addTranslationColumn(string $tableName, string $columnName, string $type = 'string'): void
    {
        if (Schema::hasTable($tableName)) {
            $columnEn = $columnName . '_en';
            if (!Schema::hasColumn($tableName, $columnEn)) {
                Schema::table($tableName, function (Blueprint $table) use ($columnEn, $type) {
                    if ($type === 'text') {
                        $table->text($columnEn)->nullable();
                    } else {
                        $table->string($columnEn)->nullable();
                    }
                });
            }
        }
    }

    public function up(): void
    {
        // 1. Hero Sliders (Banner Front)
        $this->addTranslationColumn('hero_sliders', 'title', 'string');
        $this->addTranslationColumn('hero_sliders', 'subtitle', 'string');
        $this->addTranslationColumn('hero_sliders', 'description', 'text');

        // 2. Kategori Proyek
        $this->addTranslationColumn('project_categories', 'name', 'string');

        // 3. Portofolio Proyek
        $this->addTranslationColumn('strategic_projects', 'title', 'string');
        $this->addTranslationColumn('strategic_projects', 'location', 'string');
        $this->addTranslationColumn('strategic_projects', 'description', 'text');

        // 4. Blogs (News & Event)
        $this->addTranslationColumn('blogs', 'title', 'string');
        $this->addTranslationColumn('blogs', 'excerpt', 'text');
        $this->addTranslationColumn('blogs', 'content', 'text');

        // 5. Branches (Peta Proyek / Cabang)
        $this->addTranslationColumn('branches', 'name', 'string');
        $this->addTranslationColumn('branches', 'title', 'string');
        $this->addTranslationColumn('branches', 'desc', 'text');

        // 6. Videos
        $this->addTranslationColumn('videos', 'title', 'string');
        $this->addTranslationColumn('videos', 'description', 'text');

        // 7. Case Studies
        $this->addTranslationColumn('case_studies', 'title', 'string');
        $this->addTranslationColumn('case_studies', 'description', 'text');
        $this->addTranslationColumn('case_studies', 'content', 'text');

        // 8. Articles (Artikel & Insight)
        $this->addTranslationColumn('articles', 'title', 'string');
        $this->addTranslationColumn('articles', 'content', 'text');

        // 9. Syllabi (Silabus & Materi Training)
        $this->addTranslationColumn('syllabi', 'title', 'string');
        $this->addTranslationColumn('syllabi', 'description', 'text');

        // 10. Products
        $this->addTranslationColumn('products', 'name', 'string');
        $this->addTranslationColumn('products', 'description', 'text');

        // 11. Sectors
        $this->addTranslationColumn('sectors', 'name', 'string');
        $this->addTranslationColumn('sectors', 'description', 'text');

        // 12. Project Pages
        $this->addTranslationColumn('project_pages', 'title', 'string');
        $this->addTranslationColumn('project_pages', 'name', 'string');
        $this->addTranslationColumn('project_pages', 'description', 'text');
    }

    public function down(): void
    {
        // Rollback Opsional
    }
};