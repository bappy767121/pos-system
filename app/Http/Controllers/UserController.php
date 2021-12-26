<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatUserRequest;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::all();
        return view('users.users', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups']=Group::arrayForSelect();
        $this->data['mode']         = 'create';
        $this->data['headline']     = 'Add New User';
        return view('users.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatUserRequest $request)
    {
        $data= $request->all();

        if(User::create($data))
            {
                Session::flash('message', 'New User Created Succesfully');
            }
        return redirect()->to('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $this->data['user']         = User::findOrFail($id);
        $this->data['groups']       = Group::arrayForSelect();
        $this->data['mode']         = 'edit';
        $this->data['headline']     = 'Update Information';

        return view('users.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data               = $request->all();

        $user               = User::find($id);
        $user->group_id     = $data['group_id'];
        $user->name         = $data['name'];
        $user->email        = $data['email'];
        $user->phone        = $data['phone'];
        $user->address      = $data['address'];

        if( $user->save() ) {
            Session::flash('message', 'User Updated Successfully');
        }
        
        return redirect()->to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( User::find($id)->delete() ) {
            Session::flash('message', 'User Deleted Successfully');
        }
        
        return redirect()->to('users');
    }
}
