<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $orderby = $request->orderby ?? 'title';
        $order = $request->order ?? 'asc';
        $books = Book::orderBy($orderby, $order);
        $books = $books->get();
        return response()->json($books);
    }
}
