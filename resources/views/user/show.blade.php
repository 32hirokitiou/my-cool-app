{{-- user.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@extends('layouts.myitems')
@section('title', 'ニュースの新規作成')

{{-- user.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ここに一覧を表示するぞ！</h2>
            </div>
        </div>
    </div>

@endsection


