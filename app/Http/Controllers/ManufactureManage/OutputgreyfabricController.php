<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Outputgreyfabric;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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
        $outputgreyfabrics = $this->searchrequest($request)->paginate(10);
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

        $outputgreyfabrics = $this->searchrequest($request)->paginate(10);
        return view('ManufactureManage.Outputgreyfabric.index', compact('outputgreyfabrics', 'inputs'));
    }

    private function searchrequest($request)
    {

        $query = Outputgreyfabric::orderBy('outputdate', 'desc');

        if ($request->has('outputsdate') && $request->has('outputedate'))
        {
            $query->whereRaw('outputdate between \'' . $request->input('outputsdate') . '\' and \'' . $request->input('outputedate') . '\'');

        }

        if (! $request->has('outputsdate') && ! $request->has('outputedate'))
        {
            $date=Carbon::today()->toDateString();

            $query->whereRaw('outputdate between \'' . $date . '\' and \'' . $date . '\'');

        }

        $outputgreyfabricss = $query->select('*');

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
