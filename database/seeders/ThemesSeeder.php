<?php

namespace Database\Seeders;

use App\Models\legoSet;
use App\Models\themes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class ThemesSeeder extends Seeder
{
    /**
     * Run the theme database seeds.
     */
    public function run(): void
    {
        $response = Http::withHeaders([
            'Authorization' => 'key '. env('REBRICKABLE_API_KEY'),
            'Accept' => 'application/json'
        ])->get(env('REBRICKABLE_API_V3_URL'). '/lego/themes/?page_size=1000');

        $body = json_decode($response->body());
        //$this->command->getOutput()->writeln("Request body:". $body);
        $countItems = $body->count;
        $pages = ceil($countItems / 1000);

        $output = new ConsoleOutput();
        $progressBar = new ProgressBar($output, $countItems);

        $this->command->getOutput()->writeln("<info>Seeding with {$countItems} Theme.");
        $this->command->getOutput()->writeln("<info>There are {$pages} pages.");
        for($x = 1; $x <= $pages; $x++) {
            $this->command->getOutput()->writeln("<info>Doing request {$x}");
            if($x !== 1) {
                $response = Http::withHeaders([
                    'Authorization' => 'key ' . env('REBRICKABLE_API_KEY'),
                    'Accept' => 'application/json'
                ])->get($body->next);
                $body = json_decode($response->body());
            }
            foreach ($body->results as $theme) {

                # Create theme record
                $newTheme = [
                    'id' => $theme->id,
                    'parent_id' => $theme->parent_id ?? null,
                    'name' => $theme->name ?? null,
                ];

                $theTheme = themes::create($newTheme);

                $progressBar->advance();

            }
        }

        $progressBar->finish();
        $this->command->getOutput()->writeln("");
    }
}
