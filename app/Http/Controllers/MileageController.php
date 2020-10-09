<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mileage;

class MileageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mileage = mileage::orderBy('date_drive', 'desc')->get();

        return view('record_mileage.index')->with('mileage',$mileage);
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
        // Validation for Input
        request()->validate([

            'driver_name' => ['required'],
            'before_img.*' => ['mimes:jpg,jpeg,png','max:1'],
            'after_img.*' => ['required','mimes:jpg,jpeg,png','max:1'],
            'destination_purpose' => ['required']
        ]);
        

        // Handle File Upload for image before
        if($request->hasFile('before_img'))
        {
            $imagenameArray = $request->file('before_img');
            $filenameWithExt = $imagenameArray->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $imagenameArray->getClientOriginalExtension();
            $imagebeforeNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $imagenameArray->storeAs('public/img', $imagebeforeNameToStore);

        }
        else 
        {
            $imagebeforeNameToStore = null;
        }

        // Handle File Upload for image after
        if($request->hasFile('after_img'))
        {
            $imagenameArray = $request->file('after_img');
            $filenameWithExt = $imagenameArray->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $imagenameArray->getClientOriginalExtension();
            $imageafterNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $imagenameArray->storeAs('public/img', $imageafterNameToStore);
        }

        // Store The Value
        $mileage = new mileage();
        $mileage->name = request('driver_name');
        $mileage->date_drive = date('Y-m-d',strtotime(request('mileage_date')));
        $mileage->img_before = $imagebeforeNameToStore;
        $mileage->img_after = $imageafterNameToStore;

        $mileage->pur_destination = request('destination_purpose');
        $mileage->remarks = request('remarks');
        $mileage->save();


        // Go to Redirect Page
        return redirect('/')->with('success', 'Record create successfully');
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
        $mileage = mileage::findOrfail($id);

        return view('record_mileage.show')->with('mileage',$mileage);
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
