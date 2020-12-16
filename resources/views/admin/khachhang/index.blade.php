@extends('admin.template.master')
@section('title')
    Khách hàng
@endsection
@push('css')
<style>
    #detailFood{
        width: 100%;
        border: 1px solid wheat;
        background: aliceblue;
        margin: auto;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row" id="detailFood">
        <h4 style="margin: 20px; text-align:center; width:100%;">Danh sách khách hàng</h4>
        <div class="col-md-12" >
            <!-- Table  -->
            <table class="table table-bordered" style="margin: 20px 0">
                <!-- Table head -->
                <thead>
                <tr>
                    <th style="width:50px;">
                    <!-- Default unchecked -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="tableDefaultCheck1">
                    </div>
                    </th>
                    <th>Lorem</th>
                    <th>Ipsum</th>
                    <th>Dolor</th>
                </tr>
                </thead>
                <!-- Table head -->
            
                <!-- Table body -->
                <tbody>
                <tr>
                    <th scope="row">
                    <!-- Default unchecked -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="tableDefaultCheck2" checked>
                        <label class="custom-control-label" for="tableDefaultCheck2"></label>
                    </div>
                    </th>
                    <td>Cell 1</td>
                    <td>Cell 2</td>
                    <td>Cell 3</td>
                </tr>
              
                </tbody>
                <!-- Table body -->
            </table>
            <!-- Table  -->
        </div>
    </div>
</div>
@endsection


