<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createlisting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create listing form validation
        $this->validate($request, [
          'name' => 'required',
          'email' => 'email'
        ]);

        // Create listing
        $listing = new Listing;
        $listing->name    = $request->input('name');
        $listing->website = $request->input('website');
        $listing->email   = $request->input('email');
        $listing->phone   = $request->input('phone');
        $listing->address = $request->input('address');
        $listing->bio     = $request->input('bio');
        $listing->user_id = auth()->user()->id; // ovo je genijalno

        $listing->save();

        return redirect('/dashboard')->with('success', 'Contact Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $listing = Listing::find($id);
        
        return view('showlisting')->with('listing', $listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('editlisting')->with('listing', $listing);
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
          $this->validate($request, [
            'name' => 'required',
            'email' => 'email'
          ]);

          // Create listing
          $listing = Listing::find($id);
        
          $listing->name    = $request->input('name');
          $listing->website = $request->input('website');
          $listing->email   = $request->input('email');
          $listing->phone   = $request->input('phone');
          $listing->address = $request->input('address');
          $listing->bio     = $request->input('bio');
        
          $listing->user_id = auth()->user()->id;

          $listing->save();

          return redirect('/dashboard')->with('success', 'Contact Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        
        $listing->delete();

        return redirect('/dashboard')->with('success', 'Contact removed');
    }
}
