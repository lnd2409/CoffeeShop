@extends('admin.template.master')
@section('title')
Danh sách đặt bàn
@endsection
@push('css')
<style>
    .background {
        background: #bbefd4;
        border: 2px solid;
        margin: 5px;
        height: 100px;
        overflow: auto;
    }

    input[type=checkbox] {
        transform: scale(1.5);
    }

    .table-number {}
</style>
@endpush
@section('content')
<table class="table table-hover table-light">
    <th>
        <tr>
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Ngày đặt</th>
            <th>Ngày nhận</th>
            <th>Số lượng khách</th>
            <th>Ghi chú</th>
            <th>Món ăn</th>
            <th>Chọn bàn</th>
        </tr>
    </th>
    <tbody>
        @foreach ($phieudat as $key=>$item)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->kh_ten}}</td>
            <td>{{$item->pd_ngaylap}}</td>
            <td>{{$item->pd_ngayden}} - {{$item->pd_gioden}}</td>
            <td>{{$item->pd_soluongkhach}}</td>
            <td>{{$item->pd_ghichu}}</td>
            <td>
                @foreach ($item->chitiet as $chitiet)
                {{$chitiet->ma_ten}}
                <br>
                @endforeach
            </td>
            <td>
                @if ($item->nv_id != null)
                    <p style="color: red;">Đã nhận bàn</p>
                @else
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary show-modal" data-toggle="modal"
                        data-target="#exampleModal">
                        <i class="fa fa-table" aria-hidden="true"></i>
                    </button>
                @endif
                <!-- Modal -->
                @push('insert_html')

                <div class="modal" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Danh sách bàn</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <form action="{{route('confirmOrder')}}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <table>
                                        <tr>
                                            <td>Số khách: </td>
                                            <td>{{$item->pd_soluongkhach}}</td>
                                        </tr>
                                        <tr>
                                            <td>Thời gian: </td>
                                            <td>{{$item->pd_ngayden}} - {{$item->pd_gioden}}</td>
                                        </tr>
                                        <tr>
                                            <td>Ghi chú: </td>
                                            <td>{{$item->pd_ghichu}}</td>
                                        </tr>
                                    </table>
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{$item->pd_id}}">
                                        @foreach ($item->ban as $key=>$bann)
                                        <div class="col-md-3">
                                            <div class="background text-center">

                                                <input type="checkbox" name="tableNumber[]" value="{{$bann->ba_id}}"
                                                    id="tableNumber{{$key}}">
                                                <label for="tableNumber{{$key}}" class="table-number">
                                                    <strong>
                                                        &nbsp;Bàn số {{$bann->ba_id}}
                                                    </strong>

                                                </label>
                                                <br>

                                                @if($bann->banan->isNotEmpty())
                                                <p>
                                                    {{$bann->banan[0]->pd_gioden}}
                                                    <br>
                                                </p>

                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endpush
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@push('script')

<script>
</script>
@endpush
