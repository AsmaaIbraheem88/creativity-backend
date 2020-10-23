<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Client;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ClientsApi extends Controller
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
               "data"=>Client::orderBy('id','desc')->paginate(15)
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
                         'name'=>'sometimes',
             'logo'=>'required|'.it()->image().'',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'name'=>trans('client.name'),
             'logo'=>trans('client.logo'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('logo')){
              $data['logo'] = it()->upload('logo','clients');
              }
        $create = Client::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('client.added'),
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
                $show =  Client::find($id);
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
             'name'=>'sometimes',
             'logo'=>'required|'.it()->image().'',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'name'=>trans('client.name'),
             'logo'=>trans('client.logo'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('logo')){
              it()->delete(Client::find($id)->logo);
              $data['logo'] = it()->upload('logo','clients');
               }
              Client::where('id',$id)->update($data);

              $Client = Client::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('client.updated'),
               "data"=> $Client
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
               $clients = Client::find($id);

               it()->delete($clients->logo);
               it()->delete('client',$id);

               @$clients->delete();
               return response(["status"=>true,"message"=>trans('client.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$clients = Client::find($id);

                    	it()->delete($clients->logo);
                    	it()->delete('client',$id);
                    	@$clients->delete();
                    }
                    return response(["status"=>true,"message"=>trans('client.deleted')]);
                }else {
                    $clients = Client::find($data);
 
                    	it()->delete($clients->logo);
                    	it()->delete('client',$data);

                    @$clients->delete();
                    return response(["status"=>true,"message"=>trans('client.deleted')]);
                }
            }

            
}