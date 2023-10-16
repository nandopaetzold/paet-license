<?php

namespace App\Service\Painel;

class HomeService{
    
        public function __construct()
        {
            
        }
    
        public function index()
        {
            return view('painel.home.index');
        }
}