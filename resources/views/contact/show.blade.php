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
            <!-- <form method="GET" action="{{ route('contact.edit', ['id' => $contact->id ]) }}"> -->
            <!-- </form> -->
          </div>
          <button type="submit" class="btn btn-primary" onclick="location.href='{{ route('contact.edit', ['id' => $contact->id ]) }}' ">編集</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
