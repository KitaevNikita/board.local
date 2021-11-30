<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::paginate(10);

        return view('index', compact('boards'));
    }
}
