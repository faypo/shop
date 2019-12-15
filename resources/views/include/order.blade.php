@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">所有訂單：</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>訂單編號</th>
                            <th>商品編號</th>
                            <th>size</th>
                            <th>數量</th>
                            <th>總價</th>
                            <th>收貨地址</th>
                        </tr>
                        @foreach($order as $col)
                        <tr>
                            <td>{{$col->order_id}}</td>
                            <td>{{$col->merchandise_id}}</td>
                            <td>{{$col->size}}</td>
                            <td>{{$col->buy_count}}</td>
                            <td>{{$col->total_price}}</td>
                            <td>{{$col->address}}</td>
                        </tr>
                        @endforeach
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
