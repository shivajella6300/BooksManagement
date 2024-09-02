<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\three;

class threeletterController extends Controller
{
    //

    public function threeletterStoreMethod()
    {
      
        // $three=three::get();
        // for ($i=0; $i >=999; $i++;)
        // {
        //     three->three_ltes=$i??"";
        //     three->save();
        // }

        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $uniqueCharacters = '';
        for ($i = 0; $i < 1000; $i++) {
            $char = $characters[rand(0, strlen($characters) - 1)];
            while (strpos($uniqueCharacters, $char) !== false) {
                $char = $characters[rand(0, strlen($characters) - 1)];
            }
            $uniqueCharacters .= $char;
        }

        // Store the unique characters in the database
        YourModel::create([
            'unique_characters' => $uniqueCharacters
        ]);
        $this->info('Unique characters stored in the database.');
        return 0;
    }
    }

    
   

