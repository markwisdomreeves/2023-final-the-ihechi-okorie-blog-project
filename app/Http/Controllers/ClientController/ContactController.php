<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ContactController extends Controller{
    public function ShowContactPage() {
        return view('client.contact');
    }

    public function StoreContactMessage () {

    }
    
}
