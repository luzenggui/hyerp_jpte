<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Models\ManufactureManage\Outputquantity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysql_xdevapi\Exception;
use Log;

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
        $outputquantitys = $this->searchrequest($request)->orderby('outputquantities.created_at','desc')->paginate(10);
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
    public function storenew(Request $request)
    {
        //

        $this->validate($request, [
            'outputdate'        => 'required',
            'gfmeter'   => 'required',
//            'manufactureshifts'  =>'required',
            'length'        => 'integer',
            'totalpoints'        => 'integer',
            'checkshifts'        =>'required',
            'machineno'        =>'required',
            'note'  =>'required',
        ]);

        $input = $request->all();
        $outputquantity=Outputquantity::create($input);
        return json_encode($outputquantity);
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
            'outputdate'        => 'required',
            'gfmeter'   => 'required',
//            'manufactureshifts'  =>'required',
            'length'        => 'integer',
            'totalpoints'        => 'integer',
            'checkshifts'        =>'required',
            'machineno'        =>'required',
            'note'  =>'required',
        ]);

        $input = $request->all();
        Outputquantity::create($input);
        return redirect('ManufactureManage/Outputquantity');
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

        if ($request->has('key') && strlen($request->get('key')) > 0)
        {
            $key = $request->get('key');
            $query->leftJoin('processinfos','processinfos.id','=','outputquantities.processinfo_id')
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
        $outputquantitys = $query->select('outputquantities.*');
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


    public function delalloutputquantity(Request $request)
    {
        //
//        dd($request->all());
        $ids = [];
//        log:info($request->all());
        if ($request->has('ids'))
            $ids = explode(",", $request->input('ids'));
//        Log::info($ids);
        foreach ($ids as $id) {
            Outputquantity::destroy($id);
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
        Outputquantity::destroy($id);
        return redirect('ManufactureManage/Outputquantity');
    }
}
