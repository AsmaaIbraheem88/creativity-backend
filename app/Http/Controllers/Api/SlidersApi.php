<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Slider;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class SlidersApi extends Controller
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
               "data"=>Slider::orderBy('id','desc')->paginate(15)
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
                         'heading_ar'=>'sometimes',
             'heading_en'=>'sometimes',
             'description_ar'=>'sometimes',
             'description_en'=>'sometimes',
             'image'=>'required|'.it()->image().'',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'heading_ar'=>trans('slider.heading_ar'),
             'heading_en'=>trans('slider.heading_en'),
             'description_ar'=>trans('slider.description_ar'),
             'description_en'=>trans('slider.description_en'),
             'image'=>trans('slider.image'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('image')){
              $data['image'] = it()->upload('image','sliders');
              }
        $create = Slider::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('slider.added'),
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
                $show =  Slider::find($id);
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
             'heading_ar'=>'sometimes',
             'heading_en'=>'sometimes',
             'description_ar'=>'sometimes',
             'description_en'=>'sometimes',
             'image'=>'required|'.it()->image().'',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'heading_ar'=>trans('slider.heading_ar'),
             'heading_en'=>trans('slider.heading_en'),
             'description_ar'=>trans('slider.description_ar'),
             'description_en'=>trans('slider.description_en'),
             'image'=>trans('slider.image'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('image')){
              it()->delete(Slider::find($id)->image);
              $data['image'] = it()->upload('image','sliders');
               }
              Slider::where('id',$id)->update($data);

              $Slider = Slider::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('slider.updated'),
               "data"=> $Slider
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
               $sliders = Slider::find($id);

               it()->delete($sliders->image);
               it()->delete('slider',$id);

               @$sliders->delete();
               return response(["status"=>true,"message"=>trans('slider.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$sliders = Slider::find($id);

                    	it()->delete($sliders->image);
                    	it()->delete('slider',$id);
                    	@$sliders->delete();
                    }
                    return response(["status"=>true,"message"=>trans('slider.deleted')]);
                }else {
                    $sliders = Slider::find($data);
 
                    	it()->delete($sliders->image);
                    	it()->delete('slider',$data);

                    @$sliders->delete();
                    return response(["status"=>true,"message"=>trans('slider.deleted')]);
                }
            }

            
}