<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class Homecontroller extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('web.home.index');
    }
}