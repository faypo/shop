<?php


namespace App\Services;
use App\Repositories\MerchandiseRepositoryEloquent as MerchandiseRepository;
use mysql_xdevapi\Exception;

class ＭerchandiseService
{
    private $merchRepo;

    /**
     * @return mixed
     */
    public function __construct(MerchandiseRepository $merchRepo)
    {
        $this->merchRepo = $merchRepo;

    }

    /*
     * 功能
     */
    public function createMerchandise($merchName,$merchPrice,$merchinto,$merchType,$merchPic,$type)
    {
        $this->merchRepo
            ->create([
                'name'         => $merchName,
                'price'        => $merchPrice,
                'introduction' => $merchinto,
                'type'         => $merchType,
                'picture'      => $merchPic,
                'pic_type'     => $type,
            ]);
    }

    public function getMerchandise($id){
        try{
            return $this->merchRepo->findWhere([
                'id'=>$id,

            ]);
        }
        catch (Exception $e){
            return response('',404);
        }

//        return $this->merchRepo->get($col);
    }

    public function showMerchandise(){
        return $this->merchRepo->get([
                    'id'           ,
                    'name'         ,
                    'price'        ,
                    'introduction' ,
                ]);
    }

    public function createOrder(){

    }

}
