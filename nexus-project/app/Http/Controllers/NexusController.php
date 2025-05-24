<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NexusController extends Controller
{
    /**
     * Display the main Nexus project page
     */
    public function index()
    {
        return view('nexus.index');
    }

    /**
     * Display First Semester - Malware Analysis
     */
    public function firstSemester()
    {
        return view('nexus.first-semester');
    }

    /**
     * Display Second Semester - Research and Implementation
     */
    public function secondSemester()
    {
        return view('nexus.second-semester');
    }

    /**
     * Display NEXUS x MYC section
     */
    public function mycGame()
    {
        return view('nexus.myc-game');
    }
}
