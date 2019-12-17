<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Services\ＭerchandiseService;
use App\Services\OrderService as OrderService;
use App\Models\Merchandise;
use Illuminate\Support\Facades\Response;
use mysql_xdevapi\Exception;

class HomeController extends Controller
{
    private $merchServ;
    private $orderServ;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->merchServ = app(ＭerchandiseService::class);
        $this->orderServ = app(OrderService::class);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $db = $this->merchServ->showMerchandise();
        return view("home", [
            'merch' => $db
        ]);
    }

    public function merchandise()
    {
        return $this->merchServ;
    }

    public function gettable()
    {
        if (Auth::user()->permission == 'H') {
            return view("include.table");
        }
        $db = $this->merchServ->showMerchandise();
        return view("home", [
            'merch' => $db
        ]);

    }

    public function upload(Request $request)
    {

        if (Auth::user()->permission == 'H') {
            $Merchanise = new Merchandise();
            $fileName = $_FILES['merchPic']['name'];
            $tmpname = $_FILES['merchPic']['tmp_name'];
            $filetype = $_FILES['merchPic']['type'];
            $filesize = $_FILES['merchPic']['size'];
            $file = null;

            $file = File::get($tmpname);
            $type = File::mimeType($tmpname);
//
//        $response = Response::make($file, 200);
//        $response->header("Content-Type", $type);
//        return $response;

            $data = $request->all();  // array
            $this->merchServ
                ->createMerchandise(
                    $data['merchName'], $data['merchPrice']
                    , $data['merchIntro'], $data['merchType']
                    , base64_encode($file), $type
                );
            return view("include.table", $data);
        }
        $db = $this->merchServ->showMerchandise();
        return view("home", [
            'merch' => $db
        ]);
    }

    public function getMerchandise($id)
    {

        $merch = $this->merchServ->getMerchandise($id);
        $response = Response::make(base64_decode($merch[0]['picture']), 200);
        $response->header("Content-Type", $merch[0]['pic_type']);
        return $response;

        //        foreach ($merch as $val){
        //            $val['picture']=base64_decode($val['picture']);
        //        };
    }

    public function showMerchandise()
    {
        $db = $this->merchServ->showMerchandise();
        return view("include.show", [
            'merch' => $db
        ]);

    }

    public function showOne($id, Request $request)
    {
        $db = $this->merchServ->getMerchandise($id);
//        dd(Auth::user()->email);
        return view('include.showone', [
            'merch' => $db
        ]);
    }

    public function order($id, Request $request)
    {
        $uEmail = Auth::user()->email;
//        $showOrder = $this->orderServ->getOrderitem($uEmail);
//        dd($showOrder);

        $db = $this->merchServ->getMerchandise($id)->first();
        $price = $db->price * $request->orderCnt;
        $order =$request->all();
        $this->orderServ->creatOrder($uEmail);
        $orderId = $this->orderServ->getOrderId();
        $this->orderServ->creatOrderItem([
            'order_id'       =>$orderId,
            'merchandise_id' =>$id,
            'user_email'     =>$uEmail,
            'size'           =>$order['orderSize'],
            'buy_count'      =>$order['orderCnt'],
            'total_price'    =>$price,
            'address'        =>$order['orderAdd'],
        ]);

        $showOrder = $this->orderServ->getOrderitem($uEmail);

        return view("include.order",[
            'order'=>$showOrder
        ]);
    }


}
