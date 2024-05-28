<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Representation;
use App\Models\Reservation;
use App\Mail\ReservationTicket;
use Stripe\Stripe;
use Stripe\Charge;

class ReservationController extends Controller
{


    public function payment(Request $request, $id)
    {
        $validated = $request->validate([
            'places' => 'required|integer|min:1',
        ]);

        $representation = Representation::findOrFail($id);
        $places = $validated['places'];

        return view('reservations.payment', [
            'representation' => $representation,
            'places' => $places,
        ]);
    }


    public function book(Request $request, $id)
    {
        $validated = $request->validate([
            'places' => 'required|integer|min:1',
            'stripeToken' => 'required|string'
        ]);

        $representation = Representation::findOrFail($id);

        if (!$representation->show->bookable) {
            return redirect()->route('representation.show', $id)
                ->with('error', 'Cette représentation n\'est pas réservable.');
        }

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $charge = Charge::create([
                'amount' => $representation->price * $validated['places'] * 100, // Stripe prend les montants en cents
                'currency' => 'usd',
                'description' => 'Réservation pour ' . $representation->show->title,
                'source' => $request->stripeToken,
            ]);

            $reservation = new Reservation();
            $reservation->user_id = Auth::id();
            $reservation->representation_id = $representation->id;
            $reservation->places = $validated['places'];
            $reservation->save();

            return redirect()->route('reservation.confirmation', ['id' => $reservation->id])
                ->with('success', 'Réservation effectuée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('representation.show', $id)
                ->with('error', 'Le paiement a échoué. Veuillez réessayer.');
        }
    }

    public function confirmation($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.confirmation', compact('reservation'));
    }
}
