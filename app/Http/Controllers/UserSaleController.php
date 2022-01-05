<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\SaleInvoiceRequest;
use App\Product;
use App\SelInvoice;
use App\User;
use App\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class UserSaleController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu'] = 'sales';
    }

    public function index( $id )
    {
        $this->data['user']     = User::findOrFail($id);

        return view('users.sales.sales', $this->data);
    }
    public function createInvoice(SaleInvoiceRequest $request, $user_id)
    {
        $data= $request->all();
        $data ['user_id']= $user_id;
        $data ['admin_id']= Auth::id();

        $invoice = SelInvoice::create($data);
        return redirect()->route('user.sales.invoice_details',['id' => $user_id, 'invoice_id' => $invoice->id]);
    }
    public function invoice($user_id, $invoice_id)
    {
        $this->data['invoice']= SelInvoice::findOrFail($invoice_id);
        $this->data['user']= User::findOrFail($user_id);
        $this->data['products']     = Product::arrayForSelect();

        return view('users.sales.invoice', $this->data);
    }

     public function addItem(InvoiceProductRequest  $request, $user_id, $invoice_id)
    {
        $data= $request->all();
        $data ['sel_invoice_id']= $invoice_id;

        if(SaleItem::create($data))
            {
                Session::flash('message', 'New Product Invoice added Succesfully');
            }
         return redirect()->route( 'user.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }
    public function destroyItem($user_id, $invoice_id, $item_id)
    {
        if( SaleItem::destroy( $item_id ) ) {
            Session::flash('message', 'Item Deleted Successfully');   
        }

        return redirect()->route( 'user.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }

    public function destroy($user_id, $invoice_id)
    {
        if( SelInvoice::destroy($invoice_id) ) {
            Session::flash('message', 'Invoice Deleted Successfully');
        }

        return redirect()->route( 'user.sales', ['id' => $user_id] );
    }
}
