<?php
namespace App\Http\Controllers\Regular;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Controllers\Controller; 

class PatientController extends Controller
{
    // This method handles patient search functionality and returns search results
    public function index(Request $request)
{
    $patients = collect();

    // Search logic
    if ($request->hasAny(['patient_id', 'user_id', 'name', 'DOB', 'emergency_contact', 'admission_date'])) {
        $query = Patient::with('user');

        if ($request->patient_id) {
            $query->where('id', $request->patient_id);
        }
        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }
        if ($request->name) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }
        if ($request->DOB) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->whereDate('date_of_birth', $request->DOB);
            });
        }
        if ($request->emergency_contact) {
            $query->where('emergency_contact', 'like', '%' . $request->emergency_contact . '%');
        }
        if ($request->admission_date) {
            $query->where('admission_date', $request->admission_date);
        }

        $patients = $query->get();
    }

    // Ensure the patients variable is being passed correctly to the view
    return view('patientinfo', compact('patients'));
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

    
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patientinfo', compact('patient'));
    }



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
    // Build query
    $query = Patient::with('user'); // Assuming 'user' relationship exists in Patient model
    
    // Search by patient_id
    if ($request->patient_id) {
        $query->where('id', $request->patient_id);
    }

    // Search by user_id
    if ($request->user_id) {
        $query->where('user_id', $request->user_id);
    }

    // Search by name (check if 'name' field exists in 'user' relation)
    if ($request->name) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->name . '%');
        });
    }

    // Search by DOB (check if 'date_of_birth' field exists in 'user' relation)
    if ($request->dob) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->whereDate('date_of_birth', $request->dob);
        });
    }

    // Search by emergency contact
    if ($request->emergency_contact) {
        $query->where('emergency_contact', 'like', '%' . $request->emergency_contact . '%');
    }

    // Execute query
    $patients = $query->get(); 

    // Return patients data as JSON
    return response()->json($patients);
}

    
}
