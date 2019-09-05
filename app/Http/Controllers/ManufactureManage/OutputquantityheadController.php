<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Outputquantityhead;
use App\Models\ManufactureManage\Outputquantityitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutputquantityheadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $outputquantityheads = Outputquantityhead::latest('created_at')->paginate(10);
        return view('ManufactureManage.Outputquantityhead.index', compact('outputquantityheads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ManufactureManage.Outputquantityhead.create');
    }


    public function detail($id)
    {
        $outputquantityitems = Outputquantityitem::latest('created_at')->where('outputquantityhead_id', $id)->paginate(10);
        return view('ManufactureManage.Outputquantityitem.index', compact('outputquantityitems', 'id'));
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
        Outputquantityhead::create($input);
        return redirect('ManufactureManage/Outputquantityhead');
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
        $outputquantityhead = Outputquantityhead::findOrFail($id);
//        dd($processinfo);
        return view('ManufactureManage.Outputquantityhead.edit', compact('outputquantityhead'));
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
        $outputquantityhead = Outputquantityhead::findOrFail($id);
        $outputquantityhead->update($request->all());
        return redirect('ManufactureManage/Outputquantityhead');
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
        $cntoutputquantityitem=Outputquantityitem::where('outputquantityhead_id','=','$id')
            ->count('*');
        if($cntoutputquantityitem>1)
            dd('There is production detail data at this sheet!, Cannot delete!');
        else
            Outputquantityhead::destroy($id);
        return redirect('ManufactureManage/Outputquantityhead');
    }
}
