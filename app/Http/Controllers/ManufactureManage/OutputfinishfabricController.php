<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Outputfinishfabric;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Log;

class OutputfinishfabricController extends Controller
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
        $outputfinishfabrics = $this->searchrequest($request)->orderby('outputfinishfabrics.created_at','desc')->paginate(10);
        return view('ManufactureManage.Outputfinishfabric.index', compact('outputfinishfabrics','inputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ManufactureManage.Outputfinishfabric.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storenew(Request $request)
    {
        //

        $this->validate($request, [
            'checkdate'        => 'required',
            'length'        => 'integer',
            'totalpoints'        => 'integer',
            'checkshifts'        =>'required',
            'machineno'        =>'required',
        ]);

        $input = $request->all();
        $outputfinishfabric=Outputfinishfabric::create($input);
        return json_encode($outputfinishfabric);
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
//        dd(1);
        $this->validate($request, [
            'checkdate'        => 'required',
            'length'        => 'integer',
            'totalpoints'        => 'integer',
            'checkshifts'        =>'required',
            'machineno'        =>'required',
        ]);

        $input = $request->all();
        Outputfinishfabric::create($input);
        return redirect('ManufactureManage/Outputfinishfabric');
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

        $outputfinishfabrics = $this->searchrequest($request)->paginate(10);
        return view('ManufactureManage.Outputfinishfabric.index', compact('outputfinishfabrics', 'inputs'));
    }

    private function searchrequest($request)
    {

        $query = Outputfinishfabric::orderBy('checkdate', 'desc');

        if ($request->has('key') && strlen($request->get('key')) > 0)
        {
            $key = $request->get('key');
            $query->leftJoin('processinfos','processinfos.id','=','outputfinishfabrics.processinfo_id')
                ->where(function ($query) use ($key){
                    $query ->where( 'processinfos.insheetno', 'like', '%'.$key.'%')
                        ->orWhere('processinfos.contractno', 'like', '%'.$key.'%')
                        ->orWhere('processinfos.pattern', 'like', '%'.$key.'%');
                });
        }

        if ($request->has('checksdate') && $request->has('checkedate'))
        {
            $query->whereRaw('checkdate between \'' . $request->input('checksdate') . '\' and \'' . $request->input('checkedate') . '\'');

        }

        if (! $request->has('checksdate') && ! $request->has('checkedate'))
        {
            $date=Carbon::today()->toDateString();

            $query->whereRaw('checkdate between \'' . $date . '\' and \'' . $date . '\'');

        }

        if ($request->has('search_type') && strlen($request->get('search_type')) > 0)
        {
            switch ($request->get('search_type'))
            {
                case 'number':
                    $query->where('number','=',$request->get('search_key'));
                    break;
                case 'fabricno':
                    $query->where('fabricno','=',$request->get('search_key'));
                    break;
                case 'machineno':
                    $query->where('machineno','=',$request->get('search_key'));
                    break;
                default:
                    break;
            };
        }
//        dd($query);
        $outputfinishfabrics = $query->select('outputfinishfabrics .*');
        return $outputfinishfabrics;
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
        $outputfinishfabric = Outputfinishfabric::findOrFail($id);
        return view('ManufactureManage.Outputfinishfabric.edit', compact('outputfinishfabric'));
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

        $outputfinishfabric = Outputfinishfabric::findOrFail($id);
        $outputfinishfabric->update($request->all());
//        dd($request->all());
        return redirect('ManufactureManage/Outputfinishfabric');
    }


    public function delalloutputfinishfabric(Request $request)
    {
        //
//        dd($request->all());
        $ids = [];
//        log:info($request->all());
        if ($request->has('ids'))
            $ids = explode(",", $request->input('ids'));
//        Log::info($ids);
        foreach ($ids as $id) {
            Outputfinishfabric::destroy($id);
        }

        $data = [
            'errcode' => 0,
            'errmsg' => 'Success to del',
//            'popoverhtml' => $popoverhtml,
        ];
        return response()->json($data);
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
        Outputfinishfabric::destroy($id);
        return redirect('ManufactureManage/Outputfinishfabric');
    }
}
