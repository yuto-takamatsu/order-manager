@extends('layouts.app')
@section('content')
@if($errors->any())
    <ul>
        @foreach($errors->all() as $err)
        <li class="text-danger">{{ $err }}</li>
        @endforeach
    </ul>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('品目情報登録') }}</div>

                <div class="card-body">

                    <form method="POST" action="/save/create_item">
                        @csrf
                        <p>
                            <div class="pl-2">
                                <label id="name">品目名</label></br>
                                <input id="name"  name="name" type="text" size="30" value="{{ old('name') }}" />
                        </div>
                        </p>
                        <p>
                            <div class="pl-3">
                                    <label id="order_week">注文曜日</label></br>
                                    <select name="order_week"/>
                                        <option value="">選択してください</option>
                                        <option value="月" label="月曜日">月曜日</option>
                                        <option value="火" label="火曜日">火曜日</option>
                                        <option value="水" label="水曜日">水曜日</option>
                                        <option value="木" label="木曜日">木曜日</option>
                                        <option value="金" label="金曜日">金曜日</option>
                                        <option value="土" label="土曜日">土曜日</option>
                                        <option value="日" label="日曜日">日曜日</option>
                                    </select>
                            </div>
                        </p>
                        <p>
                            <div class="pl-4">
                                    <label id="company_id">会社名</label></br>
                                    <select name="company_id"/>
                                        <option value="">選択してください</option>
                                            @foreach($companies as $key => $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                    </select>
                            </div>
                        </p>
                        <p>
                            <div class="pl-2">
                                <input type="submit" value="登録">
                            </div>
                        </p>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection