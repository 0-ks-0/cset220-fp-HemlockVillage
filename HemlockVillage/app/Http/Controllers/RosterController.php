<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roster; 

class RosterController extends Controller
{
    public function viewRoster(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
        ]);

        $date = $validated['date'];

        $roster = Roster::whereDate('date', $date)->get();

        return view('rosters.view', compact('roster', 'date'));
    }
}
