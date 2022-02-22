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
            <form method="POST" action="{{ route('contact.update', [ 'id' => $contact->id ]) }}">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="your_name">氏名</label>
                  <input
                    type="text"
                    class="form-control"
                    id="your_name"
                    name="your_name"
                    value="{{ $contact->your_name }}"
                    required
                  >
                </div>
                <div class="form-group">
                  <label for="email">e-mail</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    value="{{ $contact->email }}"
                    required
                  >
                </div>
                <div class="form-group">
                  <label for="url">ホームページ</label>
                  <input
                    type="url"
                    class="form-control"
                    id="url"
                    name="url"
                    value="{{ $contact->url }}"
                    required
                  >
                </div>
                <label>性別</label><br>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    id="man"
                    name="gender"
                    value="0"
                    @if($contact->gender === 0)
                      checked
                    @endif
                  >
                <label class="form-check-label" for="man">男</label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    id="woman"
                    name="gender"
                    value="1"
                    @if($contact->gender === 1)
                      checked
                    @endif
                  >
                  <label class="form-check-label" for="woman">女</label>
                </div>
                <div class="form-group">
                  <label for="age">年齢</label>
                  <select class="form-control" name="age">
                    <option value="0">選択してください。</option>
                    <option
                      value="1"
                      @if($contact->age === 1)
                        selected
                      @endif
                    >15~19</option>
                    <option
                      value="2"
                      @if($contact->age === 2)
                        selected
                      @endif
                    >20~24</option>
                    <option
                      value="3"
                      @if($contact->age === 3)
                        selected
                      @endif
                    >25~29</option>
                    <option
                      value="4"
                      @if($contact->age === 4)
                        selected
                      @endif
                    >30~34</option>
                    <option
                      value="5"
                      @if($contact->age === 5)
                        selected
                      @endif
                    >35~</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="contact">お問い合わせ</label>
                  <textarea class="form-control" id="contact" name="contact">{{ $contact->contact }}</textarea>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="caution" name="caution" value="1">
                  <label class="form-check-label" for="caution">注意事項</label>
                </div>
              </div>
              <input type="hidden" name="csrf">
              @csrf
              <input class="btn btn-primary" type="submit" value="更新する">
              <input type="hidden" name="csrf">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
