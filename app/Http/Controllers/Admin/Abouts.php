<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AboutsDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\About;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Abouts extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
    public function index() {
        return view('admin.about', ['title' => trans('admin.about')]);
    }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {

            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function store(){



                  $rules = [
                 'about_us_ar'=>'required',
                 'about_us_en'=>'required',
                  'features_ar'=>'required',
                  'features_en'=>'required',
                 'image'=>'sometimes|nullable|'.it()->image(),

                       ];
                  $data = $this->validate(request(),$rules,[],[


                  'about_us_ar'=>trans('admin.about_us_ar'),
                  'about_us_en'=>trans('admin.about_us_en'),
                 'features_ar'=>trans('admin.features_ar'),
                 'features_en'=>trans('admin.features_en'),
                 'image'=>trans('admin.image'),

                  ]);

                try{


                   if(request()->hasFile('image')){
                  $data['image'] = it()->upload('image','abouts');
                  }


                   About::orderBy('id', 'desc')->update($data);

                  session()->flash('success',trans('admin.added'));
                  return redirect(aurl('abouts'));



            } catch (\Exception $ex) {

                session()->flash('error',trans('admin.error'));
                return redirect(aurl('abouts'));
            }
     }









            
}