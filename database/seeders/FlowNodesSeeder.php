<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlowNodesSeeder extends Seeder
{
    public function run()
    {
        DB::table('flow_nodes')->insert([
            [
                'code' => 'start',
                'label' => 'Start',
                'type'  => 'start'
            ],
            [
                'code' => 'input_start',
                'label' => 'Input Start',
                'type'  => 'control'
            ],
            [
                'code' => 'input_nama',
                'label' => 'Input Nama',
                'type'  => 'input'
            ],
            [
                'code' => 'input_alamat',
                'label' => 'Input Alamat',
                'type'  => 'input'
            ],
            [
                'code' => 'input_telepon',
                'label' => 'Input Telepon',
                'type'  => 'input'
            ],
            [
                'code' => 'input_perusahaan',
                'label' => 'Input Perusahaan',
                'type'  => 'input'
            ],
            [
                'code' => 'input_email',
                'label' => 'Input Email',
                'type'  => 'input'
            ],
            [
                'code' => 'input_jabatan',
                'label' => 'Input Jabatan',
                'type'  => 'input'
            ],
            [
                'code' => 'input_tgl_lahir',
                'label' => 'Input Tanggal Lahir',
                'type'  => 'input'
            ],
            [
                'code' => 'input_nik',
                'label' => 'Input NIK',
                'type'  => 'input'
            ],
            [
                'code' => 'payment',
                'label' => 'Payment',
                'type'  => 'payment'
            ],
            [
                'code' => 'input_end',
                'label' => 'Input End',
                'type'  => 'control'
            ],
            [
                'code' => 'end',
                'label' => 'End',
                'type'  => 'end'
            ],
        ]);
    }
}
