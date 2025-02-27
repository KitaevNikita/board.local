<?php

namespace App\Http\Controllers\Board;

use App\Models\Board;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoardRequest;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Отображение списка ресурсов
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conditions = [
            ['user_id', Auth::id()],
        ];
        if (!isset($request->reset) && $request->category) {
            array_push($conditions, ["category", $request->category]);
        }
        $boards = Board::where($conditions)
                ->orderBy('category', 'desc')
                ->paginate(10);
        return view('boards.index', compact('boards'));
    }

    /**
     * Показ формы для создания нового ресурса
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boards.create');
    }

    /**
     * Сохранение вновь созданного ресурса в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoardRequest $request)
    {
        Board::create($request->all());

        return redirect()->route('boards.index');

    }

    /**
     * Отображение указанного ресурса
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
                // проверка прав пользователя
        $board = Board::findOrFail($id);
        if ($request->user()->can('view', $board)) {
            return view('boards.show', compact('board'));
        } else {
            return redirect()->route('start_page')
                    ->withErrors(['message' => 'Ошибка доступа']);
        }
    }

    /**
     * Показ формы для редактирования указанного ресурса
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $board = Board::findOrFail($id);
        if ($request->user()->can('update', $board)) {
            return view('boards.edit', compact('board'));
        } else {
            return redirect()->route('start_page')
                            ->withErrors(['message' => 'Ошибка доступа']);
        }
    }

    /**
     * Обновление ресурса в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BoardRequest $request, $id)
    {
        $board = Board::findOrFail($id);
        if ($request->user()->can('update', $board)) {
            $board->update($request->except('user_id'));
             return redirect()->route('boards.index');
        } else {
            return redirect()->route('start_page')
                            ->withErrors(['message' => 'Ошибка доступа']);
        }
    }

    /**
     * Удаление ресурса из хранилища
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $board = Board::findOrFail($id);
        if ($request->user()->can('update', $board)) {
            $board->delete();
            return redirect()->route('boards.index');
        } else {
            return redirect()->route('start_page')
                ->withErrors(['message' => 'Ошибка доступа']);
        }
    }
}
