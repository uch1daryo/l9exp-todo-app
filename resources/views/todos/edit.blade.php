@extends('layouts.app')
@section('title', 'edit')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        TODO 編集
      </div>
      <div class="card-body">
      <form method="POST" action="{{ url('todos/' . $todo['id']) }}">
          @csrf
          @method('PUT')
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="title">タイトル</label>
            <div class="col-sm-10">
              <input type="text" name="title" class="form-control" id="title" value="{{ $todo['title'] }}">
            </div>
          </div>
          <button class="btn btn-primary" type="submit">更新</button>
        </form>
    </div>
    </div>
  </div>
</div>
@endsection
