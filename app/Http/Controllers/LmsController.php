<?php

namespace App\Http\Controllers;

use App\Services\LmsApiService;
use Illuminate\Http\Request;

class LmsController extends Controller
{
    public function __construct( private LmsApiService $lmsApiService)
    {
    }
    public function LMS(){
        $facultiesData = $this->lmsApiService->getFaculties();
        $faculties = $facultiesData['faculties'] ?? [];
        $usersData = $this->lmsApiService->getUsers();
        $lmsUsers = $usersData['users'] ?? [];
        return view('lms.index', compact('faculties', 'lmsUsers'));
    }
} 
