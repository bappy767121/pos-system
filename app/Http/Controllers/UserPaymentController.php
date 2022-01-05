<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class UserPaymentController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu'] = 'payments';
    }

    public function index( $id )
    {
        $this->data['user']     = User::findOrFail($id);

        return view('users.payments.payments', $this->data);
    }
    public function store(PaymentRequest $request, $user_id, $invoice_id=null)
    {
        $data= $request->all();
        $data ['user_id']= $user_id;
        $data ['admin_id']= Auth::id();

        if ($invoice_id)
            {
                $data['pur_invoice_id']=$invoice_id; 
            }

        if(Payment::create($data))
            {
                Session::flash('message', 'New Payment Created Succesfully');
            }

        if($invoice_id)
            {
                return redirect()->route('user.purchases.invoice_details',['id' => $user_id, $invoice_id]);
            }
        return redirect()->route('user.payments',['id'=>$user_id]);
    }
    public function destroy($user_id, $payment_id)
    {
        if( Payment::destroy($payment_id) ) {
            Session::flash('message', 'Payment Deleted Successfully');
        }
        
        return redirect()->route('user.payments',['id'=>$user_id]);
    }
}
