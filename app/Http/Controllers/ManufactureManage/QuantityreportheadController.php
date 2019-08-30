<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\Manufacturemanage\Quantityreporthead;
use App\Models\Manufacturemanage\Quantityreportitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuantityreportheadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quantityreportheads = Quantityreporthead::latest('created_at')->paginate(10);
        return view('ManufactureManage.Quantityreporthead.index', compact('quantityreportheads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ManufactureManage.Quantityreporthead.create');
    }

    public function detail($id)
    {
//        dd(1);
        $quantityreportitems = Quantityreportitem::latest('created_at')->where('quantityreporthead_id', $id)->paginate(10);
        $arrayflag=array('Loosewarp'=>'N','Wrongdraft'=>'N','Dentmark'=>'N','Warpstreak'=>'N','Brokend_fillings'=>'N','Hole'=>'N','Wrongend_pick'=>'N','Oiledend_pick'=>'N','Shirikend_pick'=>'N','Doublewarp_weft'=>'N','Shw_selvedgemark'=>'N','Colorstreaks'=>'N','Weftbar'=>'N','Beltweft'=>'N','Foreignyarn'=>'N','Knots'=>'N','Neps'=>'N','Tw'=>'N','Fh'=>'N','Cws'=>'N','Th'=>'N','Thn'=>'N','Bsc'=>'N','Jb'=>'N',);
        foreach ($quantityreportitems as $quantityreportitem)
        {
            if($quantityreportitem->loosewarp)
                $arrayflag['Loosewarp']='Y';
            if($quantityreportitem->wrongdraft)
                $arrayflag['Wrongdraft']='Y';
            if($quantityreportitem->dentmark)
                $arrayflag['Dentmark']='Y';
            if($quantityreportitem->warpstreak)
                $arrayflag['Warpstreak']='Y';
            if($quantityreportitem->brokend_fillings)
                $arrayflag['Brokend_fillings']='Y';
            if($quantityreportitem->hole)
                $arrayflag['Hole']='Y';
            if($quantityreportitem->wrongend_pick)
                $arrayflag['Wrongend_pick']='Y';
            if($quantityreportitem->oiledend_pick)
                $arrayflag['Oiledend_pick']='Y';
            if($quantityreportitem->shirikend_pick)
                $arrayflag['Shirikend_pick']='Y';
            if($quantityreportitem->doublewarp_weft)
                $arrayflag['Doublewarp_weft']='Y';
            if($quantityreportitem->shw_selvedgemark)
                $arrayflag['Shw_selvedgemark']='Y';
            if($quantityreportitem->colorstreaks)
                $arrayflag['Colorstreaks']='Y';
            if($quantityreportitem->weftbar)
                $arrayflag['Weftbar']='Y';
            if($quantityreportitem->beltweft)
                $arrayflag['Beltweft']='Y';
            if($quantityreportitem->foreignyarn)
                $arrayflag['Foreignyarn']='Y';
            if($quantityreportitem->knots)
                $arrayflag['Knots']='Y';
            if($quantityreportitem->neps)
                $arrayflag['Neps']='Y';
            if($quantityreportitem->tw)
                $arrayflag['Tw']='Y';
            if($quantityreportitem->fh)
                $arrayflag['Fh']='Y';
            if($quantityreportitem->cws)
                $arrayflag['Cws']='Y';
            if($quantityreportitem->th)
                $arrayflag['Th']='Y';
            if($quantityreportitem->thn)
                $arrayflag['Thn']='Y';
            if($quantityreportitem->bsc)
                $arrayflag['Bsc']='Y';
            if($quantityreportitem->jb)
                $arrayflag['Jb']='Y';
        }
//        dd($arrayflag);
        return view('ManufactureManage.Quantityreportitem.index', compact('quantityreportitems', 'id','arrayflag'));
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
        Quantityreporthead::create($input);
        return redirect('ManufactureManage/Quantityreporthead');
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
        $quantityreporthead = Quantityreporthead::findOrFail($id);
//        dd($processinfo);
        return view('ManufactureManage.Quantityreporthead.edit', compact('quantityreporthead'));
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
        $quantityreporthead = Quantityreporthead::findOrFail($id);
        $quantityreporthead->update($request->all());
        return redirect('ManufactureManage/Quantityreporthead');
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
        $cntquantityreportitem=Quantityreportitem::where('quantityreporthead_id','=','$id')
            ->count('*');
        if($cntquantityreportitem>1)
            dd('There is quantity detail data at this sheet!, Cannot delete!');
        else
            Quantityreporthead::destroy($id);
        return redirect('ManufactureManage/Quantityreporthead');
    }
}
