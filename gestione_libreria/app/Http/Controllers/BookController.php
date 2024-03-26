<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        $books = Book::with('author')->paginate(5);
        $userPendingReservations = Reservation::where('user_id', $userId)
            ->whereIn('status', ['pending', 'available'])
            ->pluck('book_id') // Pluck only book IDs
            ->toArray(); // Convert the collection to an array

        if (Auth::check()) {
            return view('listalibri', ['books' => $books, 'userPendingReservations' => $userPendingReservations]);
        } else {
            return view('auth.login');
        }
    }


    public function myBooks()
    {
        $userId = auth()->id();
        $reservations = Reservation::where('user_id', $userId)
            ->whereIn('status', ['pending', 'available'])
            ->get();
        $bookIds = $reservations->pluck('book_id')->toArray();
        $books = Book::whereIn('id', $bookIds)->get();
        return view('mybooks', ['books' => $books, 'reservations' => $reservations]);
    }

    public function return($id)
    {
        $reservation = Reservation::findOrFail($id);
        $book = $reservation->book;
        if ($book) {
            $book->increment('AvailableAmount');
        }
        $reservation->delete();
        return redirect()->back()->with('success', 'Reservation returned successfully.');
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

    public function store(Request $request)
    {
        $user_id = Auth::id();
        Reservation::create([
            'user_id' => $user_id,
            'book_id' => $request->book_id,
            'status' => 'Pending',
        ]);

        $book = Book::find($request->book_id);
        if ($book) {
            $book->decrement('AvailableAmount');
        }

        return redirect()->back()->with('success', 'Reservation request submitted successfully.');
    }
    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $userId = auth()->id();
        $userPendingReservations = Reservation::where('user_id', $userId)
            ->whereIn('status', ['pending', 'available'])
            ->pluck('book_id')
            ->toArray();

        $book = Book::with('author')->findOrFail($id);
        $categoryId = $book->pluck('category_id')->toArray();
        $category = Book::where('category_id', $categoryId)->get();
        
        $userId = auth()->id();
        $userPendingReservations = Reservation::where('user_id', $userId)
            ->whereIn('status', ['pending', 'available'])
            ->pluck('book_id')
            ->toArray();

        return view('books.show', compact('book', 'category', 'userPendingReservations'));
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
