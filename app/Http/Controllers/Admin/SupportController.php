<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Service\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    //

    public function __construct(
        protected SupportService $service
    )
    {}

    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);
        return view('admin/supports/index', compact('supports'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }
    
    public function store(StoreUpdateSupport $request, Support $support)
    {
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );
    
        return redirect()->route('supports.index');
    }

    public function detail(string $id)
    {        
        if (!$support = $this->service->findOne($id))
        {
            return back();
        }

        return view('admin/supports/detail', compact('support'));
    }

    public function showUpdate(string $id)
    {
        if (!$support = $this->service->findOne($id))
        {
            return back();
        }

        return view('admin/supports/update', compact('support'));
    }

    public function update(string|int $id,  StoreUpdateSupport $request)
    {  
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if (!$support)
        {
            return back();
        }
            
        return redirect()->route('supports.index');
    }

    public function delete(string $id, Support $support)
    {
        $this->service->delete($id);
        return redirect()->route('supports.index');
    }
}
