<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class FlowerController extends Controller
{
    
    // basic routing with parameters
    public function set_flower($flower = 'Sampaguita') {
        $data = [
            'body' => [
                'title' => $flower . ' Blog Page',
                'uri' => Request::route()->getName(),
                'comment' => 'This is routing using MVC technique by using Controller class.'
            ]
        ];

        return view('component')->with('body', $data['body']);
    }

    // basic routing using multiple parameters
    public function full_package(
            $flower = 'Sampaguita',
            $soil_weight = 2,
            $vase_color = 'White'
    ) {
        $data = [
            'body' => [
                'title' => $flower . ' Blog Page',
                'uri' => Request::route()->getName(),
                'comment' => 'You bought ' . $flower . ' with ' . $soil_weight . 'kg of soil and color ' . $vase_color . ' vase.' 
            ]
        ];

        return view('component')->with('body', $data['body']);
    }

    // display buyable flower
    public function show_amount($name, $amount) {
        $data = [
            'body' => [
                'title' => $name . ' Blog Page',
                'uri' => Request::route()->getName(),
                'comment' => 'This ' . $name . ' costs ' . $amount . ' pesos'
            ]
        ];

        return view('component')->with('body', $data['body']);
    }

}
