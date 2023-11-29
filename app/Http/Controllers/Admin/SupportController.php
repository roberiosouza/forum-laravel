<?php

namespace App\Http\Controllers\Admin;

use App\DTO\{CreateSupportDTO, UpdateSupportDTO};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
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
        $supports = $this->service->paginate(
                            page: $request->get('page', 1),
                            totalPerPage: $request->get('per_page', 15),
                            filter: $request->filter
                        );
        return view('admin/supports/index', compact('supports'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }
    
    public function store(StoreUpdateSupport $request)
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

    public function update(StoreUpdateSupport $request, string $id)
    {  
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request, $id)
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
