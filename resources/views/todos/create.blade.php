@extends('layouts.app')
@section('title', 'create')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        TODO 新規登録
      </div>
      <div class="card-body">
        <form method="POST" action="{{ url('todos/') }}">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="title">タイトル</label>
            <div class="col-sm-10">
              <input type="text" name="title" class="form-control" id="title">
            </div>
          </div>
          <button class="btn btn-primary" type="submit">登録</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
