<?php

namespace App\Http\Controllers;

use App\Services\LmsApiService;
use Illuminate\Http\Request;

class LmsController extends Controller
{
    public function __construct(private LmsApiService $lmsApiService)
    {
    }
    public function LMS()
    {
        $facultiesData = $this->lmsApiService->getFaculties();
        $faculties = $facultiesData['faculties'] ?? [];
        $usersData = $this->lmsApiService->getUsers();
        $lmsUsers = $usersData['users'] ?? [];
        return view('lms.index', compact('faculties', 'lmsUsers'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'faculty' => 'nullable|string',
        ]);

        $response = $this->lmsApiService->register($request->only(['email', 'password', 'faculty']));

        return response()->json($response);
    }

    public function getUsers()
    {
        $usersData = $this->lmsApiService->getUsers();
        return response()->json($usersData);
    }
}
