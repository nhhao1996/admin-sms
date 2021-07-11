@extends('admin::layouts.master')
@section('content')
<section class="content">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-10 item-send-mess">
            <div class="title header-title text-left">Gửi một tin</div>
            <form id="form-data">
                @csrf
                <div class="p-4">
                    <div class="form-group">
                        <label>Thương hiệu gửi tin: <span class="red">*</span></label>
                        <select class="custom-select" name="brand_id" required>
                            <option selected>Open this select menu</option>
                            @foreach ($brandInfo as $data)
                            <option value="{{$data['brand_id']}}">{{$data['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SĐT người nhận: <span class="red">*</span></label>
                        <input type="number" name="phone" class="form-control" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label>Nội dung tin nhắn: <span class="red">Tối đa 160 ký tự</span></label>
                        <textarea rows="4" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input checked class="form-check-input" type="radio" name="send_type" value="now">
                            <label class="form-check-label" for="inlineRadio1">Gửi ngay</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row ">
                            <div class="col-12 col-md-3 d-inline-block">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="send_type" id="inlineRadio1" value="schedule">
                                    <label class="form-check-label" for="inlineRadio1">Đặt lịch gửi:</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 center d-flex justify-content-start">
                                <label>
                                    Giờ:
                                </label>
                                <select class="w-1 custom-select custom-select-sm" name="hour">
                                    @for($i = 0; $i <= 23; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                                <label>:</label>
                                <select class="custom-select custom-select-sm" name="min">
                                    @for($i = 0; $i <= 59; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                            <div class="col-12 col-md-6 d-flex justify-content-start">
                                <label>
                                    Ngày:
                                </label>
                                <select class="custom-select custom-select-sm" name="day">
                                    @for($i = 1; $i <= 31; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                                <label>/</label>
                                <select class="custom-select custom-select-sm" name="month">
                                    @for($i = 1; $i <= 12; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                                <label>/</label>
                                <select class="custom-select custom-select-sm" name="year">
                                    <option value="2021" selected>2021</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button id="submit" type="button" class="btn font-weight-bold btn-custom btn-primary">Gửi</button>
                    </div>
                </div>
            </form>
            <div class="footer-bg"></div>
        </div>
</section>
<script type="text/javascript">
    $('#submit').click(function() {
        var formData = $('#form-data').serialize();

        $.ajax({
            url: '{{ route("admin.store-single-sms") }}',
            type: 'POST',
            data: formData,
            success: function(res) {
                alert(res);
            },
            error: function() {
            }
        });
    });
</script>
@endsection