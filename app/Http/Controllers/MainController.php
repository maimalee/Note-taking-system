<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use PharIo\Manifest\Application;
class MainController extends Controller

{
    public function index(): Factory|View|Application
    {
        return view('index');
    }
}
