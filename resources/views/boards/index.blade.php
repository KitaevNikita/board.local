@extends('layouts.app')

@section('content')
<div class="card">
  <h3 class="card-header">
    Доска объявлений
{{--         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Search</label>
            <input name="category" @if(isset($_GET['category'])) value="{{$_GET['category']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type something">
        </div> --}}
    <a class="btn btn-sm btn-success float-right" href="{{ route('boards.create') }}">
      Добавить объявление
    </a>
  </h3>
  <div class="card-body">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Блок фильтрации</h5>
          <form action="{{ route('boards.index') }}" method="get">
            @csrf
            <select class="form-control" name="category">
              <option value="Услуги" {{ (($board->category ?? old('category')) == "Услуги") ? "selected" : "" }}>Услуги</option>
              <option value="Недвижимость" {{ (($board->category ?? old('category')) == "Недвижимость") ? "selected" : "" }}>Недвижимость</option>
              <option value="Товары" {{ (($board->category ?? old('category')) == "Товары") ? "selected" : "" }}>Товары</option>
            </select>
            <button type="action" value="filter" name="filter" class="mt-3 btn btn-primary">Фильтровать</button>
            <button type="action" value="reset" name="reset" class="mt-3 btn btn-danger">Сбросить</button>
          </form>
      </div>
    </div>
    <table class="table table-sm">
      <thead>
        <tr>
          <th scope="col">Обьявление</th>
          <th scope="col" class="text-left">Котегория</th>
          <th scope="col" class="text-right">Детали</th>
        </tr>
      </thead>
      <tbody>
        @forelse($boards as $board)
        <tr>
          <td>{{ $board->advertisement }}</td>
          <td class="text-left">{{ $board->category }}</td>
          <td class="text-right">
            <a class="btn btn-sm btn-primary" href="{{ route('boards.show', $board->id) }}">
              Просмотреть
            </a>
            <a class="btn btn-sm btn-secondary" href="{{ route('boards.edit', $board->id) }}">
              Редактировать
            </a>&nbsp;
            <form action="{{ route('boards.destroy', $board->id) }}" method="post" class="float-right">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-danger" type="submit">Удалить</a>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3">
            <h3 class="text-center">Объявления отсутствуют</h3>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@if($boards->total() > $boards->count())
    {{ $boards->links() }}
@endif
@endsection
