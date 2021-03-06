<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Social;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class SocialsApi extends Controller
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
               "data"=>Social::orderBy('id','desc')->paginate(15)
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
                         'whatsapp'=>'nullable',
             'facebook'=>'url|nullable',
             'youtube'=>'url|nullable',
             'linked'=>'url|nullable',
             'instagram'=>'url|nullable',
             'tel'=>'nullable',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'whatsapp'=>trans('socials.whatsapp'),
             'facebook'=>trans('socials.facebook'),
             'youtube'=>trans('socials.youtube'),
             'linked'=>trans('socials.linked'),
             'instagram'=>trans('socials.instagram'),
             'tel'=>trans('socials.tel'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
        $create = Social::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('socials.added'),
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
                $show =  Social::find($id);
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
             'whatsapp'=>'nullable',
             'facebook'=>'url|nullable',
             'youtube'=>'url|nullable',
             'linked'=>'url|nullable',
             'instagram'=>'url|nullable',
             'tel'=>'nullable',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'whatsapp'=>trans('socials.whatsapp'),
             'facebook'=>trans('socials.facebook'),
             'youtube'=>trans('socials.youtube'),
             'linked'=>trans('socials.linked'),
             'instagram'=>trans('socials.instagram'),
             'tel'=>trans('socials.tel'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
              Social::where('id',$id)->update($data);

              $Social = Social::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('socials.updated'),
               "data"=> $Social
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
               $socials = Social::find($id);


               @$socials->delete();
               return response(["status"=>true,"message"=>trans('socials.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$socials = Social::find($id);

                    	@$socials->delete();
                    }
                    return response(["status"=>true,"message"=>trans('socials.deleted')]);
                }else {
                    $socials = Social::find($data);
 

                    @$socials->delete();
                    return response(["status"=>true,"message"=>trans('socials.deleted')]);
                }
            }

            
}