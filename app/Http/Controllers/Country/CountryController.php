<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function country(){
//        dd(response()->json(CountryModel::get(['id','name', 'dname']), 200));
        return response()->json(CountryModel::get(['id','name', 'dname']), 200);
    }

    public function countryByID($id){
        $country = CountryModel::find($id);
        if (is_null($country)){
            return response()->json('Record Not Found!!!', 404);
        }

        return response()->json($country, 200);
//        return response()->json(CountryModel::find($id, ['name', 'dname']), 200);
    }

    public function countrySave(Request $request){
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

//    public function countryUpdate(Request $request, $id/*CountryModel $countryModel*/){
////        dd($countryModel->name);
//        $countryModel = CountryModel::find($id);
//
//        $countryModel->name=$request->name;
//        $countryModel->dname=$request->dname;
//        $countryModel->iso3=$request->iso3;
//        $countryModel->position=$request->position;
//        $countryModel->numcode=$request->numcode;
//        $countryModel->phonecode=$request->phonecode;
//        $countryModel->created=$request->created;
//        $countryModel->register_by=$request->register_by;
//        $countryModel->modified=$request->modified;
//        $countryModel->modified_by=$request->modified_by;
//        $countryModel->save();
////        dd($id);
////        $countryModel->update($request->all());
//
//        return response()->json($countryModel, 200);
//    }

    public function countryUpdate(Request $request, $id){
//        dd($countryModel->name);
//        $countryModel = CountryModel::find($id);

//        $countryModel->name=$request->name;
//        $countryModel->dname=$request->dname;
//        $countryModel->iso3=$request->iso3;
//        $countryModel->position=$request->position;
//        $countryModel->numcode=$request->numcode;
//        $countryModel->phonecode=$request->phonecode;
//        $countryModel->created=$request->created;
//        $countryModel->register_by=$request->register_by;
//        $countryModel->modified=$request->modified;
//        $countryModel->modified_by=$request->modified_by;
//        $countryModel->save();
////        dd($id);
///

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

    public function countryDelete(Request $request, $id){
        $countryModel = CountryModel::find($id);
        if (is_null($countryModel)){
            return response()->json('No data', 404);
        } else {
            $countryModel->delete();
        }

        return response()->json(null, 204);
    }


}
