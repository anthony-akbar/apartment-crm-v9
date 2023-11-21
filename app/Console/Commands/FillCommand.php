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
        $floor = 2;
        $table = [
            /* [ комнат, 1, квадрат, блок, цена, статус, фото ]*/
            [2, 1, 60.53, 1, 750, 'Б', 'individual/60,53.png'],
            [2, 1, 67.20, 1, 750, 'Б', 'individual/67,20.png'],
            [1, 1, 55.37, 1, 750, 'Б', 'individual/55,37.png'],
            [1, 1, 59.94, 1, 750, 'Б', 'individual/59,94.png'],
            [1, 1, 45.10, 1, 750, 'Б', 'individual/45,10.png'],

            [2, 1, 86.81, 1, 750, 'А', 'individual/86,81.png'],
            [3, 1, 132.97, 1, 750, 'А', 'individual/132,97.png'],
            [2, 1, 78.13, 1, 750, 'А', 'individual/78,13.png'],
            [2, 1, 76.80, 1, 750, 'А', 'individual/76,80.png'],
            [2, 1, 79.37, 1, 750, 'А', 'individual/79,37.png'],
            [1, 1, 61.58, 1, 750, 'А', 'individual/61,58.png'],
            [1, 1, 61.58, 1, 750, 'А', 'individual/61,58.png'],
            [1, 1, 61.58, 1, 750, 'А', 'individual/61,58.png'],
            [1, 1, 60.37, 1, 750, 'А', 'individual/60,37.png'],



            /*
            [2, 1, 63.77, 1, 750, 1, '63,77'],
            [2, 1, 67.06, 1, 750, 1, '67,06'],
            [2, 1, 83.42, 1, 750, 1, '83,42'],
            [2, 1, 84.59, 1, 750, 1, '84,59'],

            [2, 1, 88.21, 2, 750, 1, '88,21'],
            [3, 1, 113.43, 2, 750, 1, '56'],
            [2, 1, 75.22, 2, 750, 1, '75,22'],
            [1, 1, 43.25, 2, 750, 1, '43,25'],
            [1, 1, 43.28, 2, 750, 1, '43,28'],
            [3, 1, 94.17, 2, 750, 1, '94.17'],
            [2, 1, 62.81, 2, 750, 1, '62,81'],

            [2, 1, 62.81, 3, 750, 1, '62,81'],
            [3, 1, 94.17, 3, 750, 1, '94.17'],
            [1, 1, 43.28, 3, 750, 1, '43,28'],
            [1, 1, 43.25, 3, 750, 1, '43,25'],
            [2, 1, 75.22, 3, 750, 1, '75,22'],
            [3, 1, 113.43, 3, 750, 1, '56'],
            [2, 1, 88.21, 3, 750, 1, '88,21'],

            [2, 1, 84.59, 4, 750, 1, '84,59'],
            [2, 1, 83.42, 4, 750, 1, '83,42'],
            [2, 1, 67.06, 4, 750, 1, '67,06'],
            [2, 1, 63.77, 4, 750, 1, '63,77'],
            0*/
        ];

        $table2 = [
            [2, 1, 76.80, 1, 750, 'В', 'individual/76,80.png'],
            [2, 1, 78.13, 1, 750, 'В', 'individual/78,13.png'],
            [3, 1, 132.97, 1, 750, 'В', 'individual/132,97.png'],
            [2, 1, 86.81, 1, 750, 'В', 'individual/86,81.png'],

            [1, 1, 45.10, 1, 750, 'Г', 'individual/45,10.png'],
            [1, 1, 59.94, 1, 750, 'Г', 'individual/59,94.png'],
            [1, 1, 55.37, 1, 750, 'Г', 'individual/55,37.png'],
            [2, 1, 67.20, 1, 750, 'Г', 'individual/67,20.png'],
            [2, 1, 60.53, 1, 750, 'Г', 'individual/60,53.png'],
        ];

        for ($i = 0; $i < 12; $i++) {
            $price = 700;
            foreach ($table2 as $item) {
                if ($floor < 8) {
                    $price = 680;
                }else if($floor >= 8 && $floor<11){
                    $price = 630;
                }else if($floor === 11 || $floor === 12){
                    $price = 580;
                }

                Apartment::create([
                    'number' => $count,
                    'image' => $item[6],
                    'rooms' => $item[0],
                    'floor' => $floor,
                    'square' => $item[2],
                    'block' => (string)$item[5],
                    'price' => $price,
                    'total' => $price * $item[2],
                    'status' => $item[3]
                ]);
                $count++;
            }
            $floor++;
        }


    }
}
