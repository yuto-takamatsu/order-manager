@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('本当に削除しますか？') }}</div>
                    <form action="/save/company{{ $b->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p>
                        <div class="pl-2">
                            <span id="name">会社名</span><br/>
                            {{ $b->name }}
                        </div>
                        </p>
                        <p>
                        <div class="pl-2">
                            <span id="phone_number">電話番号</span><br>
                            {{ $b->phone_number }}
                        </div>
                        </p>
                        <p>
                        <div class="pl-2">
                            <span id="address">住所</span><br>
                            {{ $b->address }}
                        </div>
                        </p>
                        <p>
                        <div class="pl-2">
                            <input type="submit" value="削除" />
                        </div>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection