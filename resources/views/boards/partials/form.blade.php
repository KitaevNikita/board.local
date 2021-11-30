      @if ($errors->any())
        @foreach ($errors->all() as $error)
            @component('components.error', [
                'message' => $error,
            ])

            @endcomponent
        @endforeach
    @endif
<div class="form-group">
  <label for="advertisement">Название обьявления</label>
  <input type="text" class="form-control" id="advertisement" name="advertisement" value="{{ $board->advertisement ?? old('advertisement')}}" placeholder="Введите название обьявление" required>
</div>
<div class="form-group">
  <label for="user_name">Имя пользователя</label>
  <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $board->user_name ?? old('user_name')}}" placeholder="Введите имя пользователя" required>
</div>
<div class="form-group">
  <label for="phone">Номер телефона</label>
  <input type="text" class="form-control" id="phone" name="phone" value="{{ $board->phone ?? old('phone')}}" placeholder="Введите номер телефона" required>
</div>
<div class="form-group">
  <label for="inputCategory">Категория</label>
  <select class="form-control" id="inputCategory" name="category">
    <option value="Услуги" {{ (($board->category ?? old('category')) == "Услуги") ? "selected" : "" }}>Услуги</option>
    <option value="Недвижемость" {{ (($board->category ?? old('category')) == "Недвижемость") ? "selected" : "" }}>Недвижемость</option>
    <option value="Товары" {{ (($board->category ?? old('category')) == "Товары") ? "selected" : "" }}>Товары</option>
  </select>
</div>
<input type="hidden" name="user_id" value="{{ Auth::id() }}">
<hr>
<button type="submit" class="btn btn-primary">Сохранить</button>
<a class="btn btn-danger" href="{{ route('boards.index') }}">Отмена</a>
