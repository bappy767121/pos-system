<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\PurchaseInvoiceRequest;
use App\PurInvoice;
use App\PurItem;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class UserPurchaseController extends Controller
{
     public function __construct()
    {
        $this->data['tab_menu'] = 'purchases';
    }

    public function index( $id )
    {
        $this->data['user']     = User::findOrFail($id);

        return view('users.purchases.purchases', $this->data);
    }

    public function createInvoice(PurchaseInvoiceRequest $request, $user_id)
    {
        $data= $request->all();
        $data ['user_id']= $user_id;
        $data ['admin_id']= Auth::id();

        $invoice = PurInvoice::create($data);
        return redirect()->route('user.purchases.invoice_details',['id' => $user_id, 'invoice_id' => $invoice->id]);
    }

    public function invoice($user_id, $invoice_id)
    {
        $this->data['invoice']= PurInvoice::findOrFail($invoice_id);
        $this->data['user']= User::findOrFail($user_id);
        $this->data['products']     = Product::arrayForSelect();

        return view('users.purchases.invoice', $this->data);
    }

    public function addItem(InvoiceProductRequest  $request, $user_id, $invoice_id)
    {
        $data= $request->all();
        $data ['pur_invoice_id']= $invoice_id;

        if(PurItem::create($data))
            {
                Session::flash('message', 'New Product Invoice added Succesfully');
            }
         return redirect()->route( 'user.purchases.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }
    public function destroyItem($user_id, $invoice_id, $item_id)
    {
        if( PurItem::destroy( $item_id ) ) {
            Session::flash('message', 'Item Deleted Successfully');   
        }

        return redirect()->route( 'user.purchases.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }

    public function destroy($user_id, $invoice_id)
    {
        if( SelInvoice::destroy($invoice_id) ) {
            Session::flash('message', 'Invoice Deleted Successfully');
        }

        return redirect()->route( 'user.purchases', ['id' => $user_id] );
    }
}
