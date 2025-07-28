<?php

if (!function_exists('format_rupiah')) {
    function format_rupiah($angka, $prefix = 'Rp ') {
        if ($angka === null) return '-';
        return $prefix . number_format($angka, 0, ',', '.');
    }
}