@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @foreach($merch as $col)
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{route('getpic',['id'=>$col->id])}}">
                    </div>
                    <div class="col-md-5">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h1 class="box-title">{{$col->type}}</h1>
                            </div>
                            <div class="box-body">
                                <ul style="list-style:none">
                                    <li style="font-size:30px;">品名:{{$col->name}}</li>
                                    <li style="font-size:30px;">價格:{{$col->price}}</li>
                                    <li style="font-size:30px;">庫存:{{$col->stock_count}}</li>
                                    <li style="font-size:20px;"> {{$col->introduction}}</li>
                                </ul>

                            </div>

                            <form role="form" method="post" action="{{route('order', ['id'=>$col->id])}}" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="orderCnt">數量</label>
                                        <input type="text" class="form-control" id="orderCnt" name="orderCnt" placeholder="數量">
                                    </div>
                                    <div class="form-group">
                                        <label>SIZE</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="orderSize" value="S">
                                                S
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="orderSize" value="M">
                                                M
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="orderSize" value="L" >
                                                L
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="orderSize" value="XL" >
                                                XL
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="orderAdd">地址</label>
                                        <input type="text" class="form-control" name="orderAdd" placeholder="地址">
                                    </div>

                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-block btn-info">點我購買</button>
                                    </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
            @endforeach
        </div>
    </div>
@stop
