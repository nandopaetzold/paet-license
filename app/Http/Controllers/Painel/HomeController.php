<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Painel\HomeService;

class HomeController extends Controller
{
    public function __construct(
        public HomeService $homeService
    ) {
    }

    public function index()
    {
        return $this->homeService->index();
    }
}
