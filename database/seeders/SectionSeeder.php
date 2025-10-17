<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'slug'           => 'section-1',
                'name_en'        => 'Home',
                'name_ar'        => 'الرئيسية',
                'description_en' => 'Home Description',
                'description_ar' => 'وادي الليسين هو مشروع تطوير عقاري متعدد الاستخدامات في حي أم الحمام الغربي بالرياض، يضم مبانٍ تجارية وسكنية. بالإضافة إلى مساحات عامة ومناطق متنوعة مثل المطاعم والكافيتريات وخدمات العناية الشخصية. ويهدف ليكون وجهة متكاملة تجمع بين العمل والترفيه في مكان واحد.',
            ],
            [
                'slug'           => 'section-2',
                'name_en'        => 'About us',
                'name_ar'        => 'عنا',
                'description_en' => 'About Us',
                'description_ar' => 'ارسل استفسارك وسيقوم فريقنا بالاتصال بك',
            ],
            [
                'slug'           => 'section-3',
                'name_en'        => 'vision',
                'name_ar'        => 'الرؤية',
                'description_en' => 'vision',
                'description_ar' => 'الرؤية الرؤية الرؤية',
            ],
            [
                'slug'           => 'section-4',
                'name_en'        => 'section-4-name-en',
                'name_ar'        => 'section-4-name-ar',
                'description_en' => 'section-4-description-en',
                'description_ar' => 'section-4-description-ar',
            ],
            [
                'slug'           => 'section-5',
                'name_en'        => 'section-5-name-en',
                'name_ar'        => 'section-5-name-ar',
                'description_en' => 'section-5-description-en',
                'description_ar' => 'section-5-description-ar',
            ],
            [
                'slug'           => 'section-5',
                'name_en'        => 'section-5-name-en',
                'name_ar'        => 'section-5-name-ar',
                'description_en' => 'section-5-description-en',
                'description_ar' => 'section-5-description-ar',
            ],
        ];

        Section::upsert(
            $data,
            ['slug'],
            ['name_en', 'name_ar', 'description_en', 'description_ar'] // columns to update
        );
    }
}
