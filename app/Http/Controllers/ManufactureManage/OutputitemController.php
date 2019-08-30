<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Outputitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutputitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $outputitems = Outputitem::latest('created_at')->paginate(10);
        return view('ManufactureManage.Outputitems.index', compact('outputitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($outputhead_id)
    {
        //
        return view('ManufactureManage.Outputitems.create',compact('outputhead_id'));
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
            'meter'        => 'integer',
        ]);
        $input = $request->all();
//        dd($input);
        Outputitem::create($input);
        return redirect('ManufactureManage/Outputheads/'.$input['outputhead_id'].'/detail');
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
        $outputitem = Outputitem::findOrFail($id);
        $outputhead_id=$outputitem->outputhead_id;
//        dd($processinfo);
        return view('ManufactureManage.Outputitems.edit', compact('outputitem','outputhead_id'));
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
        $outputitem = Outputitem::findOrFail($id);
        $outputitem->update($request->all());
        return redirect('ManufactureManage/Outputheads/'.$request->get('outputhead_id').'/detail');
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
        $outputitem = Outputitem::findOrFail($id);
        $outputhead_id = $outputitem->outputhead_id;
        Outputitem::destroy($id);
        return redirect('ManufactureManage/Outputheads/'.$outputhead_id.'/detail');
    }
}
