<?php
echo "=== MEMPERBAIKI MASALAH APLIKASI ===\n";

// 1. Membuat symbolic link storage
echo "1. Memperbaiki Storage Link...\n";
$publicStoragePath = 'public/storage';
$targetPath = '../storage/app/public';

if (file_exists($publicStoragePath)) {
    if (is_link($publicStoragePath)) {
        unlink($publicStoragePath);
    } elseif (is_dir($publicStoragePath)) {
        rmdir($publicStoragePath);
    }
}

if (symlink($targetPath, $publicStoragePath)) {
    echo "✓ Storage link berhasil dibuat\n";
} else {
    echo "✗ Gagal membuat storage link\n";
}

// 2. Memeriksa struktur direktori storage
echo "\n2. Memeriksa struktur storage...\n";
$storageDirectories = [
    'storage/app/public',
    'storage/app/public/artikel',
    'storage/app/public/kurikulum',
    'storage/app/public/kurikulum/header',
    'storage/app/public/kurikulum/items'
];

foreach ($storageDirectories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        echo "✓ Direktori $dir dibuat\n";
    } else {
        echo "✓ Direktori $dir sudah ada\n";
    }
}

echo "\n=== PERBAIKAN SELESAI ===\n";
echo "Silakan cek kembali tampilan gambar di website.\n";
