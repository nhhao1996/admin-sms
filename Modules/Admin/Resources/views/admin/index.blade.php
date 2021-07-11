@extends('admin::layouts.master')
@section('content')
<section class="content">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-2">
            <div class="item-send-mess">
                <a href="{{ route('admin.config-single-sms') }}">
                    <div class="title bd-custom font-weight-bold">Gửi một tin</div>
                    <div class="content">
                        <img src="{{ asset('assets/image/send1.png') }}">
                    </div>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-2">
            <div class="item-send-mess">
                <a href="#">
                    <div class="title bd-custom font-weight-bold">Gửi nhiều tin</div>
                    <div class="content">
                        <img src="{{ asset('assets/image/sendn.png') }}">
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection