<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Order;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class OrdersApi extends Controller
{

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
               return response()->json([
               "status"=>true,
               "data"=>Order::orderBy('id','desc')->paginate(15)
               ]);
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store()
    {
        $rules = [
                         'name'=>'required',
             'email'=>'required',
             'phone'=>'nullable',
             'service_id'=>'required|numeric',
             'file'=>'nullable|sometimes',
             'message'=>'nullable',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'name'=>trans('admin.name'),
             'email'=>trans('admin.email'),
             'phone'=>trans('admin.phone'),
             'service_id'=>trans('admin.service_id'),
             'file'=>trans('admin.file'),
             'message'=>trans('admin.message'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('file')){
              $data['file'] = it()->upload('file','orders');
              }
        $create = Order::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('admin.added'),
            "data"=>$create
        ]);
    }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $show =  Order::find($id);
                 return response()->json([
              "status"=>true,
              "data"=> $show
              ]);  ;
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function update($id)
            {
                $rules = [
             'name'=>'required',
             'email'=>'required',
             'phone'=>'nullable',
             'service_id'=>'required|numeric',
             'file'=>'nullable|sometimes',
             'message'=>'nullable',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'name'=>trans('admin.name'),
             'email'=>trans('admin.email'),
             'phone'=>trans('admin.phone'),
             'service_id'=>trans('admin.service_id'),
             'file'=>trans('admin.file'),
             'message'=>trans('admin.message'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('file')){
              it()->delete(Order::find($id)->file);
              $data['file'] = it()->upload('file','orders');
               }
              Order::where('id',$id)->update($data);

              $Order = Order::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Order
               ]);
            }

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $orders = Order::find($id);

               it()->delete($orders->file);
               it()->delete('order',$id);

               @$orders->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$orders = Order::find($id);

                    	it()->delete($orders->file);
                    	it()->delete('order',$id);
                    	@$orders->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $orders = Order::find($data);
 
                    	it()->delete($orders->file);
                    	it()->delete('order',$data);

                    @$orders->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}