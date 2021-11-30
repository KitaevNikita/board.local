@extends('layouts.app')

@section('content')

<div class="card">
  <h3 class="card-header">
    Детали объявления
  </h3>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>Название Объявления:</strong> {{ $board->advertisement }}</li>
    <li class="list-group-item"><strong>Номер телефона:</strong> {{ $board->phone }}</li>
    <li class="list-group-item"><strong>Имя пользователя:</strong> {{ $board->user_name }}</li>
    <li class="list-group-item"><strong>Приоритет:</strong> {{ $board->category }}</li>
    <li class="list-group-item"><strong>Дата создания:</strong> {{ $board->created_at }}</li>
    <li class="list-group-item"><strong>Дата редактирования:</strong> {{ $board->updated_at }}</li>
  </ul>
  <div class="card-body">
      <a class="btn btn-secondary" href="{{ route('boards.edit', $board->id) }}">
        Редактировать
      </a>
      <a class="btn btn-danger" href="{{ route('boards.index') }}">
        Отмена
      </a>
  </div>
</div>

@endsection
