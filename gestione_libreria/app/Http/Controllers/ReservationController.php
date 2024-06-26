<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Book;
use App\Models\User;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Http\Client\Request;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    /**
     * Handle the reservation of a book.
     *
     * @param  Request  $request
     * @param  int  $bookId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reserve(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);
        if ($book->AvailableAmount > 0) {
            $book->AvailableAmount--;
            $book->save();

            return back()->with('success', 'Your request for"' . $book->title . '"is pending until approved!');
        }
    }
}