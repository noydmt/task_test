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
            <form method="POST" action="">
              @csrf
              {{ $contact->your_name }}
              {{ $contact->email }}
              {{ $contact->url }}
              {{ $contact->gender }}
              {{ $contact->age }}
              {{ $contact->contact }}
              <input class="btn btn-primary" type="submit" name="btn_confirm" value="更新する">
              <input type="hidden" name="csrf">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
