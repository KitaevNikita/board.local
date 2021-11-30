<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Отображение списка ресурсов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::paginate(10);

        return view('index', compact('boards'));
    }
}
