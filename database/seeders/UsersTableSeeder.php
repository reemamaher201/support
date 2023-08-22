<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //إفراغ جدول الموظفين قبل إدخال البيانات الجديدة
        User::truncate();

        // إنشاء بيانات مستخدمين وحفظهم في جدول الموظفين
        User::insert([
                [
                    'emp_id' => 12345,
                    'emp_no' => 12345,
                    'emp_name' => 'ريما ماهر ابو عجوة',
                    'password' => Hash::make('reema123'),
                    'parent_unit' => 1, // اسم وحدة الدعم الفني
                    'isActive' => true,
                    'email' => 'reema123@gmail.com',
                    'created_at' => now()

                ],
                [
                    'emp_id' => 12346,
                    'emp_no' => 12346,
                    'emp_name' => 'محمد ماهر ابو عجوة',
                    'password' => Hash::make('mohammed123'),
                    'parent_unit' => 1, // اسم وحدة الدعم الفني
                    'isActive' => true,
                    'email' => 'mohammed123@gmail.com',
                    'created_at' => now()

                ],

                [
                    'emp_id' => 12347,
                    'emp_no' => 12347,
                    'emp_name' => 'ريهام ماهر ابو عجوة',
                    'password' => Hash::make('reham123'),
                    'parent_unit' => 1, // اسم وحدة الدعم الفني
                    'isActive' => false,
                    'email' => 'reham123@gmail.com',
                    'created_at' => now()

                ],

                [
                    'emp_id' => 12348,
                    'emp_no' => 12348,
                    'emp_name' => 'سراج ماهر ابو عجوة',
                    'password' => Hash::make('seraj123'),
                    'parent_unit' => 1, // اسم وحدة الدعم الفني
                    'isActive' => true,
                    'email' => 'seraj123@gmail.com',
                    'created_at' => now()

                ],

                [
                    'emp_id' => 12349,
                    'emp_no' => 12349,
                    'emp_name' => 'محمد محمد محمد ',
                    'password' => Hash::make('moh123'),
                    'parent_unit' => 2,
                    'isActive' => true,
                    'email' => 'moh123@gmail.com',
                    'created_at' => now()
                ],

                [
                    'emp_id' => 12350,
                    'emp_no' => 12350,
                    'emp_name' => 'احمد احمد احمد ',
                    'password' => Hash::make('ah123'),
                    'parent_unit' => 2,
                    'isActive' => true,
                    'email' => 'ah123@gmail.com',
                    'created_at' => now()
                ]
            ]
        );    }
}
