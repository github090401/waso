@extends('admin.layout.default')
@section('css')

    <style>
        .maxUl li .liRight table tr td label{display: block;}
        .openBtn{color:#176b86;  cursor: pointer;width: 100px}
       .openTM:hover{text-decoration: underline;}
       .TMBox{display: none;}
       .TMBox label{margin:0; display: block; text-align: center;}
    </style>
 @endsection
@section('js')
@includeIf('admin.orders.script.script')
@endsection
@section('content')
    <div class="nowWebBox">
        <div class="PageBtn">
            <div class="phoneBtns" id="main">
                <button class="Btn Refresh ">刷新</button>
                @can('create orders')
                    <button type="submit" class="Btn common_add" form_id="orders"
                            location="top">@if(Route::is('admin.orders.create'))添加@else
                            修改@endif</button>
                @elsecan('edit orders')
                    <button type="submit" class="Btn common_add" form_id="orders"
                            location="top">@if(Route::is('admin.orders.create'))添加@else
                            修改@endif</button>

                @endcan
                @if(!Route::is('admin.orders.create'))
                <button class="Btn orders_for_the_transfer" @click="orders_for_the_transfer">订单过户</button>
                @endif


                <button class="changeWebClose Btn">返回</button>
            </div>
            <div class="phoneBtnOpen"></div>
        </div>
        <div class="PageBox">
            @if(is_mobile())
             @include('admin.orders.mobile_form')
             @else
             @include('admin.orders.form')
            @endif
        </div>
    </div>

@endsection