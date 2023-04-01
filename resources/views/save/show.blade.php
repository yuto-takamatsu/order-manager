@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('本当に削除しますか？') }}</div>
                    <form action="/save/{{ $b->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p>
                        <div class="pl-2">
                            <span id="name">品名</span><br/>
                            {{ $b->name }}
                        </div>
                        </p>
                        <p>
                        <div class="pl-2">
                            <span id="company_name">注文先会社名</span><br>
                            {{ $b->company_name }}
                        </div>
                        </p>
                        <p>
                        <div class="pl-2">
                            <span id="company_phone_number">注文先電話番号</span><br>
                            {{ $b->company_phone_number }}
                        </div>
                        </p>
                        <p>
                        <div class="pl-2">
                            <span id="order_week">注文曜日</span><br>
                            {{ $b->order_week }}
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