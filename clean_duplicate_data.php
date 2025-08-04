<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\VisiMisi;

echo "=== CLEANING DUPLICATE DATA ===\n";

$allData = VisiMisi::all();
echo "Total records: " . $allData->count() . "\n";

foreach ($allData as $item) {
    echo "ID: " . $item->id . ", Active: " . ($item->is_active ? 'Yes' : 'No') . ", Created: " . $item->created_at . "\n";
}

// Keep only the first record and delete others
if ($allData->count() > 1) {
    $firstRecord = $allData->first();
    $otherRecords = $allData->where('id', '!=', $firstRecord->id);
    
    echo "\nDeleting " . $otherRecords->count() . " duplicate records...\n";
    
    foreach ($otherRecords as $record) {
        echo "Deleting record ID: " . $record->id . "\n";
        $record->delete();
    }
    
    echo "✅ Cleanup completed!\n";
} else {
    echo "✅ No duplicates found.\n";
}

echo "\nFinal data:\n";
$finalData = VisiMisi::all();
foreach ($finalData as $item) {
    echo "ID: " . $item->id . ", Active: " . ($item->is_active ? 'Yes' : 'No') . ", Visi: " . substr($item->visi, 0, 30) . "...\n";
}

echo "\n=== END CLEANUP ===\n"; 