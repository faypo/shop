@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @foreach($merch as $col)
                <div class="col-md-6">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="height: 500px;background-image: url('{{route('getpic',['id'=>$col->id])}}');background-repeat: no-repeat;
                            background-position: center;">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 "></div>
                                <!-- /.col -->
                                <div class="col-sm-4 ">
                                    <div class="description-block">
                                        <h3><a href="show/{{$col->id}}">{{$col->name}}</a></h3>
                                        <span class="description-text">價格：{{$col->price}}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>

            @endforeach
        </div>
    </div>
@stop

