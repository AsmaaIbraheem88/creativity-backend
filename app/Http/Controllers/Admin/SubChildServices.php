<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SubChildServicesDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\SubChildService;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class SubChildServices extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SubChildServicesDataTable $subchildservices)
            {
               return $subchildservices->render('admin.subchildservices.index',['title'=>trans('admin.subchildservices')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.subchildservices.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function store()
            {


              $rules = [
             'name_en'=>'required',
             'name_ar'=>'required',
             'child_service_id'=>'required|numeric',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name_en'=>trans('admin.name_en'),
             'name_ar'=>trans('admin.name_ar'),
             'child_service_id'=>trans('admin.child_service_id'),

              ]);


            try{
		
              SubChildService::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('subchildservices'));

            } catch (\Exception $ex) {

                session()->flash('error',trans('admin.error'));
                return redirect(aurl('subchildservices'));
            }
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $subchildservices =  SubChildService::find($id);
                return view('admin.subchildservices.show',['title'=>trans('admin.show'),'subchildservices'=>$subchildservices]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $subchildservices =  SubChildService::find($id);
                return view('admin.subchildservices.edit',['title'=>trans('admin.edit'),'subchildservices'=>$subchildservices]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function update($id)
            {


                $rules = [
             'name_en'=>'required',
             'name_ar'=>'required',
             'child_service_id'=>'required|numeric',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name_en'=>trans('admin.name_en'),
             'name_ar'=>trans('admin.name_ar'),
             'child_service_id'=>trans('admin.child_service_id'),
                   ]);


            try{

              SubChildService::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('subchildservices'));

            } catch (\Exception $ex) {

                session()->flash('error',trans('admin.error'));
                return redirect(aurl('subchildservices'));
            }
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $subchildservices = SubChildService::find($id);


               @$subchildservices->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$subchildservices = SubChildService::find($id);

                    	@$subchildservices->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $subchildservices = SubChildService::find($data);
 

                    @$subchildservices->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}