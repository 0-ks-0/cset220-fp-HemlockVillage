<?php
namespace App\Http\Controllers\Regular;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationApprovalController extends Controller
{
    public function index()
    {
        // Fetch all users who need approval
        $users = DB::table('users')
            ->where('approved', false)
            ->get();

        return view('registrationapproval', compact('users'));
    }

    // Approve user
    public function approve(Request $request, $userID)
    {
        $user = User::find($userID);
        if (!$user) {
            return redirect()->route('registrationapproval.index')->with('error', 'User not found');
        }

        $user->approved = true; // Set the user as approved
        $user->save();

        return redirect()->route('registrationapproval.index')->with('success', 'User approved successfully.');
    }

    // Reject user
    public function reject(Request $request, $userID)
    {
        $user = User::find($userID);
        if (!$user) {
            return redirect()->route('registrationapproval.index')->with('error', 'User not found');
        }

        $user->delete(); // Remove the user from the database

        return redirect()->route('registrationapproval.index')->with('success', 'User rejected and removed successfully.');
    }
}
