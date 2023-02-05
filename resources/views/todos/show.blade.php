@extends('layouts.app')
@section('title', 'show')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        TODO 詳細
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">タイトル</th>
              <th scope="col">作成</th>
              <th scope="col">更新</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $todo['id'] }}</td>
              <td>{{ $todo['title'] }}</td>
              <td>{{ $todo['created_at'] }}</td>
              <td>{{ $todo['updated_at'] }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
