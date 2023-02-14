<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TodoList</title>
  <link rel="stylesheet" href="public/css/reset.css">
  <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
  @extends('todo.default')

  @section('content')


  <div class="body">
    <div class="card">
      <div class="flex">
        <h2 class="ttl">タスク検索</h2>
        @if (Auth::check())
        <p class="flex_end">「{{$user->name}}」でログイン中</p>
        @else
        <p class="flex_end">ログインしてください。（<a href="/login">ログイン</a>
          <a href="/register">登録</a>）
        </p>
        @endif
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
            {{ __('ログアウト') }}
          </x-responsive-nav-link>
        </form>
      </div>
      <form action="{{ route('todo.search') }}" method="post">
        @csrf
        <input type="text" class="create" name="input" value="{{$input}}">
        <select name="tag_id" id="">
          @foreach ($tags as $tag)
          <option value="{{ $tag->id }}">{{$tag->name}}</option>
          @endforeach
        </select>

        <input type="submit" class="create__btn" value="検索">
        @if($errors->has('name'))
        @foreach($errors->get('name') as $message)
        {{ $message }}<br>
        @endforeach
        @endif
      </form>
      <table class="table">
        <tr>
          <th class="padding1">作成日</th>
          <th class="padding1">タスク名</th>
          <th class="padding1">タグ</th>
          <th class="padding2">更新</th>
          <th class="padding2">削除</th>
        </tr>
        @foreach ($todos as $todo)
        
        <tr>
          <td>{{$todo->created_at}}</td>
          <form action="{{ route('todo.update',$todo->id) }}" method="POST">
            @csrf
            <td class="padding1"><input type="text" name="name" class="update_value" value="{{ $todo->name }}"></td>
            <td>
              <select name="tag_id" id="" class=" padding2" value="">
                @foreach ($tags as $tag)
                {{ $selected = '' }}
                @if($todo->tag_id == $tag->id)
                {{$selected = 'selected'}}
                @endif
                <option value="{{ $todo->id }}" {{$selected}}>{{$tag->name}}</option>
                @endforeach
              </select>
            </td>
            <td class="padding2">
              <button type="submit" class="update_btn">更新</button>
            </td>
          </form>
          <form action="{{ route('todo.delete',$todo->id) }}" method="POST">
            @csrf
            <td class="padding2">
              <button type="submit" class="delete_btn">削除</button>
            </td>
          </form>


        </tr>
       
        @endforeach
      </table>
      <a href="{{ url('/home') }}">戻る</a>
    </div>
  </div>
  @endsection
</body>

</html>