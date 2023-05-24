<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacture;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// use PhpOffice\PhpSpreadsheet\Calculation\Category;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Manufacture::paginate(50);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        // dd($dynamicCategory);
        return view('categories.create');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Manufacture  $Manufacture
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacture $Manufacture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Manufacture  $Manufacture
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $category = Manufacture::where('id', $id)->firstOrFail();
            $allCategories = Manufacture::where('status', true)->get();
            return view('categories.edit', compact('category', 'allCategories'));

        } catch (\Exception $ex) {

            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {


            return redirect(route('categories.all'))->with('error', 'Whoops, Manufacturer Not Found !');

            }



            return redirect(route('categories.all'))->with('error', 'Whoops, Something Went Wrong from our end !');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Manufacture  $Manufacture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Manufacture  $Manufacture
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {

            $category = Manufacture::where('id', $request->manufacturer_id)->firstOrFail();
            $category->delete();

            return redirect(route('categories.all'))->with('success', 'Manufacturer has been deleted Successfully !');

        } catch (\Exception $ex) {

            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return redirect(route('categories.all'))->with('error', 'Whoops, Manufacturer Not Found with id : ' . $request->id);
            }
            return redirect(route('categories.all'))->with('error', 'Error, ' . $ex->getMessage());
        }
    }

   
}
