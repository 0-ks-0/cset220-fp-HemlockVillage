<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $patients = collect();

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

        return view('patients.index', compact('patients'));
    }

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


    public function getPatients(Request $request)
        {
            $patients = Patient::with('user')->get();
    
            return response()->json($patients);
        }

    
}
