<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\ApiQuery\Filter;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new Filter();

        $queryItems = $filter->combine($request);

        count($queryItems) == 0 && new Bookcollection(Book::paginate());

        return new Bookcollection(Book::where($queryItems)->paginate());
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
        return new BookResource(Book::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return new BookResource($book);
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
        return new BookResource(Book::find($book->id)->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {   
        new BookResource(Book::where("id", $book->id)->delete());
        
        return "Your Record has been delete";
    }
}
