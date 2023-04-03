@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('注文先情報一覧') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>会社名</th>
                                <th>電話番号</th>
                                <th>住所</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->phone_number }}</td>
                                <td>{{ $company->address }}</td>
                                <td>
                                    <a href="/save/company{{ $company->id }}/edit_company">編集</a>
                                    <a href="/save/company{{ $company->id }}">削除</a>
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