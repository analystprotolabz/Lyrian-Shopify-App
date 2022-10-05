<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

//use ShopifyApp;

class FilterController extends Controller
{
    public function index()
    {
        $shop = Auth::user();
        $shopFilters = DB::table('shop_custom_filters')
        ->where('domain', '=', $shop->name)
        ->orderBy('id', 'desc')
        ->get()
        ->toArray();
        return view("app_admin.filter",compact(['shopFilters']));
    }

    public function newFilterItem(Request $request)
    {
       
        $filterType = $request->input('option_type');
        $filterLabel = $request->input('option_label');
        $filterDisplayType = $request->input('option_display');
        $filterSelectionType = $request->input('option_select');
        $filterStatus = 1;
        $validator = Validator::make($request->all(), [
            'option_type'     => 'required',
            'option_label'   => 'required',
            'option_display' => 'required',
            'option_select' =>'required'
        ]);
        if ($validator->passes()) 
        {
            $shop = Auth::user();
            $filterData =  array(
            'domain'=> $shop->name,
            'filter_id' => bin2hex(random_bytes(5)),
            'option_type' => $filterType,
            'option_label' => $filterLabel,
            'option_display' => $filterDisplayType,
            'option_select' => $filterSelectionType,
            'option_status' => 1,
            'created_at' => Carbon::now()
            );
            $result  =  DB::table('shop_custom_filters')->insertGetId($filterData);    
            if($result)
            {
                $shop = Auth::user();
                $shopFilters = DB::table('shop_custom_filters')
                ->where('domain', '=', $shop->name)
                ->orderBy('id', 'desc')
                ->get()
                ->toArray();
                return response()->json(['success_message'=> "Filter created.",'status'=>1,'filterData'=>$shopFilters]);
            }
            else
            {
                return response()->json(['error_message'=> "Something went wrong, Please try again.",'status'=>0]);
            }
        }
        else
        {
            return response()->json(['error_message'=> $validator->errors()->first(),'status'=>0]);
        }
    }

    public function removeFilter(Request $request)
    {
        $shop = Auth::user();
        $filterId = $request->input('fid');
        $deleted = DB::table('shop_custom_filters')
        ->where('filter_id', '=', $filterId)
        ->where('domain', '=', $shop->name)
        ->delete();
        if($deleted)
        {
            return response()->json(['success_message'=> "Filter deleted successfully.",'status'=>1]);
        }
        else
        {
            return response()->json(['error_message'=> "Something went wrong, Please try again.",'status'=>0]);
        }


    }

    public function filterStatus(Request $request)
    {
        $shop = Auth::user();
        $affected = DB::table('shop_custom_filters')
                        ->where('filter_id', '=', $request->input('fid'))
                        ->where('domain', '=', $shop->name)
                        ->update(['option_status' => $request->input('status'),'updated_at' => Carbon::now()]);
        if($affected)
        {
            return response()->json(['success_message'=> "Filter status updated successfully.",'status'=>1]);
        }
        else
        {
            return response()->json(['error_message'=> "Something went wrong, Please try again.",'status'=>0]);
        }             
    }

    public function updateFilter(Request $request)
    {
        $shop = Auth::user();
       
        $filterInfo = DB::table('shop_custom_filters')
                        ->where('filter_id', '=', $request->input('fid'))
                        ->where('domain', '=', $shop->name)
                        ->get()
                        ->toArray();
        if($filterInfo)
        {
            return response()->json(['success_message'=> "Filter status updated successfully.",'status'=>1,'data'=>$filterInfo]);
        }   
        else
        {
            return response()->json(['error_message'=> "Something went wrong, Please try again.",'status'=>0]);
        }             
    }

    public function updateFilterItem(Request $request)
    {
        $shop = Auth::user();
        $updateInfo = [
                        'option_type' => $request->input('option_type'),
                        'option_label' => $request->input('option_label'),
                        'option_display' => $request->input('option_display'),
                        'option_select' => $request->input('option_select'),
                        'updated_at' => Carbon::now()
                     ];
        $affected = DB::table('shop_custom_filters')
                        ->where('filter_id', '=', $request->input('filterId'))
                        ->where('domain', '=', $shop->name)
                        ->update($updateInfo);
        if($affected)
        {
            $shop = Auth::user();
                $shopFilters = DB::table('shop_custom_filters')
                ->where('domain', '=', $shop->name)
                ->orderBy('id', 'desc')
                ->get()
                ->toArray();
            return response()->json(['success_message'=> "Filter updated successfully.",'status'=>1,'filterData'=>$shopFilters]);
        }
        else
        {
            return response()->json(['error_message'=> "Something went wrong, Please try again.",'status'=>0]);
        }   
    }
}
