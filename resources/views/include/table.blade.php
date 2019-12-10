    <div class = "col-md-7">
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Upload Merchandises</h3>
        </div>

    <!-- /.box-header -->
    <!-- form start -->

    <form role="form" method="post" action="{{route('upload')}}" enctype="multipart/form-data">
        <div class="box-body">
            <div class="form-group">
                <label for="merchName">品名</label>
                <input type="text" class="form-control" id="merchName" name="merchName" placeholder="品名">
            </div>
            <div class="form-group">
                <label for="merchName">分類</label>
                <input type="text" class="form-control" id="merchType" name="merchType" placeholder="分類">
            </div>
            <div class="form-group">
                <label for="merchPrice">價格</label>
                <input type="text" class="form-control" id="merchPrice" name="merchPrice" placeholder="價格">
            </div>
            <div class="form-group">
                <label for="merchIntro">介紹</label>
                <textarea class="form-control" rows="3" name="merchIntro" placeholder="介紹"></textarea>
            </div>
            <div class="form-group">
                <label for="merchPic">商品照片</label>
                <input type="file" title="請選擇圖片" id="merchPic" name="merchPic" required multiple accept="image/png,image/jpg,image/gif,image/JPEG"/>

            </div>


        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">upload</button>
        </div>
        {{csrf_field()}}
    </form>
    </div>
    </div>
    </div>
    @if(isset($merchName))
        <div class = "col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Show Upload Merchandises</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>品名：{{$merchName}}</label>
                    </div>
                    <div class="form-group">
                        <label>品名：{{$merchType}}</label>
                    </div>
                    <div class="form-group">
                        <label>價格：{{$merchPrice}}</label>
                    </div>
                    <div class="form-group">
                        <label>介紹：{{$merchIntro}}</label>
                    </div>
                    <div class="form-group">
                        <label>{{$merchPic}}</label>
                    </div>
                </div>
            </div>
        </div>
    @endif
