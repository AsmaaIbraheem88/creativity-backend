<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Portfolio;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class PortfoliosApi extends Controller
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
               "data"=>Portfolio::orderBy('id','desc')->paginate(15)
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
             'client'=>'nullable|sometimes',
             'image'=>'required|'.it()->image().'',
             'service_id'=>'required|numeric',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'name'=>trans('portfolio.name'),
             'client'=>trans('portfolio.client'),
             'image'=>trans('portfolio.image'),
             'service_id'=>trans('portfolio.service_id'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('image')){
              $data['image'] = it()->upload('image','portfolios');
              }
        $create = Portfolio::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('portfolio.added'),
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
                $show =  Portfolio::find($id);
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
             'client'=>'nullable|sometimes',
             'image'=>'required|'.it()->image().'',
             'service_id'=>'required|numeric',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'name'=>trans('portfolio.name'),
             'client'=>trans('portfolio.client'),
             'image'=>trans('portfolio.image'),
             'service_id'=>trans('portfolio.service_id'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('image')){
              it()->delete(Portfolio::find($id)->image);
              $data['image'] = it()->upload('image','portfolios');
               }
              Portfolio::where('id',$id)->update($data);

              $Portfolio = Portfolio::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('portfolio.updated'),
               "data"=> $Portfolio
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
               $portfolios = Portfolio::find($id);

               it()->delete($portfolios->image);
               it()->delete('portfolio',$id);

               @$portfolios->delete();
               return response(["status"=>true,"message"=>trans('portfolio.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$portfolios = Portfolio::find($id);

                    	it()->delete($portfolios->image);
                    	it()->delete('portfolio',$id);
                    	@$portfolios->delete();
                    }
                    return response(["status"=>true,"message"=>trans('portfolio.deleted')]);
                }else {
                    $portfolios = Portfolio::find($data);
 
                    	it()->delete($portfolios->image);
                    	it()->delete('portfolio',$data);

                    @$portfolios->delete();
                    return response(["status"=>true,"message"=>trans('portfolio.deleted')]);
                }
            }

            
}