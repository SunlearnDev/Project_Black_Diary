<?php

namespace App\Http\Controllers\Fontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DistrictModel;
class AddressController extends Controller
{
 
   
    public function getDistricCheckout(Request $request){

        $dataDistrict = DistrictModel::where('city_id',$request->city_id)->get();
        return response()->json($dataDistrict);
    }

}
