@extends('layouts.app')

@section('content')
      @if ($errors->any())
        @foreach ($errors->all() as $error)
            @component('components.error', [
                'message' => $error,
            ])

            @endcomponent
        @endforeach
    @endif
<div class="card">
  <h3 class="card-header">
    Доска объявлений
  </h3>
  <br>
    @forelse($boards as $board)
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $board->advertisement }}</h5>
        <p class="card-text"><b>Категория: </b>{{ $board->category }}</p>
          <div class="card-footer">
              <p class="card-text"><b>Автор: </b>{{ $board->user_name }}</p>
              <p class="card-text"><b>Номер телефона: </b>{{ $board->phone }}</p>
          </div>
      </div>
    </div>
    <br>
    @empty
    <h3 class="text-center">Объявления отсутствуют</h3>
    @endforelse
</div>
@if($boards->total() > $boards->count())
    {{ $boards->links() }}
@endif
@endsection
