<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Outputquantityhead;
use App\Models\ManufactureManage\Outputquantityitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class OutputquantityheadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $inputs = $request->all();
        $date=Carbon::now();
//        $outputquantityheads = Outputquantityhead::latest('created_at')
//                               ->where('outputdate','=',$date)->paginate(10);
        $outputquantityheads = $this->searchrequest($request)->paginate(10);
//        dd($outputquantityheads->count());
        return view('ManufactureManage.Outputquantityhead.index', compact('outputquantityheads','inputs'));
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

    public function search(Request $request)
    {
        //
//        dd($request);
        $inputs = $request->all();

        $outputquantityheads = $this->searchrequest($request)->paginate(10);
//        dd($outputquantityheads->count());
        return view('ManufactureManage.Outputquantityhead.index', compact('outputquantityheads', 'inputs'));
    }

    private function searchrequest($request)
    {

        $query = Outputquantityhead::orderBy('outputdate', 'desc');

//        if ($request->has('key') && strlen($request->get('key')) > 0)
//        {
//            $key = $request->get('key');
//
//            $db_driver = config('database.connections.' . env('DB_CONNECTION', 'mysql') . '.driver');
//            if ($db_driver == "sqlsrv")
//                $query->where(function ($query) use ($key) {
//                    $query->where('customer_name', 'like', '%' . $key . '%')
//                        ->orWhere('invoice_number', 'like', '%' . $key . '%')
//                        ->orWhere('contract_number', 'like', '%' . $key . '%')
//                        ->orWhere('bill_no', 'like', '%' . $key . '%')
//                        ->orWhere('ship_company', 'like', '%' . $key . '%')
//                        ->orWhere('customs_no', 'like', '%' . $key . '%');
//                });
//            elseif ($db_driver == "pgsql")
//                $query->where(function ($query) use ($key) {
//                    $query->where('customer_name', 'ilike', '%' . $key . '%')
//                        ->orWhere('invoice_number', 'ilike', '%' . $key . '%')
//                        ->orWhere('contract_number', 'ilike', '%' . $key . '%')
//                        ->orWhere('bill_no', 'ilike', '%' . $key . '%')
//                        ->orWhere('ship_company', 'ilike', '%' . $key . '%')
//                        ->orWhere('customs_no', 'ilike', '%' . $key . '%');
//                });
//        }

        if ($request->has('outputsdate') && $request->has('outputedate'))
        {
//            $enddate = Carbon::parse($request->input('createdateend'))->addDay();
            $query->whereRaw('outputdate between \'' . $request->input('outputsdate') . '\' and \'' . $request->input('outputedate') . '\'');

        }

        if (! $request->has('outputsdate') && ! $request->has('outputedate'))
        {
//            $enddate = Carbon::parse($request->input('createdateend'))->addDay();
            $date=Carbon::today()->toDateString();
//            dd($date);
            $query->whereRaw('outputdate between \'' . $date . '\' and \'' . $date . '\'');

        }
//        if ($request->has('etdstart') && $request->has('etdend'))
//        {
////            $enddate = Carbon::parse($request->input('etdend'))->addDay();
//            $query->whereRaw('etd between \'' . $request->input('etdstart') . '\' and \'' . $request->input('etdend') . '\'');
//
//        }
//
//        if ($request->has('amount_for_customer') && strlen($request->get('amount_for_customer')) > 0)
//        {
//            $query->where('amount_for_customer', $request->get('amount_for_customer_opt'), $request->get('amount_for_customer'));
//        }
//
//        if ($request->has('invoice_number_type') && strlen($request->get('invoice_number_type')) > 0)
//        {
//            $query->where('invoice_number', 'like', '%' . $request->get('invoice_number_type') . '%');
//        }
//
//        if (Auth::user()->isForwarder())
//        {
//            $forwarders = Userforwarder::where('user_id', Auth::user()->id)->pluck('forwarder');
//            $query->whereIn('forwarder', $forwarders);
//        }



        $outputquantityheads = $query->select('*');
//        dd($outputquantityheads->count());

        // $purchaseorders = Purchaseorder_hxold::whereIn('id', $paymentrequests->pluck('pohead_id'))->get();
        // dd($purchaseorders->pluck('id'));

        return $outputquantityheads;
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
