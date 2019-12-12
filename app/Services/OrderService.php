<?php


namespace App\Services;
use App\Repositories\OrderItemRepositoryEloquent as OrderItemRepository;
use App\Repositories\OrderRepositoryEloquent as OrderRepository;
use mysql_xdevapi\Exception;

class OrderService
{
    private $orderRepo;
    private $orderItemReo;
    public function __construct(OrderRepository $orderRepo,OrderItemRepository $orderItemReo)
    {
        $this->orderRepo = $orderRepo;
        $this->orderItemReo = $orderItemReo;
    }

    public function creatOrder($uEmail){
        $this->orderRepo->create([
            'user_email' => $uEmail
        ]);
    }

    public function creatOrderItem($orderId, $merchId, $merchCount, $tPrice, $address){
        $this->orderItemReo->create([
            'order_id'       =>$orderId,
            'merchandise_id' =>$merchId,
            'buy_count'      =>$merchCount,
            'total_price'    =>$tPrice,
            'address'        =>$address,

        ]);
    }

    public function getOrderId(){
        try{
            return $this->orderRepo->orderBy('id','desc')->first()->id;

        }
        catch (Exception $e){
            return response('',404);
        }

    }

    public function getOrderitem(){
        return $this->orderItemReo->get([
            'order_id',
            'merchandise_id',
            'total_price',
            'address',
            'created_at',
        ]);
    }

}
