<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Show the team page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('team');
    }
}