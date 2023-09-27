<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\col;
use App\drive_test_order;
use App\q_order;
use App\more_info_order;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Validator;
use Datatables;

class ContactordersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        

        //echo "cc";
       
        
        

 

            
           
         $datas =col::orderBy('id','desc')->get();


         return Datatables::of($datas)
         
         ->toJson(); //--- Returning Json Data To Client Side







                             
                      
    }
























    public function datatables_drive_test_orders()
    {
        

        //echo "cc";
       
        
        

 

            
           
         $datas =drive_test_order::orderBy('id','desc')->get();


         return Datatables::of($datas)
         
         ->toJson(); //--- Returning Json Data To Client Side







                             
                      
    }






    public function datatables_q_orders()
    {
        

        //echo "cc";
       
        
        

 

            
           
         $datas =q_order::orderBy('id','desc')->get();


         return Datatables::of($datas)
         
         ->toJson(); //--- Returning Json Data To Client Side







                             
                      
    }




















    public function datatables_more_info_orders()
    {
        

        //echo "cc";
       
        
        

 

            
           
         $datas =more_info_order::orderBy('id','desc')->get();


         return Datatables::of($datas)
         
         ->toJson(); //--- Returning Json Data To Client Side







                             
                      
    }













    //*** GET Request
    public function index()
    {

        //echo "index";
        
        $data['type'] = 'all';
       
        return view('admin.contact_orders.index', $data);

        

        
    }



    public function index_drive_test_orders()
    {

        //echo "index";
        
        $data['type'] = 'all';
       
        return view('admin.contact_orders.drive_test_orders', $data);

        

        
    }



    public function index_q_orders()
    {

        //echo "index";
        
        $data['type'] = 'all';
       
        return view('admin.contact_orders.q_orders', $data);

        

        
    }




    public function index_more_info_orders()
    {

        //echo "index";
        
        $data['type'] = 'all';
       
        return view('admin.contact_orders.more_info_orders', $data);

        

        
    }








    //*** GET Request
    public function create()
    {
        return view('admin.brand.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();
        $brand = Brand::create($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Brand::findOrFail($id);
        return view('admin.brand.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();
        $data = Brand::findOrFail($id);
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

      //*** GET Request Status
      public function status($id1,$id2)
        {
            $data = Brand::findOrFail($id1);
            $data->status = $id2;
            $data->update();
        }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Brand::findOrFail($id);
        $data->delete();

        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
