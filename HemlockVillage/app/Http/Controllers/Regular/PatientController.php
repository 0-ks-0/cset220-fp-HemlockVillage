<?php

namespace App\Http\Controllers\Regular;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PatientController extends Controller
{
    // This method handles patient search functionality and returns search results
    public function index(Request $request)
    {
        $patients = collect();

        // Search logic
        if ($request->hasAny(['patient_id', 'user_id', 'name', 'DOB', 'emergency_contact', 'emergency_contact_name'])) {
            $query = Patient::with('user');

            // Search by patient ID
            if ($request->patient_id) {
                $query->where('id', $request->patient_id);
            }

            // Search by user ID
            if ($request->user_id) {
                $query->where('user_id', $request->user_id);
            }

            // Search by first name
            if ($request->name) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('first_name', 'like', '%' . $request->name . '%');
                });
            }

            // Search by DOB
            if ($request->DOB) {
                $query->whereHas('user', function ($q) use ($request) {
                    // Match the DOB exactly
                    $q->whereDate('date_of_birth', $request->DOB);
                });
            }

            // Search by emergency contact
            if ($request->emergency_contact) {
                $query->where('econtact_phone', 'like', '%' . $request->emergency_contact . '%');
            }

            // Search by emergency contact name
            if ($request->emergency_contact_name) {
                $query->where('econtact_name', 'like', '%' . $request->emergency_contact_name . '%');
            }

            $patients = $query->get();
        }

        return response()->json($patients->map(function ($patient) {
            return [
                'patient_id' => $patient->id,
                'user_id' => $patient->user->id,
                'name' => $patient->user->first_name ?? '',
                'dob' => $patient->user->date_of_birth ?? '', // Display DOB
                'emergency_contact' => $patient->econtact_phone,
                'emergency_contact_name' => $patient->econtact_name,
                'age' => $patient->user->date_of_birth
                    ? Carbon::parse($patient->user->date_of_birth)->age
                    : null, // Calculate age using DOB
            ];
        }));
    }

    // This method handles approval of patient registration status
    public function approveRegistration(Request $request, $patientId)
    {
        $patient = Patient::find($patientId);

        if (!$patient) {
            return redirect()->route('patients.index')->with('error', 'Patient not found');
        }

        $request->validate([
            'approval_status' => 'required|in:approved,rejected',
        ]);

        $patient->approval_status = $request->approval_status;
        $patient->save();

        return redirect()->route('patients.index');
    }

    // Fetch and return all patients (JSON response for API or other needs)
    public function getPatients(Request $request)
    {
        $patients = Patient::with('user')->get();

        return response()->json($patients);
    }

    // Method to show specific patient details
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patientinfo', compact('patient'));
    }

    // Method to update the emergency contact for a specific patient
    public function updateEmergencyContact(Request $request, $patientId)
    {
        // Find the patient
        $patient = Patient::findOrFail($patientId);

        // Validate the request input
        $request->validate([
            'emergency_contact' => 'required|string|max:255',
        ]);

        // Update the emergency contact
        $patient->emergency_contact = $request->input('emergency_contact');
        $patient->save();

        // Return the updated patient data or redirect back with a success message
        return redirect()->route('patients.show', ['id' => $patientId])
            ->with('success', 'Emergency contact updated successfully.');
    }

    public function search(Request $request)
    {
        $query = Patient::with('user'); // Load user data associated with the patient

        // Search by patient_id
        if ($request->patient_id) {
            $query->where('id', $request->patient_id);
        }

        // Search by user_id
        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        // Search by name (first_name in users table)
        if ($request->name) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->name . '%');
            });
        }

        // Search by date_of_birth (DOB in users table)
        if ($request->age) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->whereDate('date_of_birth', $request->age);
            });
        }

        // Search by emergency contact
        if ($request->emergency_contact) {
            $query->where('econtact_phone', 'like', '%' . $request->emergency_contact . '%');
        }

        // Search by emergency contact name
        if ($request->emergency_contact_name) {
            $query->where('econtact_name', 'like', '%' . $request->emergency_contact_name . '%');
        }

        // Get the filtered patients
        $patients = $query->get();

        // Return filtered patients in JSON format
        return response()->json($patients->map(function ($patient) {
            return [
                'patient_id' => $patient->id,
                'user_id' => $patient->user->id,
                'name' => $patient->user->first_name,
                'date_of_birth' => $patient->user->date_of_birth,
                'emergency_contact' => $patient->econtact_phone,
                'emergency_contact_name' => $patient->econtact_name,
            ];
        }));
    }

    public function getUnapprovedPatients()
{
    // Fetch all unapproved patients
    $patients = Patient::where('approved', false)->with('user')->get();

    return response()->json($patients);
}

}
