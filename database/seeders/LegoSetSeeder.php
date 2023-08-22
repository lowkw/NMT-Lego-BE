<?php

namespace Database\Seeders;

use App\Models\legoSet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class LegoSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::withHeaders([
            'Authorization' => 'key '. env('REBRICKABLE_API_KEY'),
            'Accept' => 'application/json'
        ])->get(env('REBRICKABLE_API_V3_URL'). '/lego/sets/?page_size=1000');

        $body = json_decode($response->body());
        //$this->command->getOutput()->writeln("Request body:". $body);
        $countItems = $body->count;
        $pages = ceil($countItems / 1000);

        $output = new ConsoleOutput();
        $progressBar = new ProgressBar($output, $countItems);

        $this->command->getOutput()->writeln("<info>Seeding with {$countItems} Lego Sets.");
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
            foreach ($body->results as $set) {

                # Create set record
                $newSet = [
                    'set_num' => $set->set_num ?? null,
                    'name' => $set->name ?? null,
                    'year' => $set->year ?? null,
                    'num_parts' => $set->num_parts ?? null,
                    'set_img_url' => $set->set_img_url ?? null
                ];

                $theSet = legoSet::create($newSet);

                $progressBar->advance();

            }
        }

        $progressBar->finish();
        $this->command->getOutput()->writeln("");

    }
}
