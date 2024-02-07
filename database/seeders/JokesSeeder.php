<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Joke;

class JokesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->importFromCsv();
    }

    private function importFromCsv(){
        $path = storage_path('jokes.csv');
        $file = fopen($path, 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            $joke = new Joke();
            $joke->joke = $line[0];
            $joke->rating = rand(0,5);
            $joke->save();
        }
        fclose($file);
    }
}
