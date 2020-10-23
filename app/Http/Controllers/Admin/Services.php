<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ServicesDataTable;
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
class Services extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ServicesDataTable $services)
            {
               return $services->render('admin.services.index',['title'=>trans('admin.services')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.services.create',['title'=>trans('admin.create')]);
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
             'name_ar'=>'required',
             'name_en'=>'required',
             'description_ar'=>'required',
             'description_en'=>'',
             'image'=>'required|'.it()->image().'',
             'active'=>'required',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name_ar'=>trans('admin.name_ar'),
             'name_en'=>trans('admin.name_en'),
             'description_ar'=>trans('admin.description_ar'),
             'description_en'=>trans('admin.description_en'),
             'image'=>trans('admin.image'),
             'active'=>trans('admin.active'),

              ]);


            try{
		
               if(request()->hasFile('image')){
              $data['image'] = it()->upload('image','services');
              }
              Service::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('services'));

            } catch (\Exception $ex) {

                session()->flash('error',trans('admin.error'));
                return redirect(aurl('services'));
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
                $services =  Service::find($id);
                return view('admin.services.show',['title'=>trans('admin.show'),'services'=>$services]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $services =  Service::find($id);
                return view('admin.services.edit',['title'=>trans('admin.edit'),'services'=>$services]);
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
             'name_ar'=>'required',
             'name_en'=>'required',
             'description_ar'=>'required',
             'description_en'=>'',
             'image'=>'sometimes|nullable|'.it()->image().'',
             'active'=>'required',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name_ar'=>trans('admin.name_ar'),
             'name_en'=>trans('admin.name_en'),
             'description_ar'=>trans('admin.description_ar'),
             'description_en'=>trans('admin.description_en'),
             'image'=>trans('admin.image'),
             'active'=>trans('admin.active'),
                   ]);

            try{
               if(request()->hasFile('image')){
              it()->delete(Service::find($id)->image);
              $data['image'] = it()->upload('image','services');
               }
              Service::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('services'));

            } catch (\Exception $ex) {

            session()->flash('error',trans('admin.error'));
            return redirect(aurl('services'));
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
               $services = Service::find($id);

                $portCount = $services->portfolios()->count();
                $childCount = $services->childServices()->count();
                if ($portCount || $childCount)
                {
                    session()->flash('error', 'You Can Not Delete this ,it has portfolios OR childServices');
                    return back();

                }



               it()->delete($services->image);
               it()->delete('service',$id);

               @$services->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$services = Service::find($id);

                        $portCount = $services->portfolios()->count();
                        $childCount = $services->childServices()->count();
                        if ($portCount || $childCount)
                        {
                            session()->flash('error', 'You Can Not Delete this ,it has portfolios OR childServices');
                            return back();

                        }

                    	it()->delete($services->image);
                    	it()->delete('service',$id);
                    	@$services->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $services = Service::find($data);
                    $portCount = $services->portfolios()->count();
                    $childCount = $services->childServices()->count();
                    if ($portCount || $childCount)
                    {
                        session()->flash('error', 'You Can Not Delete this ,it has portfolios OR childServices');
                        return back();

                    }

                    	it()->delete($services->image);
                    	it()->delete('service',$data);

                    @$services->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}