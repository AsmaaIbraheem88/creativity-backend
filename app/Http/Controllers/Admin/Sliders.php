<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SlidersDataTable;
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
class Sliders extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SlidersDataTable $sliders)
            {
               return $sliders->render('admin.sliders.index',['title'=>trans('admin.sliders')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.sliders.create',['title'=>trans('admin.create')]);
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


              'heading_ar'=>'nullable',
              'heading_en'=>'nullable',
              'description_ar'=>'nullable',
              'description_en'=>'nullable',
              'image'=>'required|'.it()->image(),

               ];
              $data = $this->validate(request(),$rules,[],[
             'heading_ar'=>trans('admin.heading_ar'),
             'heading_en'=>trans('admin.heading_en'),
             'description_ar'=>trans('admin.description_ar'),
             'description_en'=>trans('admin.description_en'),
             'image'=>trans('admin.image'),

              ]);

            try{
		
               if(request()->hasFile('image')){
              $data['image'] = it()->upload('image','sliders');
              }
              Slider::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('sliders'));

            } catch (\Exception $ex) {

                session()->flash('error',trans('admin.error'));
                return redirect(aurl('sliders'));
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
                $sliders =  Slider::find($id);
                return view('admin.sliders.show',['title'=>trans('admin.show'),'sliders'=>$sliders]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $sliders =  Slider::find($id);
                return view('admin.sliders.edit',['title'=>trans('admin.edit'),'sliders'=>$sliders]);
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

                'heading_ar'=>'',
                'heading_en'=>'',
                'description_ar'=>'',
                'description_en'=>'',
                'image'=>'sometimes|nullable|'.it()->image(),

             ];
             $data = $this->validate(request(),$rules,[],[
             'heading_ar'=>trans('admin.heading_ar'),
             'heading_en'=>trans('admin.heading_en'),
             'description_ar'=>trans('admin.description_ar'),
             'description_en'=>trans('admin.description_en'),
             'image'=>trans('admin.image'),
                   ]);


//             dd($data);
            try{
               if(request()->hasFile('image')){
              it()->delete(Slider::find($id)->image);
              $data['image'] = it()->upload('image','sliders');
               }
              Slider::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('sliders'));

            } catch (\Exception $ex) {

            session()->flash('error',trans('admin.error'));
            return redirect(aurl('sliders'));
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
               $sliders = Slider::find($id);

               it()->delete($sliders->image);
               it()->delete('slider',$id);

               @$sliders->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
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
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $sliders = Slider::find($data);
 
                    	it()->delete($sliders->image);
                    	it()->delete('slider',$data);

                    @$sliders->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}