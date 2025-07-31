#!/bin/bash
# Script untuk memperbaiki masalah gambar dan konten

echo "Memperbaiki masalah storage link..."
cd /workspace

# Buat symbolic link untuk storage
if [ ! -L "public/storage" ]; then
    ln -sf ../storage/app/public public/storage
    echo "Storage link dibuat"
else
    echo "Storage link sudah ada"
fi

echo "Perbaikan selesai!"
