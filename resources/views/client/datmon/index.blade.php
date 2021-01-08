@extends('client.template.master')
@section('title')
Đặt bàn
@endsection
@push('css')

<style>
    .table-borderless>tbody>tr>td,
    .table-borderless>tbody>tr>th,
    .table-borderless>tfoot>tr>td,
    .table-borderless>tfoot>tr>th,
    .table-borderless>thead>tr>td,
    .table-borderless>thead>tr>th {
        border: none;
    }

    .setsize {
        font-size: 15px;
        margin: auto;
    }

    .icon {
        text-align: center;
        vertical-align: bottom;
    }

    table i {
        /* font-size: 25px !important; */
    }

    /* Toggle this switch element */
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 0px;
        bottom: 0px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(20px);
        -ms-transform: translateX(20px);
        transform: translateX(20px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
@endpush
@section('content')
<div class="" style="margin-left: 200px;margin-right: 200px">
    <form action="{{route('datban.setTable')}}" method="post" class="frm" id="frm">
        @csrf
        <table class="table table-borderless">
            <tr>
                <td class="icon"><i class="fa fa-users setsize" aria-hidden="true"></i></td>
                <td>
                    Số lượng khách
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="number" class="form-control" name="amountCustomer">

                </td>
            </tr>
            <tr>
                <td class="icon">
                    <i class="fa fa-calendar setsize" aria-hidden="true"></i>
                </td>
                <td>Ngày nhận chỗ</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="date" class="form-control" name="date"></td>
            </tr>
            <tr>
                <td class="icon">
                    <i class="fa fa-clock-o setsize" aria-hidden="true"></i>
                </td>
                <td>Thời gian</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="time" class="form-control" name="time"></td>
            </tr>
            <tr>
                <td class="icon">
                    <i class="fa fa-file-text-o setsize" aria-hidden="true"></i>
                </td>
                <td>Ghi chú thêm</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="text" class="form-control" name="note"></td>
            </tr>
            <tr>
                <td class="icon">
                    <img src="{{asset('client/svg/tray.svg')}}" alt="" class="setsize" style="width:23px">
                </td>
                <td>Món ăn</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <label class="switch">
                        <input type="checkbox" checked id="inputChooseFood" name="inputChooseFood">
                        <span class="slider round"></span>
                    </label>
                    <label for="inputChooseFood">Chọn món trước</label>

                </td>
            </tr>
            <tr class="chooseFood">
                <td></td>
                <td>
                    <div class="data">
                        <div class="row">
                            <div class="col-md-8">

                                <select class="selectpicker form-control selectFood 0" data-live-search="true"
                                    name="food[]" data-before=0 data-select=0>
                                    <option data-tokens="Chọn sau" value="0" data-price=0 selected disabled>Chọn món
                                    </option>
                                    @foreach ($monan as $item)

                                    <option data-tokens="{{$item->nma_ten}} {{$item->ma_ten}}" value="{{$item->ma_id}}"
                                        data-price="{{$item->ma_gia}}">
                                        {{$item->nma_ten}},
                                        {{$item->ma_ten}}
                                        <span class="" style="float: right"> {{number_format($item->ma_gia)}}
                                        </span>
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">

                                <input class="form-control amount" type="number" name="amount[]" placeholder="Số lượng"
                                    min="1" data-id="1" value="1" step="any" data-amount=0
                                    onKeyUp="if(this.value>100){this.value='100';}else if(this.value<1){this.value='1';}">
                            </div>
                            <div class="col-md-1 text-center ">
                                <a class="testimonial"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </div>
                            <div class="addFood"></div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="chooseFood">
                <td></td>
                <td>
                    <a type="button" id="addFood">Thêm món</a>
                    <input type="hidden" name="total" value="0" id="inputTotal">
                    {{-- <span style="float: right">Tổng tiền:
                        <span id="total">0</span>
                    </span> --}}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>

                    <button type="button" class="btn btn-secondary" style="color:black">Trở lại</button>
                    <button type="submit" class="btn btn-success">Đặt bàn</button>
                </td>
            </tr>
        </table>
    </form>
</div>


@endsection
@push('script')
<link rel="stylesheet" href="{{asset('client/assets/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css')}}">
<script src="{{asset('client/assets/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('client/assets/bootstrap-select-1.13.14/dist/js/i18n/defaults-vi_VN.min.js')}}"></script>
<script>
    $('.selectpicker').selectpicker();
</script>
<script>
    $(document).ready(function () {
        let count=1;
        $('#addFood').click(function (e) {
            let html='<div class="append">';
            html+='<div class="col-md-12"><br></div>';
            html+='<div class="col-md-8">';
            html+='<select class="form-control selectpicker selectFood '+count+'" data-live-search="true" name="food[]" data-before=0 data-select="'+count+'">';
            html+='<option data-tokens="Chọn món" value="0" data-price=0 selected="true" disabled="disabled">Chọn món</option>';
            html+='@foreach ($monan as $item)';
            html+='<option data-tokens="{{$item->nma_ten}} {{$item->ma_ten}}" value="{{$item->ma_id}}" data-price="{{$item->ma_gia}}">{{$item->nma_ten}}, {{$item->ma_ten}}';
            html+='<span class="" style="float: right"> {{number_format($item->ma_gia)}} </span>';
            html+='</option>';
            html+='@endforeach';
            html+='</select>';
            html+='</div>';
            html+='<div class="col-md-3">';
            html+='<input class="form-control amount" data-amount="'+count+'" type="number" name="amount[]" value="1" placeholder="Số lượng" min="1" step="any" onKeyUp="if(this.value>100){this.value=`100`;}else if(this.value<1){this.value=`1`;}">';
            html+='</div>';
            html+='<div class="col-md-1 text-center ">';
            html+='<a class="testimonial"><i class="fa fa-times" aria-hidden="true"></i></a>';
            // html+='</div>';
            html+='</div>';
            count++;
            $('.addFood').append(html);
            $('.selectpicker').selectpicker();

            $( ".append" ).each(function(index) {
                $('.testimonial').click(function (e) {
                    // e.preventDefault();
                    $(this).parents(".append").html('');

                });
            });
           

        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.testimonial').click(function (e) {
            $("#inputChooseFood").click();

        });
        $("#inputChooseFood").click(function(){
            var status = $(this).prop("checked");
            console.log(status);
            if(status==true){
                $('.chooseFood').removeClass('hidden');
                document.getElementById("inputChooseFood").checked=true;
            }else{
                $('.chooseFood').addClass('hidden');
                document.getElementById("inputChooseFood").checked=false;
            }
        });
    });
</script>
@endpush