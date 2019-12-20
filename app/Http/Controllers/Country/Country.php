<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryModel;
use Illuminate\Support\Facades\Validator;

class Country extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(CountryModel::get(['id','name', 'dname']), 200);
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
        $rules = [
            'name' => 'required|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400 );
        } else {
            $country = CountryModel::create($request->all());
        }

        return response()->json($country, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = CountryModel::find($id);
        if (is_null($country)){
            return response()->json('Record Not Found!!!', 404);
        }

        return response()->json($country, 200);
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
        $countryModel = CountryModel::find($id);
        if (is_null($countryModel)){
            return response()->json("Data not found", 404);
        } else {
            $countryModel->update($request->all());
        }
//        dd($countryModel->update($request->all()));
//        dd($request->all());

        return response()->json($countryModel, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryModel = CountryModel::find($id);
        if (is_null($countryModel)){
            return response()->json('No data', 404);
        } else {
            $countryModel->delete();
        }

        return response()->json(null, 204);
    }
}
