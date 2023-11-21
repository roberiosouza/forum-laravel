<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    //
    public function index(Support $support)
    {
        $supports = Support::all();
        return view('admin/supports/index', compact('supports'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }
    
    public function store(Request $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support->create($data);
        return redirect()->route('supports.index');
    }

    public function detail(string|int $id)
    {        
        if (!$support = Support::find($id))
        {
            return back();
        }

        return view('admin/supports/detail', compact('support'));
    }

    public function showUpdate(string|int $id)
    {
        if (!$support = Support::find($id))
        {
            return back();
        }

        return view('admin/supports/update', compact('support'));
    }

    public function update(string|int $id, Support $support, Request $request)
    {  
        if (!$support = Support::find($id))
        {
            return back();
        }
            
        $support::find($id);
        $support->update($request->only([
            'subject', 'body'
        ]));

        return redirect()->route('supports.index');
    }

    public function delete(string|int $id, Support $support)
    {
        if (!$support = Support::find($id))
        {
            return back();
        }
        $support->delete();
        return redirect()->route('supports.index');
    }
}
