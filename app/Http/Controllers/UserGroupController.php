<?php

namespace App\Http\Controllers;
use App\Group;

use Illuminate\Http\Request;
use Session;

class UserGroupController extends Controller
{
    public function index()
    {
        $this->data['groups']= Group::all();
        return view('groups.groups', $this->data);
    }
    public function create()
    {
        
        return view('groups.create');
    }
    public function store(Request $request)
    {
        $fromData = $request->all();
        if(Group::create($fromData))
            {
                Session::flash('message', 'Group Created Succesfully');
            }
        return redirect()->to('groups');
    }
    public function destroy($id)
    {
        if(Group::find($id)->delete())
            {
                Session::flash('message', 'Group Deleted Succesfully');
            }
        return redirect()->to('groups');
    }
}
