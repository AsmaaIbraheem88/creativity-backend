<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;

class Settings extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.settings', ['title' => trans('admin.settings')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {


		$rules = [
			'sitename_ar'    => 'required',
			'sitename_en'    => 'required',
            'tel'          => 'required',
            'address_ar'          => 'required',
            'address_en'          => 'required',
			'email'          => 'required',
			'logo'           => 'sometimes|nullable|'.it()->image(),
			'icon'           => 'sometimes|nullable|'.it()->image(),
			'system_status'  => 'required',
            'footer_message_ar' => 'required',
            'footer_message_en' => 'required',
            'keywords'  => 'required',
            'description'  => 'required',
		];
		$data = $this->validate(request(), $rules, [], [
				'sitename_ar'    => trans('admin.sitename_ar'),
				'sitename_en'    => trans('admin.sitename_en'),
                'tel'            => trans('admin.tel'),
                'address_ar'     => trans('admin.address_ar'),
                'address_en'     => trans('admin.address_en'),
				'email'          => trans('admin.email'),
				'logo'           => trans('admin.logo'),
				'icon'           => trans('admin.icon'),
				'system_status'  => trans('admin.system_status'),
				'footer_message_en' => trans('admin.footer_message_en'),
                 'footer_message_ar' => trans('admin.footer_message_ar'),
                'keywords' => trans('admin.keywords'),
                'description' => trans('admin.description'),
			]);

        try{
		if (request()->hasFile('logo')) {
			$data['logo'] = it()->upload('logo', 'setting');
		}
		if (request()->hasFile('icon')) {
			$data['icon'] = it()->upload('icon', 'setting');
		}
		Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated'));
		return redirect(aurl('settings'));

        } catch (\Exception $ex) {

            session()->flash('error',trans('admin.error'));
            return redirect(aurl('settings'));
        }


    }

}
