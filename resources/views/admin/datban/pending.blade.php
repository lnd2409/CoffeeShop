@extends('admin.template.master')
@section('title')
Danh sách đặt bàn
@endsection
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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary show-modal" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="fa fa-table" aria-hidden="true"></i>
                </button>

                <!-- Modal -->
                @push('insert_html')

                <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Danh sách bàn</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">

                                    @foreach ($item->ban as $bann)
                                    <div class="col-md-4">

                                        <input type="checkbox" name="" id="">
                                        <label for="">{{$bann->ba_id}}</label>
                                        <br>

                                        @if($bann->banan->isNotEmpty())
                                        <p>
                                            {{$bann->banan[0]->pd_gioden}}
                                        </p>

                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                <button type="button" class="btn btn-primary">Lưu</button>
                            </div>
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