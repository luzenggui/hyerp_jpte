<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Outputgreyfabric;
use App\Models\ManufactureManage\Outputquantity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Log;

class OutputgreyfabricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
//        $outputgreyfabrics = Outputgreyfabric::latest('created_at')->paginate(10);.
        $inputs = $request->all();
        $outputgreyfabrics = $this->searchrequest($request)->orderby('outputgreyfabrics.created_at','desc')->paginate(10);
        return view('ManufactureManage.Outputgreyfabric.index', compact('outputgreyfabrics','inputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ManufactureManage.Outputgreyfabric.create');
    }

    public function summeter(Request $request)
    {
        //
//        dd('1111');
//        Log::info('aaa');
        $query=Outputquantity::where('processinfo_id','=',$request->get('processinfo_id'));
//        $query->where('outputdate','=',$request->get('outputdate'));

        $summeter=$query->sum('meter');
//        if($query->sum('meter')>0.0)
            return json_encode($summeter);
//        else
//            return json_encode(0);
    }

    public function sumqtymeter(Request $request)
    {
        //
//        dd('1111');
//        Log::info('aaa');
        $query=Outputgreyfabric::where('processinfo_id','=',$request->get('processinfo_id'));
//        $query->where('outputdate','=',$request->get('outputdate'));

        $summeter=$query->sum('qtyoutput');
//        if($query->sum('meter')>0.0)
        return json_encode($summeter);
//        else
//            return json_encode(0);
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
            'outputdate'        => 'required',
            'segmentqty'        => 'required|integer',
            'qtyinspected'      => 'required|integer',
        ]);

        $input = $request->all();
//        dd($input);
        Outputgreyfabric::create($input);
        return redirect('ManufactureManage/Outputgreyfabric');
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
        $inputs = $request->all();
//        dd($inputs);
        $outputgreyfabrics = $this->searchrequest($request)->paginate(10);
        return view('ManufactureManage.Outputgreyfabric.index', compact('outputgreyfabrics', 'inputs'));
    }

    private function searchrequest($request)
    {

        $query = Outputgreyfabric::orderBy('outputdate', 'desc');

        if ($request->has('key') && strlen($request->get('key')) > 0)
        {
            $key = $request->get('key');
            $query->leftJoin('processinfos','processinfos.id','=','outputgreyfabrics.processinfo_id')
                ->where(function ($query) use ($key){
                $query ->where( 'processinfos.insheetno', 'like', '%'.$key.'%')
                ->orWhere('processinfos.contractno', 'like', '%'.$key.'%')
                ->orWhere('processinfos.pattern', 'like', '%'.$key.'%');
                });
        }


        if ($request->has('outputsdate') && $request->has('outputedate'))
        {
            $query->whereRaw('outputdate between \'' . $request->input('outputsdate') . '\' and \'' . $request->input('outputedate') . '\'');

        }

        if (! $request->has('outputsdate') && ! $request->has('outputedate'))
        {
            $date=Carbon::today()->toDateString();

            $query->whereRaw('outputdate between \'' . $date . '\' and \'' . $date . '\'');

        }
//        dd($query);
        $outputgreyfabricss = $query->select('outputgreyfabrics.*');

        return $outputgreyfabricss;
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
        $outputgreyfabric = Outputgreyfabric::findOrFail($id);
        return view('ManufactureManage.Outputgreyfabric.edit', compact('outputgreyfabric'));
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
        $outputgreyfabric = Outputgreyfabric::findOrFail($id);
        $outputgreyfabric->update($request->all());
        return redirect('ManufactureManage/Outputgreyfabric');
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
        Outputgreyfabric::destroy($id);
        return redirect('ManufactureManage/Outputgreyfabric');
    }
}
