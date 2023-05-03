@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('本日注文一覧') }}</div>

                <div class="card-body">
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
                    <p>
                        <form action="/home" method="GET">
                            <div class="row justify-content-between">
                                <div class="col-5">
                                    <input type="text" class="form-control form-control-sm" name="keyword">
                                    <div class="col-4 offset-8">
                                        <input type="submit" class="form-control form-control-sm" value="検索">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <select class="form-select form-select-sm" aria-label="sort_info" name="sort_info">
                                        <option selected value="">並び変え</option>
                                        <option value="name">品名</option>
                                        <option value="company_name">注文先会社名</option>
                                        <option value="company_phone_number">注文先電話番号</option>
                                        <option value="order_week">注文曜日</option>
                                    </select>
                                        <div class="col-6 offset-6">
                                            <input type="submit" class="form-control form-control-sm" value="並び変え">
                                        </div>
                                </div>
                            </div>
                        </form>
                    </p>
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
                                <td>
                                    <a href="/save/item{{ $item->id }}/edit_item">編集</a>
                                    <a href="/save/item{{ $item->id }}">削除</a>
                                </td>
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
