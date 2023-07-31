<?php

namespace App\Services;

use PhpOffice\PhpWord\PhpWord;

class WordService
{
    public function open(){
        $phpword = new PhpWord();
    }
}
