<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Collection;

class BookController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function myBooks()
    {
        $userId = auth()->id();
        $reservations = Reservation::where('user_id', $userId)
            ->whereIn('status', ['pending', 'available'])
            ->get();
        $bookIds = $reservations->pluck('book_id')->toArray();
        $books = Book::whereIn('id', $bookIds)->with('category')->get();
        
        return view('listalibri', ['books' => $books, 'reservations' => $reservations]);
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
    public function store(StoreBookRequest $request)
    {
        //
    }
    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $book = Book::with('author')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
