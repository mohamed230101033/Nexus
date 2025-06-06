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
    }    /**
     * Display Second Semester - Research and Implementation
     */
    public function secondSemester()
    {
        return view('nexus.second-semester');
    }

    /**
     * Display Second Semester Phase 1 - Foundation Research
     */
    public function secondSemesterPhase1()
    {
        return view('nexus.second-semester-phase1');
    }

    /**
     * Display Second Semester Phase 2 - Advanced Implementation
     */
    public function secondSemesterPhase2()
    {
        return view('nexus.second-semester-phase2');
    }

    /**
     * Display Ransomware Core Analysis page
     */
    public function ransomwareCore()
    {
        return view('nexus.ransomware-core');
    }

    /**
     * Display Remote Access Trojans Analysis page
     */
    public function remoteAccessTrojans()
    {
        return view('nexus.remote-access-trojans');
    }

    /**
     * Display RAT & Net Nuker Analysis page
     */
    public function ratNetNuker()
    {
        return view('nexus.rat-net-nuker');
    }

    /**
     * Display ZPhishing Framework Analysis page
     */
    public function zphishing()
    {
        return view('nexus.zphishing');
    }    /**
     * Display EDR Detection and Defence page
     */
    public function edrDetectionDefence()
    {
        return view('nexus.edr-detection-defence');
    }    /**
     * Display Analysis & Detection Statistics page
     */
    public function analysisDetectionStatistics()
    {
        return view('nexus.analysis-detection-statistics');
    }

    /**
     * Display APK Analysis page
     */
    public function analysisDetectionApk()
    {
        return view('nexus.analysis-detection-apk');
    }

    /**
     * Display NEXUS x MYC section
     */
    public function mycGame()
    {
        return view('nexus.myc-game');
    }    /**
     * Display Encryption & Cryptography page
     */
    public function encryption()
    {
        return view('nexus.encryption');
    }

    /**
     * Display Core Ransomware Research page
     */
    public function coreRansomware()
    {
        return view('nexus.core-ransomware');
    }

    /**
     * Display RAT Prototype Development page
     */
    public function ratPrototype()
    {
        return view('nexus.rat-prototype');
    }

    /**
     * Display Evasion & Stealth Techniques page
     */
    public function evasionStealth()
    {
        return view('nexus.evasion-stealth');
    }

    /**
     * Display Delivery Methods Analysis page
     */
    public function deliveryMethods()
    {
        return view('nexus.delivery-methods');
    }

    /**
     * Display Detection & Response Systems page
     */
    public function detectionResponse()
    {
        return view('nexus.detection-response');
    }
}
