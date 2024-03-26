<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Reservation;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::query();
        $categories = Category::all();

        if (request()->has('search')) {
            $books->where(function ($query) {
                $query->whereHas('author', function ($query) {
                    $query->where('name', 'like', '%' . request()->get('search', '') . '%');
                })
                    ->orWhere('title', 'like', '%' . request()->get('search', '') . '%')
                    ->orWhere('plot', 'like', '%' . request()->get('search', '') . '%');
            });
        }
        $userId = auth()->id();
        $userPendingReservations = Reservation::where('user_id', $userId)
            ->whereIn('status', ['pending', 'available'])
            ->pluck('book_id') // Pluck only book IDs
            ->toArray(); // Convert the collection to an array

        $books = $books->get();

        if (Auth::check()) {
            return view('homepage', ['books' => $books, 'categories' => $categories, 'userPendingReservations' =>  $userPendingReservations]);
        } else {
            return view('auth.register', ['books' => $books, 'categories' => $categories]);
        }
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
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
