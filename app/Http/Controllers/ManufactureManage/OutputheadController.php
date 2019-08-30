<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Outputhead;
use App\Models\ManufactureManage\Outputitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutputheadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $outputheads = Outputhead::latest('created_at')->paginate(10);
        return view('ManufactureManage.Outputheads.index', compact('outputheads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ManufactureManage.Outputheads.create');
    }

    public function detail($id)
    {
        $outputitems = Outputitem::latest('created_at')->where('outputhead_id', $id)->paginate(10);
        return view('ManufactureManage.Outputitems.index', compact('outputitems', 'id'));
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

        $input = $request->all();
//        dd($input);
        Outputhead::create($input);
        return redirect('ManufactureManage/Outputheads');
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
        $outputhead = Outputhead::findOrFail($id);
//        dd($processinfo);
        return view('ManufactureManage.Outputheads.edit', compact('outputhead'));
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
        $outputhead = Outputhead::findOrFail($id);
        $outputhead->update($request->all());
        return redirect('ManufactureManage/Outputheads');
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
        $cntoutputitem=Outputitem::where('outputhead_id','=','$id')
                                   ->count('*');
        if($cntoutputitem>1)
            dd('There is production detail data at this sheet!, Cannot delete!');
        else
            Outputhead::destroy($id);
        return redirect('ManufactureManage/Outputheads');
    }
}
