@extends('app')

@section('title', 'Zoomミーティング編集')

@include('nav')

@section('content')

  <div class="container my-5">
    <div class="row">
      <div class="mx-auto col-md-7">
        <div class="card">
          <h2 class="h4 card-header text-center sunny-morning-gradient text-white">Zoomミーティングを編集</h2>
          <div class="card-body pt-3">

            @include('error_card_list')

            <div class="my-4">
              <form method="POST" class="w-75 mx-auto" action="{{ route('meetings.update', ['meeting' => $meeting]) }}">
                @method('PATCH')
                @include('meetings.form')

                <div class="mt-4">
                  <button class="btn btn-block peach-gradient mt-2 mb-2" type="submit" text-while>
                    <span class="h5">更新する</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
