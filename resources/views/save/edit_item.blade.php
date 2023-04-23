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
                <div class="card-header">{{ __('品目情報編集') }}</div>
                <div class="card-body">
                    <form action="/save/item{{ $b->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <p>
                            <div class="pl-2">
                                <label id="name">品目名</label></br>
                                <input id="name"  name="name" type="text" size="30" value="{{ old('name',$b->name) }}"/>
                        </div>
                        </p>
                        <p>
                            <div class="pl-2">
                                    <label id="order_week">注文曜日</label></br>
                                    <select name="order_week">
                                        <option value="">選択してください</option>
                                        <option value="月" @if("月" === old('order_week',$b->order_week)) selected @endif label="月曜日">月曜日</option>
                                        <option value="火" @if("火" === old('order_week',$b->order_week)) selected @endif label="火曜日">火曜日</option>
                                        <option value="水" @if("水" === old('order_week',$b->order_week)) selected @endif label="水曜日">水曜日</option>
                                        <option value="木" @if("木" === old('order_week',$b->order_week)) selected @endif label="木曜日">木曜日</option>
                                        <option value="金" @if("金" === old('order_week',$b->order_week)) selected @endif label="金曜日">金曜日</option>
                                        <option value="土" @if("土" === old('order_week',$b->order_week)) selected @endif label="土曜日">土曜日</option>
                                        <option value="日" @if("日" === old('order_week',$b->order_week)) selected @endif label="日曜日">日曜日</option>
                                    </select>
                            </div>
                        </p>
                        <p>
                            <div class="pl-2">
                                    <label id="company_id">会社名</label></br>
                                    <select name="company_id">
                                        <option value="">選択してください</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}" @if($company->id === (int)old('company_id',$select_company_id)) selected @endif>{{ $company->name }}</option>
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