<?php
namespace App\Http\Controllers\Regular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class RegistrationApprovalController extends Controller
{
    // Display unapproved patients
    public function index()
    {
        // Fetch all patients who are not approved
        $patients = Patient::where('approved', false)->get();
        
        return view('registrationapproval', compact('patients'));
    }

    // Approve or reject a patient
    public function approve(Request $request, $patientId)
    {
        // Find the patient by ID
        $patient = Patient::find($patientId);

        if (!$patient) {
            return redirect()->route('registrationapproval.index')->with('error', 'Patient not found');
        }

        // Set the patient status based on the button clicked
        $patient->approved = true;  // Automatically approve when button is clicked
        $patient->save();

        // Return with success message
        return redirect()->route('registrationapproval.index')->with('success', 'Patient approved successfully.');
    }

    // Reject a patient
    public function reject(Request $request, $patientId)
    {
        // Find the patient by ID
        $patient = Patient::find($patientId);

        if (!$patient) {
            return redirect()->route('registrationapproval.index')->with('error', 'Patient not found');
        }

        // Reject the patient (no need to save if we're rejecting, just don't approve)
        return redirect()->route('registrationapproval.index')->with('error', 'Patient rejected and not added.');
    }
}

