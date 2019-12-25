<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Firstffabric;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FirstffabricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $inputs=$request->all();
        $firstffabrics = Firstffabric::latest('created_at')->paginate(10);
        return view('ManufactureManage.Firstffabric.index', compact('firstffabrics','inputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ManufactureManage.Firstffabric.create');
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
            'indate'        => 'required',
            'length'                   => 'required|integer',
        ]);

        $input = $request->all();
//        dd($input);
        Firstffabric::create($input);
        return redirect('ManufactureManage/Firstffabric');
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

        $firstffabrics = $this->searchrequest($request)->paginate(10);
        return view('ManufactureManage.Firstffabric.index', compact('firstffabrics', 'inputs'));
    }

    private function searchrequest($request)
    {

        $query = Firstffabric::orderBy('indate', 'desc');

        if ($request->has('key') && strlen($request->get('key')) > 0)
        {
            $key = $request->get('key');
            $query->leftJoin('processinfos','processinfos.id','=','firstffabrics.processinfo_id')
                ->where(function ($query) use ($key){
                    $query ->where( 'processinfos.insheetno', 'like', '%'.$key.'%')
                        ->orWhere('processinfos.contractno', 'like', '%'.$key.'%')
                        ->orWhere('processinfos.pattern', 'like', '%'.$key.'%');
                });
        }

        if ($request->has('insdate') && $request->has('inedate'))
        {
            $query->whereRaw('indate between \'' . $request->input('insdate') . '\' and \'' . $request->input('inedate') . '\'');

        }

        if (! $request->has('insdate') && ! $request->has('inedate'))
        {
            $date=Carbon::today()->toDateString();

            $query->whereRaw('indate between \'' . $date . '\' and \'' . $date . '\'');

        }
//        dd($query);
        $firstffabrics = $query->select('firstffabrics.*');
        return $firstffabrics;
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
        $firstffabric = Firstffabric::findOrFail($id);
//        dd($processinfo);
        return view('ManufactureManage.Firstffabric.edit', compact('firstffabric'));
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
        $firstffabric = Firstffabric::findOrFail($id);
        $firstffabric->update($request->all());
//        dd($request->all());
        return redirect('ManufactureManage/Firstffabric');
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
        Firstffabric::destroy($id);
        return redirect('ManufactureManage/Firstffabric');
    }
}
