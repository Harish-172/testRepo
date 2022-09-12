<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function productListing(){
        return view('theme.home');
    }

    public function contactUs(){
        return view('theme.contact');
    }

    public function specialOffer(){
        return view('theme.special_offer');
    }

    public function delivery(){
        return view('theme.delivery');
    }

    public function cart(){
        return view('theme.cart');
    }
    public function productDetail(){
        return view('theme.product-detail');
    }
}
