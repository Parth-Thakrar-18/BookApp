<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class ProductBookController extends Controller
{
    public function fiction(Request $request)
    {
        if ($request->has('filter') && $request->filter === 'highest') {
            $products = DB::table('books_db')->where('genres', 'like', '%fiction%')->orderBy('price', 'desc')->paginate(78);
            return view('fiction', ['products' => $products]);

        } else if ($request->has('filter') && $request->filter === 'famous') {
            $products = DB::table('books_db')->where('genres', 'like', '%fiction%')->orderBy('numRatings', 'desc')->paginate(78);
            return view('fiction', ['products' => $products]);

        } else if ($request->has('filter') && $request->filter === 'lowest') {
            $products = DB::table('books_db')->where('genres', 'like', '%fiction%')->orderBy('price', 'asc')->paginate(78);
            return view('fiction', ['products' => $products]);
            
        } else {
            $products = DB::table('books_db')->inRandomOrder()->paginate(78);
            return view('fiction', ['products' => $products]);
        }
    }

    public function non_fiction(Request $request)
    {
        if ($request->has('filter') && $request->filter === 'highest') {
            $products = DB::table('books_db')->where('genres', 'like', '%nonfiction%')->orderBy('price', 'desc')->paginate(78);
            return view('non_fiction', ['products' => $products]);

        } else if ($request->has('filter') && $request->filter === 'famous') {
            $products = DB::table('books_db')->where('genres', 'like', '%nonfiction%')->orderBy('numRatings', 'desc')->paginate(78);
            return view('non_fiction', ['products' => $products]);

        } else if ($request->has('filter') && $request->filter === 'lowest') {
            $products = DB::table('books_db')->where('genres', 'like', '%nonfiction%')->orderBy('price', 'asc')->paginate(78);
            return view('non_fiction', ['products' => $products]);
            
        } else {
            $products = DB::table('books_db')->inRandomOrder()->paginate(78);
            return view('non_fiction', ['products' => $products]);
        }
    }

    public function humor(Request $request)
    {
        if ($request->has('filter') && $request->filter === 'highest') {
            $products = DB::table('books_db')->where('genres', 'like', '%Humor%')->orderBy('price', 'desc')->paginate(78);
            return view('humor', ['products' => $products]);

        } else if ($request->has('filter') && $request->filter === 'famous') {
            $products = DB::table('books_db')->where('genres', 'like', '%Humor%')->orderBy('numRatings', 'desc')->paginate(78);
            return view('humor', ['products' => $products]);

        } else if ($request->has('filter') && $request->filter === 'lowest') {
            $products = DB::table('books_db')->where('genres', 'like', '%Humor%')->orderBy('price', 'asc')->paginate(78);
            return view('humor', ['products' => $products]);
            
        } else {
            $products = DB::table('books_db')->inRandomOrder()->paginate(78);
            return view('humor', ['products' => $products]);
        }
    }

    public function show($id)
    {
        $product = DB::table('books_db')->find($id);
        if (!$product) {
            abort(404); // or handle the case where the product is not found
        }

        return view('show', ['product' => $product]);
    }
}
