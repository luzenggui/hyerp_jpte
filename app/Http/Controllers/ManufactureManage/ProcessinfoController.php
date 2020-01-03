<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\Manufacturemanage\Processinfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $inputs=$request->all();
        $processinfos = Processinfo::latest('created_at')->paginate(10);
        return view('ManufactureManage.Processinfos.index', compact('processinfos','inputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ManufactureManage.Processinfos.create');
    }

    public function messages()
    {
        return [
            'insheetno.unique' => 'Fabric must be unique',
            'insheetno.required'  => 'Fabric is required',
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'insheetno'        => 'required|unique:processinfos',
            'density'                   => 'required|integer',
            'width'                => 'required|numeric',
            'syarntype'      => 'required|',
            'pattern'        => 'required',
            'contractno'        => 'required',
            'diliverydate'        => 'required',
            'specification'        => 'required',
            'orderquantity'        => 'required|integer',
            'yarn100m'        => 'required|numeric',
        ],array('insheetno.unique' => 'Fabric must be unique',
            'insheetno.required'  => 'Fabric is required',));

        $input = $request->all();
//        dd($input);
        Processinfo::create($input);
        return redirect('ManufactureManage/Processinfos');
    }

    public function search(Request $request)
    {
        //
        $query = Processinfo::orderBy('id', 'desc');
        $key = $request->input('key');
        $inputs=$request->all();
        if (strlen($key) > 0)
        {
            $query->where('insheetno', 'like', '%'.$key.'%')
                ->orWhere('contractno', 'like', '%'.$key.'%')
                ->orWhere('pattern', 'like', '%'.$key.'%');
        }
        $processinfos = $query->paginate(10);
        return view('ManufactureManage.Processinfos.index', compact('processinfos', 'inputs'));
    }

    public function copy($id)
    {
        //
        $processinfo = Processinfo::findOrFail($id);
//        dd($processinfo);
        return view('ManufactureManage.Processinfos.create', compact('processinfo'));
    }



    /**
     * Display a listing of the resource by searching processinfo key.
     *
     * @return Response
     */
    public function getitemsbyprocesskey($key)
    {
        //
        $processinfos = Processinfo::where(function ($query) use ($key) {
                $query->where('insheetno', 'like', '%'.$key.'%')
                    ->orWhere('contractno', 'like', '%'.$key.'%')
                    ->orWhere('pattern', 'like', '%'.$key.'%');
            })
            ->paginate(20);
        return $processinfos;
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
        //
        $processinfo = Processinfo::findOrFail($id);
//        dd($processinfo);
        return view('ManufactureManage.Processinfos.edit', compact('processinfo'));
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
        //
        $processinfo = Processinfo::findOrFail($id);
        $processinfo->update($request->all());
        return redirect('ManufactureManage/Processinfos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Processinfo::destroy($id);
        return redirect('ManufactureManage/Processinfos');
    }
}
