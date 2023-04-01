@extends('layouts.app')

@section('content')<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('本日注文一覧') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>品名</th>
                                <th>注文先会社名</th>
                                <th>注文先電話番号</th>
                                <th>注文曜日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_items as $order_item)
                            <tr>
                                <td>{{ $order_item->name }}</td>
                                <td>{{ $order_item->company_name}}</td>
                                <td>{{ $order_item->company_phone_number }}</td>
                                <td>{{ $order_item->order_week }}</td>
                            </tr>
                        </tbody>
                            
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('注文一覧') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>品名</th>
                                <th>注文先会社名</th>
                                <th>注文先電話番号</th>
                                <th>注文曜日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->company_name}}</td>
                                <td>{{ $item->company_phone_number }}</td>
                                <td>{{ $item->order_week }}</td>
                            </tr>
                        </tbody>
                            
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
