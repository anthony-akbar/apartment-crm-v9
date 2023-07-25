<?php

namespace App\Console\Commands;

use App\Models\Appartment;
use Illuminate\Console\Command;

class FillCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = 1;
        $floor = 1;
        $table = [
            [2,1,66,0,750,'active'],
            [2,1,75.80,0,750,'active'],
            [1,1,47,0,750,'active'],
            [2,1,71.2,0,750,'active'],
            [2,1,56,0,750,'active'],
            [2,1,56,0,750,'active'],
            [2,1,71.2,0,750,'active'],
            [1,1,47,0,750,'active'],
            [2,1,75.80,0,750,'active'],
            [2,1,66,0,750,'active'],
            [2,1,66.10,0,750,'active'],
            [1,1,61.70,0,750,'active'],
            [3,1,100.70,0,750,'active'],
            [2,1,69.6,0,750,'active'],
            [3,1,97.9,0,750,'active'],
            [3,1,97.9,0,750,'active'],
            [2,1,69.6,0,750,'active'],
            [3,1,100.70,0,750,'active'],
            [1,1,61.70,0,750,'active'],
            [2,1,66.10,0,750,'active'],
            [2,1,66,0,750,'active'],
            [2,1,75.80,0,750,'active'],
            [1,1,47,0,750,'active'],
            [2,1,71.2,0,750,'active'],
            [2,1,56,0,750,'active'],
            [2,1,56,0,750,'active'],
            [2,1,71.2,0,750,'active'],
            [1,1,47,0,750,'active'],
            [2,1,75.80,0,750,'active'],
            [2,1,66,0,750,'active'],
        ];

        for($i = 0; $i < 8; $i++) {
            $price = 700;
            foreach ($table as $item){
                if($floor === 1 || $floor === 2 || $floor === 3) {
                    $price = 750;
                }
                Appartment::create([
                    'number' => $count,
                    'rooms' => $item[0],
                    'floor' => $floor,
                    'square' => $item[2],
                    'terace' => $item[3],
                    'price' => $price,
                    'total' => $price * $item[2],
                    'status' => $item[5]
                ]);
                $count++;
            }
            $floor++;
        }



    }
}
