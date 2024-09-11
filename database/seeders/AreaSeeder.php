<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            'เคมี',
            'คณิตศาสตร์',
            'เทคโนโลยีสารสนเทศ',
            'ชีววิทยา',
            'วิทยาการคอมพิวเตอร์',
            'วิทยาศาสตร์การกีฬา',
            'ออกแบบแฟชั่นและธุรกิจสิ่งทอ',
            'วิทยาศาสตร์สิ่งแวดล้อม',
            'สถิติและวิทยาการสารสนเทศ',
            'สาธารณสุขศาสตร์',
            'เทคโนโลยีภูมิสารสนเทศและภูมิศาสตร์',
        ];

        $facultyId  = 1;
        foreach ($areas as $area) {
            DB::table('area')->insert([
                'areaName' => $area,
                'facultyId' => $facultyId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

