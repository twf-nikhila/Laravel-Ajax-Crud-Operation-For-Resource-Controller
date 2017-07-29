<?php

namespace App\Http\Controllers;

use App\Brands;

use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            
            $brands = Brands::all()
                        ->select(['name', 'description', 'id']);

            return Datatables::of($brands)
                ->addColumn('action', 
                    '<button data-href="{{action(\'BrandController@edit\', [$id])}}" class="btn btn-xs btn-primary edit_brand_button"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                        &nbsp;
                        <button data-href="{{action(\'BrandController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_brand_button"><i class="glyphicon glyphicon-trash"></i> Delete</button>'
                )
                ->removeColumn('id')
                ->escapeColumns(['action'])
                ->make();
        }

        return view ('brand.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $input = $request->only(['name', 'description']);

            $brand = Brands::create($input);
            $output = array('success' => true, 
                            'data' => $brand, 
                            'msg' => 'Brand added succesfully'
                        );

        } catch(exception $e){
            Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
            $output = array('success' => false, 
                            'msg' => 'Something went wrong, please try again'
                        );
        }

        return $output;
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
        if (request()->ajax()) {
            $brand = Brands::findOrFail($id);

            return view ('brand.edit')
                ->with(compact('brand'));
        }
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
        if (request()->ajax()) {

            try {

                $input = $request->only(['name', 'description']);

                $brand = Brands::findOrFail($id);
                $brand->name = $input['name'];
                $brand->description = $input['description'];
                $brand->save();

                $output = array('success' => true, 
                            'msg' => 'Brand updated succesfully'
                            );

            } catch(exception $e){
                Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
                $output = array('success' => false, 
                            'msg' => 'Something went wrong, please try again'
                        );
            }

            return $output;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->ajax()) {

            try {

                $brand = Brands::findOrFail($id);
                $brand->delete();

                $output = array('success' => true, 
                            'msg' => 'Brand deleted succesfully'
                            );

            } catch(exception $e){
                Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
                $output = array('success' => false, 
                            'msg' => 'Something went wrong, please try again'
                        );
            }

            return $output;
        }
    }
}
