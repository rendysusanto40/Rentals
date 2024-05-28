<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index(){
        $reviewList = [
            [
                "name" => "Jason Chen",
                "star" => "⭐⭐⭐⭐⭐",
                "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum beatae nam."
            ],
            [
                "name" => "Stephanie Wang",
                "star" => "⭐⭐⭐⭐⭐",
                "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum beatae nam."
            ],
            [
                "name" => "Andy Wang",
                "star" => "⭐⭐⭐⭐",
                "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum beatae nam."
            ],
            [
                "name" => "Michael Lee",
                "star" => "⭐⭐⭐⭐⭐",
                "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum beatae nam."
            ],
            [
                "name" => "Liam Morgan",
                "star" => "⭐⭐⭐⭐",
                "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum beatae nam."
            ],
            [
                "name" => "Ethan Walker",
                "star" => "⭐⭐⭐⭐",
                "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum beatae nam."
            ],
            [
                "name" => "Sophia Rodriguez",
                "star" => "⭐⭐⭐⭐⭐",
                "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum beatae nam."
            ]
        ];
        return view("index", compact("reviewList"));
    }
}
