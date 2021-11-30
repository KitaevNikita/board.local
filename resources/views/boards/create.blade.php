@extends('layouts.app')

@section('content')

<div class="card">
  <h3 class="card-header">
    Добавить новое объявление
  </h3>
  <div class="card-body">
    <form action="{{ route('boards.store') }}" method="post">
      @csrf

      @include('boards.partials.form')
    </form>
  </div>
</div>

@endsection

