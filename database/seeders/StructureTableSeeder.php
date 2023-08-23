<?php

namespace Database\Seeders;

use App\Models\Structure;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StructureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //إفراغ جدول الموظفين قبل إدخال البيانات الجديدة
        Structure::truncate();

        // إنشاء بيانات مستخدمين وحفظهم في جدول الموظفين
        Structure::insert([
            [
                'unit_type' => 'دائرة',
                'unit_name' => 'الدعم الفني',
                'unit_parent_id' => 4,
                'created_at' => now()

            ],
            [
                'unit_type' => 'ادارة',
                'unit_name' => 'الحسابات',
                'unit_parent_id' => 4,
                'created_at' => now()

            ],
            [
                'unit_type' => 'دائرة',
                'unit_name' => 'الموارد و الصرف',
                'unit_parent_id' => 4,
                'created_at' => now()

            ],
            ]);
    }
}
