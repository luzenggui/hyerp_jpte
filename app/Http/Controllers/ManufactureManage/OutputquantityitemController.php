<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Outputquantityitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutputquantityitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $outputquantityitems = Outputquantityitem::latest('created_at')->paginate(10);
        return view('ManufactureManage.Outputquantityitem.index', compact('outputquantityitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($outputquantityhead_id)
    {
        //
        return view('ManufactureManage.Outputquantityitem.create',compact('outputquantityhead_id'));
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
            'note'  =>'required',
            'manufactureshifts'  =>'required',
            'length'        => 'integer',
            'totalpoints'        => 'integer',
        ]);
        $input = $request->all();
//        dd($input);
        Outputquantityitem::create($input);
        return redirect('ManufactureManage/Outputquantityhead/'.$input['outputquantityhead_id'].'/detail');
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

    public function refresh($id)
    {
        //
//        $quantityreporthead = Quantityreporthead::findOrFail($id);
        $outputquantityitems = Outputquantityitem::where('quantityreporthead_id','=',$id)->get();
        $v_note='';
        $v_length=0;
        $v_totalpoints=0;
        $v_y100points=0.0;
//        dd($quantityreportitems->count());
        if($outputquantityitems->count())
        {
//            dd($quantityreportitems);
            foreach ($outputquantityitems as $outputquantityitem)
            {
                if ($v_note=='')
                    $v_note= $outputquantityitem->note;
                else
                    $v_note= $v_note.'/'.$outputquantityitem->note;

                $v_length=$outputquantityitem->length + $v_length;
                $v_totalpoints=$outputquantityitem->totalpoints + $v_totalpoints;
//                dd($quantityreportitem->note);
            }

            if($v_length>0 && $v_totalpoints>0)
                $v_y100points=round($v_totalpoints / $v_length *100,2) ;

            if ($v_y100points>=0 && $v_y100points<24)
                $v_grade='A';
            elseif($v_y100points>=24 && $v_y100points<36)
                $v_grade='B';
            else
                $v_grade='C';

//            dd($v_note,$v_length,$v_totalpoints,$v_y100points,$v_grade);
            Ouptputquantityhead::where('id','=',$id)
                ->update(['note'=>$v_note,'length'=>$v_length,'totalpoints'=>$v_totalpoints,'y100points'=>$v_y100points,'grade'=>$v_grade]);
        }
        return redirect('ManufactureManage/Ouptputquantityhead/'.$id.'/detail');
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
        $outputquantityitem = Outputquantityitem::findOrFail($id);
        $outputquantityhead_id=$outputquantityitem->outputquantityhead_id;
//        dd($processinfo);
        return view('ManufactureManage.Outputquantityitem.edit', compact('outputquantityitem','outputquantityhead_id'));
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
        $outputquantityitem = Outputquantityitem::findOrFail($id);
        $outputquantityitem->update($request->all());
        return redirect('ManufactureManage/Outputquantityhead/'.$request->get('outputquantityhead_id').'/detail');
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
        $outputquantityitem = Outputquantityitem::findOrFail($id);
        $outputquantityhead_id = $outputquantityitem->outputquantityhead_id;
        Outputquantityitem::destroy($id);
        return redirect('ManufactureManage/Quantityreporthead/'.$outputquantityhead_id.'/detail');
    }
}
