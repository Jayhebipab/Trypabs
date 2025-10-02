<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'preferred_date' => 'nullable|date',
            'location' => 'required|string',
            'tattoo_info' => 'required|string',
        ]);

        Reservation::create($validated);
        return redirect()->route('dashboard', ['page' => 'reservation'])->with('success', 'Reservation created!');
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'preferred_date' => 'nullable|date',
            'location' => 'required|string',
            'tattoo_info' => 'required|string',
        ]);

        $reservation->update($validated);
        session()->forget('editReservation');

        return redirect()->route('dashboard', ['page' => 'reservation'])->with('success', 'Reservation updated!');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('dashboard', ['page' => 'reservation'])->with('success', 'Reservation deleted!');
    }

    // ✅ Show the edit modal by setting session
public function showEditModal($id) {
    $reservation = Reservation::findOrFail($id);
    session(['editReservation' => $reservation]);
    return redirect()->route('dashboard', ['page' => 'reservation-edit']);
}

    // ✅ Clear the edit modal session (Cancel button)
   // app/Http/Controllers/ReservationController.php

    public function clearEdit()
    {
    session()->forget('editReservation');
    return redirect()->route('dashboard', ['page' => 'reservation']);
    }

}
