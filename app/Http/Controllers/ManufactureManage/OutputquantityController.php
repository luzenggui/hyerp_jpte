<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Outputquantity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutputquantityController extends Controller
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
        $outputquantitys = $this->searchrequest($request)->paginate(10);
        return view('ManufactureManage.Outputquantity.index', compact('outputquantitys','inputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ManufactureManage.Outputquantity.create');
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
            'manufactureshifts'  =>'required',
            'length'        => 'integer',
            'totalpoints'        => 'integer',
            'checkshifts'        =>'required',
            'machineno'        =>'required',
            'note'  =>'required',
        ]);

        $input = $request->all();
        Outputquantity::create($input);
        return redirect('ManufactureManage/Outputquantity/create');
//        return redirect('ManufactureManage/Outputgreyfabric');
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

        $outputquantitys = $this->searchrequest($request)->paginate(10);
        return view('ManufactureManage.Outputquantity.index', compact('outputquantitys', 'inputs'));
    }

    private function searchrequest($request)
    {

        $query = Outputquantity::orderBy('outputdate', 'desc');

        if ($request->has('outputsdate') && $request->has('outputedate'))
        {
            $query->whereRaw('outputdate between \'' . $request->input('outputsdate') . '\' and \'' . $request->input('outputedate') . '\'');

        }

        if (! $request->has('outputsdate') && ! $request->has('outputedate'))
        {
            $date=Carbon::today()->toDateString();

            $query->whereRaw('outputdate between \'' . $date . '\' and \'' . $date . '\'');

        }

        $outputquantitys = $query->select('*');
        return $outputquantitys;
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
        $outputquantity = Outputquantity::findOrFail($id);
        return view('ManufactureManage.Outputquantity.edit', compact('outputquantity'));
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

        $outputquantity = Outputquantity::findOrFail($id);
        $outputquantity->update($request->all());
//        dd($request->all());
        return redirect('ManufactureManage/Outputquantity');
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
        Outputquantity::destroy($id);
        return redirect('ManufactureManage/Outputquantity');
    }
}
