<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calim = Claim::latest()->paginate(21);
        return view('admin.claims.index' , compact('calim'));
    }



    /**
     * Display the specified resource.
     */
    public function show(Claim $claim)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Claim $claim)
    {
        return view('admin.claims.edit' , compact('claim'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Claim $claim)
    {
        $validate = $request->validate([
            'name' => 'nullable' ,
            'phone' => 'nullable' ,
            'email' => 'nullable' ,
            'description' => 'nullable' ,
            'status' => 'required' ,
        ]);

        $claim->updateOrFail($validate);
        return redirect(route('claims.index'))->with('msg' , 'درخواست مورد نظر با موفقیت بروز شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Claim $claim)
    {
        $claim->deleteOrFail() ;
        return redirect(route('claims.index'))->with('msg' , 'درخواست مورد نظر با موفقیت حذف شد');

    }
}
