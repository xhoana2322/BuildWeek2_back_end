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
    public function index()
    {
        $books = Book::with('author')->paginate(5);
       /*  return view('books', ['books' => $books]); */
    
       /*  $DBbooks = Book::with('author')->get(); */

       
      /*   $dummyBooks = new Collection([
            new Book([
                'image' => 'https://www.pennematte.it/wp-content/uploads/2018/02/61930ic7nl-214x300.jpg',
                'title' => 'Book Title 1',
                'author' => (object)['name' => 'Author Name 1'],
                'categories' => [(object)['name' => 'Category 1'], (object)['name' => 'Category 2']],
                'plot' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius eros in ex dapibus, ac fermentum lectus auctor.',
                'status' => 'Available',
            ]),
            new Book([
                'image' => 'https://chiediloallorango.files.wordpress.com/2018/08/buchi-nel-deserto-louis-sachar.jpg?w=690',
                'title' => 'Book Title 2',
                'author' => (object)['name' => 'Author Name 2'],
                'categories' => [(object)['name' => 'Category 3'], (object)['name' => 'Category 4']],
                'plot' => 'Sed ullamcorper ligula vel est volutpat, vel laoreet quam efficitur. Sed congue lectus id turpis semper, sit amet fermentum odio fermentum.',
                'status' => 'Not available',
            ]),
            new Book([
                'image' => 'https://www.ilpost.it/wp-content/uploads/2023/01/30/1675070355-copertina_principessa_angina_roland_topor.jpeg',
                'title' => 'Book Title 3',
                'author' => (object)['name' => 'Author Name 3'],
                'categories' => [(object)['name' => 'Category 5'], (object)['name' => 'Category 6']],
                'plot' => 'Integer nec odio eu lorem aliquet tempus nec nec dolor. Proin nec lorem non nisl tincidunt consequat ac at erat.',
                'status' => 'Pending',
            ]),
        ]);
 */
    
        /*$books = $DBbooks; ->concat($dummyBooks); */

        return view('listalibri', ['books' => $books]);
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
