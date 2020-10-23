<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SocialsDataTable;
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
class Socials extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
               return view('admin.socials',['title'=>trans('admin.socials')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               //return view('admin.socials.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store(Request $request) {


        $rules = [


            'whatsapp'=>'nullable',

            'facebook'=>'url|nullable',
            'twitter'=>'url|nullable',
            'linked'=>'url|nullable',
            'instagram'=>'url|nullable',


        ];
        $data = $this->validate(request(),$rules,[],[
            'whatsapp'=>trans('admin.whatsapp'),
            'facebook'=>trans('admin.facebook'),
            'twitter'=>trans('admin.twitter'),
            'linked'=>trans('admin.linked'),
            'instagram'=>trans('admin.instagram'),

        ]);

        try{

        \App\Model\Social::orderBy('id', 'desc')->update($data);
        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('socials'));

        } catch (\Exception $ex) {

        session()->flash('error',trans('admin.error'));
        return redirect(aurl('socials'));
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

            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {

            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */





            
}