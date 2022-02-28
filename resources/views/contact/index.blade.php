@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
                  <button type="submit" class="btn btn-primary" onclick="location.href='{{ route('contact.create') }}' ">新規登録</button>
                  <div class="col-md-4">
                    <form class="d-flex">
                      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">検索</button>
                    </form>
                  </div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">updated_at</th>
                        <th scope="col">detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($contacts as $contact)
                      <tr>
                        <th scope="row">{{ $contact->id }}</th>
                        <td>{{ $contact->your_name }}</td>
                        <td>{{ $contact->updated_at }}</td>
                        <td><a href="{{ route('contact.show', ['id' => $contact->id ]) }}">詳細を見る</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
