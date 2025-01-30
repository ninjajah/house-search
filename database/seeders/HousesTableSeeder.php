<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Seeder;

class HousesTableSeeder extends Seeder
{
    public function run(): void
    {
        $csvFile = fopen(base_path('database/data/property-data.csv'), 'r');
        fgetcsv($csvFile);

        while (($row = fgetcsv($csvFile)) !== false) {
            House::create([
                'name' => $row[0],
                'price' => $row[1],
                'bedrooms' => $row[2],
                'bathrooms' => $row[3],
                'storeys' => $row[4],
                'garages' => $row[5],
            ]);
        }

        fclose($csvFile);
    }
}
