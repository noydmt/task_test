@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <div class="row">
            {{ $contact->your_name }}
            {{ $contact->email }}
            {{ $contact->url }}
            {{ $gender }}
            {{ $age }}
            {{ $contact->contact }}
            <form method="GET" action="">
              @csrf
              <input class="btn btn-primary" type="submit" name="btn_confirm" value="変更する">
              <input type="hidden" name="csrf">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection