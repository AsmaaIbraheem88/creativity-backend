<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Service;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ServicesApi extends Controller
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
               "data"=>Service::orderBy('id','desc')->paginate(15)
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
                         'name_ar'=>'required',
             'name_en'=>'required',
             'description_ar'=>'required',
             'description_en'=>'',
             'image'=>'required|'.it()->image().'',
             'active'=>'required',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'name_ar'=>trans('services.name_ar'),
             'name_en'=>trans('services.name_en'),
             'description_ar'=>trans('services.description_ar'),
             'description_en'=>trans('services.description_en'),
             'image'=>trans('services.image'),
             'active'=>trans('services.active'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('image')){
              $data['image'] = it()->upload('image','services');
              }
        $create = Service::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('services.added'),
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
                $show =  Service::find($id);
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
             'name_ar'=>'required',
             'name_en'=>'required',
             'description_ar'=>'required',
             'description_en'=>'',
             'image'=>'required|'.it()->image().'',
             'active'=>'required',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'name_ar'=>trans('services.name_ar'),
             'name_en'=>trans('services.name_en'),
             'description_ar'=>trans('services.description_ar'),
             'description_en'=>trans('services.description_en'),
             'image'=>trans('services.image'),
             'active'=>trans('services.active'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('image')){
              it()->delete(Service::find($id)->image);
              $data['image'] = it()->upload('image','services');
               }
              Service::where('id',$id)->update($data);

              $Service = Service::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('services.updated'),
               "data"=> $Service
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
               $services = Service::find($id);

               it()->delete($services->image);
               it()->delete('service',$id);

               @$services->delete();
               return response(["status"=>true,"message"=>trans('services.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$services = Service::find($id);

                    	it()->delete($services->image);
                    	it()->delete('service',$id);
                    	@$services->delete();
                    }
                    return response(["status"=>true,"message"=>trans('services.deleted')]);
                }else {
                    $services = Service::find($data);
 
                    	it()->delete($services->image);
                    	it()->delete('service',$data);

                    @$services->delete();
                    return response(["status"=>true,"message"=>trans('services.deleted')]);
                }
            }

            
}