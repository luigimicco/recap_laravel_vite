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
        $search = $request->search ?? '';

        $books = Book::orderBy($orderby, $order);
        if ($search) {
            $books = $books->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('author', 'LIKE', '%' . $search . '%');
        }
        $books = $books->get();
        return response()->json($books);
    }
}
