<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * @return mixed
     */
    public function index(): mixed
    {
        return redirect()->to(url('/search'));
    }
}
