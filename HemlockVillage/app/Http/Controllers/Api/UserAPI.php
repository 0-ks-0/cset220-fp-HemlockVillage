<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Helpers\ModelHelper;

use App\Models\User;
use App\Models\Role;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\Family;

class UserAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $familyCode = ModelHelper::getRandomString();

        session(['familyCode' => $familyCode]);

        return view("signup")->with([
            "roles" => DB::table("roles")->get(),
            "familyCode" => $familyCode
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
