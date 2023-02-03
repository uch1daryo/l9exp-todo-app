@extends('layouts.app')
@section('title', 'index')
@section('content')
<div class="row">
  <div class="col-12 mb-3">
    <a href="{{ url('todos/create') }}" class="btn btn-primary">TODO 新規登録</a>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        TODO 一覧
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">タイトル</th>
              <th scope="col">作成</th>
              <th scope="col">更新</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($todosArray as $todo)
            <tr>
              <td>{{ $todo['id'] }}</td>
              <td>{{ $todo['title'] }}</td>
              <td>{{ $todo['created_at'] }}</td>
              <td>{{ $todo['updated_at'] }}</td>
              <td><a href="{{ url('todos/' . $todo['id']) }}" class="btn btn-info">詳細</a></td>
              <td><a href="{{ url('todos/' . $todo['id'] . '/edit') }}" class="btn btn-primary">編集</a></td>
              <td>
                <form method="POST" action="{{ url('todos/' . $todo['id']) }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">削除</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
