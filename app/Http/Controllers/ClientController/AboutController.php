<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class AboutController extends Controller{
    public function ShowAboutPage() {
        return view('client.about');
    }
}
