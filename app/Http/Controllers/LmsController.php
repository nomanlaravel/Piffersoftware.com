<?php

namespace App\Http\Controllers;

use App\Services\LmsApiService;
use Illuminate\Http\Request;
use App\Models\Hrm;

class LmsController extends Controller
{
    public function __construct(private LmsApiService $lmsApiService)
    {
    }
    public function LMS()
    {
        $hrms = Hrm::select('id', 'name', 'hrm_region')->get();
        $facultiesData = $this->lmsApiService->getFaculties();
        $faculties = $facultiesData['faculties'] ?? [];
        $usersData = $this->lmsApiService->getUsers();
        $lmsUsers = $usersData['users'] ?? [];
        return view('lms.index', compact('faculties', 'lmsUsers', 'hrms'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'faculty_id' => 'nullable|string',
        ]);

        $response = $this->lmsApiService->register($request->only(['name','email', 'password', 'faculty_id']));
        return response()->json($response);
    }

    public function getUsers()
    {
        $usersData = $this->lmsApiService->getUsers();
        return response()->json($usersData);
    }
}
