<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReciveRequest;
use App\Recive;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class UserReciveController extends Controller
{
     public function __construct()
    {
        $this->data['tab_menu'] = 'recives';
    }

    public function index( $id )
    {
        $this->data['user']     = User::findOrFail($id);

        return view('users.recives.recives', $this->data);
    }

    public function store(ReciveRequest $request, $user_id, $invoice_id=null)
    {
        $data= $request->all();
        $data ['user_id']= $user_id;
        $data ['admin_id']= Auth::id();

        if ($invoice_id)
            {
                $data['sel_invoice_id']=$invoice_id; 
            }

        if(Recive::create($data))
            {
                Session::flash('message', 'New Receipt Created Succesfully');
            }

        if($invoice_id)
            {
                return redirect()->route('user.sales.invoice_details',['id' => $user_id, $invoice_id]);
            }
        return redirect()->route('user.recives',['id'=>$user_id]);
    }

    public function destroy($user_id, $recive_id)
    {
        if( Recive::destroy($recive_id) ) {
            Session::flash('message', 'Reciept Deleted Successfully');
        }
        
        return redirect()->route('user.recives',['id'=>$user_id]);
    }
}
