<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\Manufacturemanage\Quantityreporthead;
use App\Models\Manufacturemanage\Quantityreportitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;

class QuantityreportitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quantityreportitems = Quantityreportitem::latest('created_at')->paginate(10);
        return view('ManufactureManage.Quantityreportitem.index', compact('quantityreportitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quantityreporthead_id)
    {
        //
        return view('ManufactureManage.Quantityreportitem.create',compact('quantityreporthead_id'));
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
        Quantityreportitem::create($input);
        return redirect('ManufactureManage/Quantityreporthead/'.$input['quantityreporthead_id'].'/detail');
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
        $quantityreportitems = Quantityreportitem::where('quantityreporthead_id','=',$id)->get();
        $v_note='';
        $v_length=0;
        $v_totalpoints=0;
        $v_y100points=0.0;
//        dd($quantityreportitems->count());
        if($quantityreportitems->count())
        {
//            dd($quantityreportitems);
            foreach ($quantityreportitems as $quantityreportitem)
            {
                if ($v_note=='')
                    $v_note= $quantityreportitem->note;
                else
                    $v_note= $v_note.'/'.$quantityreportitem->note;

                $v_length=$quantityreportitem->length + $v_length;
                $v_totalpoints=$quantityreportitem->totalpoints + $v_totalpoints;
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
            Quantityreporthead::where('id','=',$id)
                              ->update(['note'=>$v_note,'length'=>$v_length,'totalpoints'=>$v_totalpoints,'y100points'=>$v_y100points,'grade'=>$v_grade]);
        }
        return redirect('ManufactureManage/Quantityreporthead/'.$id.'/detail');
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
        $quantityreportitem = Quantityreportitem::findOrFail($id);
        $quantityreporthead_id=$quantityreportitem->quantityreporthead_id;
//        dd($processinfo);
        return view('ManufactureManage.Quantityreportitem.edit', compact('quantityreportitem','quantityreporthead_id'));
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
        $quantityreportitem = Quantityreportitem::findOrFail($id);
        $quantityreportitem->update($request->all());
        return redirect('ManufactureManage/Quantityreporthead/'.$request->get('quantityreporthead_id').'/detail');
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
        $quantityreportitem = Quantityreportitem::findOrFail($id);
        $quantityreporthead_id = $quantityreportitem->quantityreporthead_id;
        Quantityreportitem::destroy($id);
        return redirect('ManufactureManage/Quantityreporthead/'.$quantityreporthead_id.'/detail');
    }
}
