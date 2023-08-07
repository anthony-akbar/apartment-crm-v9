<?php

namespace App\Console\Commands;

use App\Models\Apartment;
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
            [2,1,66,1,750,1, '66'],
            [2,1,75.80,1,750,1, '75,80'],
            [1,1,47,1,750,1, '47'],
            [2,1,71.2,1,750,1, '71,20'],
            [2,1,56,1,750,1, '56'],
            [2,1,56,2,750,1, '56'],
            [2,1,71.2,2,750,1, '71,20'],
            [1,1,47,2,750,1, '47'],
            [2,1,75.80,2,750,1, '75,80'],
            [2,1,66,2,750,1, '66'],
            [2,1,66.10,3,750,1, '66,10'],
            [1,1,61.70,3,750,1, '61,70'],
            [3,1,100.70,3,750,1, '100,70'],
            [2,1,69.6,3,750,1, '69,60'],
            [3,1,97.9,3,750,1, '97,90'],
            [3,1,97.9,4,750,1, '97,90'],
            [2,1,69.6,4,750,1, '69,60'],
            [3,1,100.70,4,750,1, '100,70'],
            [1,1,61.70,4,750,1, '61,70'],
            [2,1,66.10,4,750,1, '66,10'],
            [2,1,66,5,750,1, '66'],
            [2,1,75.80,5,750,1, '75,80'],
            [1,1,47,5,750,1, '47'],
            [2,1,71.2,5,750,1, '71,20'],
            [2,1,56,5,750,1, '56'],
            [2,1,56,6,750,1, '56'],
            [2,1,71.2,6,750,1, '71,20'],
            [1,1,47,6,750,1, '47'],
            [2,1,75.80,6,750,1, '75,80'],
            [2,1,66,6,750,1, '66'],
        ];

        for($i = 0; $i < 8; $i++) {
            $price = 700;
            foreach ($table as $item){
                if($floor === 1 || $floor === 2 || $floor === 3) {
                    $price = 750;
                }
                Apartment::create([
                    'number' => $count,
                    'image' => $item[6] . '.png',
                    'rooms' => $item[0],
                    'floor' => $floor,
                    'square' => $item[2],
                    'block' => $item[3],
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
