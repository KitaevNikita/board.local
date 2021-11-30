@extends('layouts.app')

@section('content')

<div class="card">
  <h3 class="card-header">
    Изменить объявление
  </h3>
    <div class="card-body">
      <form action="{{ route('boards.update', $board->id) }}" method="post">
        @csrf
        @method('put')

        @include('boards.partials.form')
      </form>
    </div>
</div>

@endsection
