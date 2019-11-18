<?php

namespace App\Http\Controllers\ManufactureManage;

use App\Http\Controllers\HelperController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Log;

class DatasyncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('ManufactureManage.DataSync.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    public function synchronization(Request $request)
    {
        //
        $retval = [];
//        Log::info($request->all());
        if ($request->has('sdate') && $request->has('edate'))
        {
            $input=$request->all();
            $input = HelperController::skipEmptyValue($input);
            $input = array_except($input, '_token');
            $input = array_except($input, 'page');
            $db_driver = config('database.connections.' . env('DB_CONNECTION', 'mysql') . '.driver');
            $command='exec pGetQuantityData_inf_sync';
            if ($db_driver == "sqlsrv")
            {
                $param = "";
                foreach ($input as $key=>$value)
                {
                    if (!empty($value))
                        $param .= "@" . $key . "='" . $value . "',";
                }
                $param = count($input) > 0 ? substr($param, 0, strlen($param) - 1) : $param;
                $retval = DB::connection('sqlsrv')->select($command . ' ' . $param);
//            dd($retval);

            }
        }
//        log::info($retval[0]->retint);
        if($retval[0]->retint ==0)
            $data = [
                'errorcode' => 0,
                'errormsg' => 'Success to data synchronization',
            ];
        elseif($retval[0]->retint ==1)
            $data = [
                'errorcode' =>1,
                'errormsg' => 'Data failed',
            ];
        else
            $data = [
                'errorcode' =>1,
                'errormsg' => 'Data failed',
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
    }
}
