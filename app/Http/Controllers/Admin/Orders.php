<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\OrdersDataTable;
use App\Model\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Order;
use Illuminate\Support\Facades\Mail;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Orders extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
    public function index(OrdersDataTable $orders)
    {
               return $orders->render('admin.orders.index',['title'=>trans('admin.orders')]);
    }

    public function create() {
        //
    }


//
//    public function show($id)
//    {
//        $orders =  Order::find($id);
//        return view('admin.orders.show',['title'=>trans('admin.show'),'orders'=>$orders]);
//    }


    public function destroy($id)
    {
       $orders = Order::find($id);

       it()->delete($orders->file);
       it()->delete('order',$id);

       @$orders->delete();
       session()->flash('success',trans('admin.deleted'));
       return back();
    }



    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if(is_array($data)){
            foreach($data as $id)
            {
                $orders = Order::find($id);

                it()->delete($orders->file);
                it()->delete('order',$id);
                @$orders->delete();
            }
            session()->flash('success', trans('admin.deleted'));
           return back();
        }else {
            $orders = Order::find($data);

                it()->delete($orders->file);
                it()->delete('order',$data);

            @$orders->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }



    public function getOrder() {

        $services=Service::where('active',1)->get();

        return view('front.order',compact('services'));
    }



    public function postOrder(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'service' => 'required',
//            'file' => 'mimes:jpeg,png,jpg,gif,svg,',

        ]);



        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'service' => $request->service,
            'bodyMessage' => $request->message,
        );

        if(request()->hasFile('file')){
            $data['file'] = it()->upload('file','orders');
        }

        Order::create($data);



        ////////////////////



        // Mail::to(setting()->email)->send(new contactMail($data));

//        Mail::send('front.emails.order', $data, function($message) use ($data){
//            $message->from($data['email']);
//            $message->to(setting()->email);
//
//            $message->attach($data['file'],array(
//                    'as' =>'file.' . $data['file']->getClientOriginalExtension(),
//                    'mime' => $data['file']->getMimeType())
//            );
//
//
//        });


//        Mail::send('front.emails.order', $data, function($message) use ($data){
//
//            $message->from($data['email']);
//            $message->to(setting()->email);
//            $message->attach($data['file'],array(
//                    'as' => 'sample.pdf',
//                    'mime' => 'application/pdf')
//            );
//
//
//        });


        session()->flash('success','Thanks To Contact Us');
        return back();
    }




}