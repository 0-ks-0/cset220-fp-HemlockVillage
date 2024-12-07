<?php
namespace App\Http\Controllers\Regular;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class RegistrationApprovalController extends Controller
{
    public function index()
    {
        // Get all patients who need approval
        // $patients = Patient::where('approved', false)->get();
        // $patients = DB::table("users")
        //     ->join("patients", "patients.user_id", "=", "users.id")
        //     ->where("users.approved", false)
        //     ->get()

        // return $patients;
        // USE this instead. can't figure out why the patients is returning []
        $users = DB::table("users")
            ->where("approved", false)
            ->get();

        return $users;

        // Return the correct view for registration approval
        return view('registrationapproval', compact('patients'));
    }

    // Approve patient
    public function approve(Request $request, $patientId)
    {
        $patient = Patient::find($patientId);
        if (!$patient) {
            return redirect()->route('registrationapproval.index')->with('error', 'Patient not found');
        }

        $patient->approved = true; // Set the patient as approved
        $patient->save();

        return redirect()->route('registrationapproval.index')->with('success', 'Patient approved successfully.');
    }

    // Reject patient
    public function reject(Request $request, $patientId)
    {
        $patient = Patient::find($patientId);
        if (!$patient) {
            return redirect()->route('registrationapproval.index')->with('error', 'Patient not found');
        }

        $patient->approved = false; // Reject the patient
        $patient->save();

        return redirect()->route('registrationapproval.index')->with('success', 'Patient rejected successfully.');
    }
}
