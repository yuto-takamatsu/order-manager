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
                <div class="card-header">{{ __('会社情報登録') }}</div>

                <div class="card-body">

                    <form method="POST" action="/save/create_company">
                        @csrf
                        <p>
                            <div class="pl-2">
                                <label id="company_name">会社名</label></br>
                                <input id="company_name"  name="company_name" type="text" size="30" value="{{ old('name') }}" />
                            </div>
                        </p>
                        <p>
                            <div class="pl-2">
                                <label id="phone_number">電話番号</label></br>
                                <input id="phone_number" name="phone_number" type="text" size="15" value="{{ old('phone_number') }}" />
                        </div>
                        </p>
                        <p>
                            <div class="pl-2">
                                <label id="address">住所</label></br>
                                <input id="address"  name="address" type="text" size="30" value="{{ old('address') }}" />
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