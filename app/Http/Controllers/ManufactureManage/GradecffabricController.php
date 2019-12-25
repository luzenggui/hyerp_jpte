<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Gradecffabric;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradecffabricController extends Controller
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
        $gradecffabrics = Gradecffabric::latest('created_at')->paginate(10);
        return view('ManufactureManage.Gradecffabric.index', compact('gradecffabrics','inputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ManufactureManage.Gradecffabric.create');
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
        Gradecffabric::create($input);
        return redirect('ManufactureManage/Gradecffabric');
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

        $gradecffabrics = $this->searchrequest($request)->paginate(10);
        return view('ManufactureManage.Gradecffabric.index', compact('gradecffabrics', 'inputs'));
    }

    private function searchrequest($request)
    {

        $query = Gradecffabric::orderBy('indate', 'desc');

        if ($request->has('key') && strlen($request->get('key')) > 0)
        {
            $key = $request->get('key');
            $query->leftJoin('processinfos','processinfos.id','=','gradecffabrics.processinfo_id')
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
        $gradecffabrics = $query->select('gradecffabrics.*');
        return $gradecffabrics;
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
        $gradecffabric = Gradecffabric::findOrFail($id);
//        dd($processinfo);
        return view('ManufactureManage.Gradecffabric.edit', compact('gradecffabric'));
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
        $gradecffabric = Gradecffabric::findOrFail($id);
        $gradecffabric->update($request->all());
//        dd($request->all());
        return redirect('ManufactureManage/Gradecffabric');

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
        Gradecffabric::destroy($id);
        return redirect('ManufactureManage/Gradecffabric');
    }
}
