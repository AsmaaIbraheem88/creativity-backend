<?php
\Config::set('filesystems.disks.public.url', url('storage'));
//return dd(config('filesystems.disks.public.url'));
////// direction Function /////////////////////
app()->singleton('direction', function () {
		if (app('l') == 'ar') {
			return '-rtl';
		}
	});
////// direction Function /////////////////////

//////  upload Function /////////////////////
if (!function_exists('it')) {
	function it() {
		return new \App\Http\Controllers\FileUploader;
	}
}
//////  upload Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('aurl')) {
	function aurl($link) {
		if (substr($link, 0, 1) == '/') {
			return url(app('admin').$link);
		} else {
			return url(app('admin').'/'.$link);
		}
	}
}
////// Admin Url Function /////////////////////
////// Get Settings Function /////////////////////
if (!function_exists('setting')) {
	function setting() {
		$setting = \App\Model\Setting::orderBy('id', 'desc')->first();
		if (empty($setting)) {
			return \App\Model\Setting::create(['sitename_ar' => '', 'sitename_en' => '','tel'=>'','address_ar'=>'','address_en'=>'','email'=>'',
                'system_status'=>'open','footer_message_ar'=>'','footer_message_en'=>'','logo'=>'','icon'=>'','keywords'=>'','description'=>'']);
		} else {
			return $setting;
		}
	}
}
////// Get Settings Function /////////////////////
////// Get about Function /////////////////////
if (!function_exists('about')) {
    function about() {
        $about = \App\Model\About::orderBy('id', 'desc')->first();
        if (empty($about)) {
            return \App\Model\About::create(['about_us_ar' => '', 'about_us_en' => '', 'features_ar' => '','features_en'=>'','image'=>'']);
        } else {
            return $about;
        }
    }
}
////// Get about Function /////////////////////
////// Get social Function /////////////////////
if (!function_exists('social')) {
    function social() {
        $social = \App\Model\Social::orderBy('id', 'desc')->first();
        if (empty($social)) {
            return \App\Model\Social::create(['whatsapp' => '', 'facebook' => '', 'twitter' => '','linked'=>'','instagram'=>'']);
        } else {
            return $social;
        }
    }
}
////// Get social Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('admin')) {
	function admin() {
		return auth()->guard('admin');
	}
}
////// Admin Url Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('active_link')) {
	function active_link($segment, $class = null) {
		if ($segment == null and request()->segment(2) == null) {
			return $class;
		} elseif (preg_match('/'.$segment.'/i', request()->segment(2))) {
			if ($class != null || $class != 'block') {
				if ($segment != null) {
					return $class;
				}
			} else {
				if ($class == 'block') {
					return 'display:block';
				} else {
					return 'display:none';
				}
			}
		}
	}
}
////// Admin Url Function /////////////////////
