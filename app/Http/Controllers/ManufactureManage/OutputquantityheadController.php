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
        $arrayflag=array('Loosewarp'=>'N','Wrongdraft'=>'N','Dentmark'=>'N','Warpstreak'=>'N','Brokend_fillings'=>'N','Hole'=>'N','Wrongend_pick'=>'N','Oiledend_pick'=>'N','Shirikend_pick'=>'N','Doublewarp_weft'=>'N','Shw_selvedgemark'=>'N','Colorstreaks'=>'N','Weftbar'=>'N','Beltweft'=>'N','Foreignyarn'=>'N','Knots'=>'N','Neps'=>'N','Tw'=>'N','Fh'=>'N','Cws'=>'N','Th'=>'N','Thn'=>'N','Bsc'=>'N','Jb'=>'N',);
        foreach ($outputquantityitems as $outputquantityitem)
        {
            if($outputquantityitem->loosewarp)
                $arrayflag['Loosewarp']='Y';
            if($outputquantityitem->wrongdraft)
                $arrayflag['Wrongdraft']='Y';
            if($outputquantityitem->dentmark)
                $arrayflag['Dentmark']='Y';
            if($outputquantityitem->warpstreak)
                $arrayflag['Warpstreak']='Y';
            if($outputquantityitem->brokend_fillings)
                $arrayflag['Brokend_fillings']='Y';
            if($outputquantityitem->hole)
                $arrayflag['Hole']='Y';
            if($outputquantityitem->wrongend_pick)
                $arrayflag['Wrongend_pick']='Y';
            if($outputquantityitem->oiledend_pick)
                $arrayflag['Oiledend_pick']='Y';
            if($outputquantityitem->shirikend_pick)
                $arrayflag['Shirikend_pick']='Y';
            if($outputquantityitem->doublewarp_weft)
                $arrayflag['Doublewarp_weft']='Y';
            if($outputquantityitem->shw_selvedgemark)
                $arrayflag['Shw_selvedgemark']='Y';
            if($outputquantityitem->colorstreaks)
                $arrayflag['Colorstreaks']='Y';
            if($outputquantityitem->weftbar)
                $arrayflag['Weftbar']='Y';
            if($outputquantityitem->beltweft)
                $arrayflag['Beltweft']='Y';
            if($outputquantityitem->foreignyarn)
                $arrayflag['Foreignyarn']='Y';
            if($outputquantityitem->knots)
                $arrayflag['Knots']='Y';
            if($outputquantityitem->neps)
                $arrayflag['Neps']='Y';
            if($outputquantityitem->tw)
                $arrayflag['Tw']='Y';
            if($outputquantityitem->fh)
                $arrayflag['Fh']='Y';
            if($outputquantityitem->cws)
                $arrayflag['Cws']='Y';
            if($outputquantityitem->th)
                $arrayflag['Th']='Y';
            if($outputquantityitem->thn)
                $arrayflag['Thn']='Y';
            if($outputquantityitem->bsc)
                $arrayflag['Bsc']='Y';
            if($outputquantityitem->jb)
                $arrayflag['Jb']='Y';
        }
        return view('ManufactureManage.Outputquantityitem.index', compact('outputquantityitems', 'id','arrayflag'));
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
