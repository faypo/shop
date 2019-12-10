<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Services\ＭerchandiseService;
use App\Models\Merchandise;
use Illuminate\Support\Facades\Response;
use mysql_xdevapi\Exception;

class HomeController extends Controller
{
    private $merchServ;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->merchServ = app(ＭerchandiseService::class);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function merchandise()
    {
        return $this->merchServ;
    }

    public function upload(Request $request)
    {
        $Merchanise = new Merchandise();
        $fileName = $_FILES['merchPic']['name'];
        $tmpname  = $_FILES['merchPic']['tmp_name'];
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
        $this ->merchServ
            ->createMerchandise(
                $data['merchName'] ,$data['merchPrice']
                ,$data['merchIntro'] ,$data['merchType']
                ,base64_encode($file),$type
                );
        return view("home",$data);
    }

    public function getMerchandise($id){

        $merch=$this->merchServ->getMerchandise($id);
        $response = Response::make(base64_decode($merch[0]['picture']), 200);
        $response->header("Content-Type", $merch[0]['pic_type']);
        return $response;

        //        foreach ($merch as $val){
        //            $val['picture']=base64_decode($val['picture']);
        //        };
    }

    public function showMerchandise(){
        $db = $this->merchServ->showMerchandise();
        return view("include.show",[
            'merch'=>$db
        ]);

    }

    public function showOne($id,Request $request){
        $db=$this->merchServ->getMerchandise($id);
//        dd(Auth::user()->email);
        return view('include.showone',[
            'merch'=>$db
        ]);
    }

    public function order(Request $request){
        $orderId = Auth::user()->email;

        dd($orderId);

    }
}
