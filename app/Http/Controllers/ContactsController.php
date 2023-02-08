<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::all();
        // return view('dashboard', compact('contacts'));
        return view('dashboard')->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $storeData = $request->validate([
            'fullName' => 'required|max:255',
            'phoneNumber' => 'required|numeric',
            'email' => 'required|max:255',            
            'imgPath' => 'required|max:255',
        ]);

        $fileName = time().$request->file('imgPath')->getClientOriginalName();
        $path = $request->file('imgPath')->storeAs('images', $fileName, 'public');
        $storeData["imgPath"] = '/storage/'.$path;
        $contact = $storeData;
        return Contacts::create($storeData);
        // return redirect('/dashboard')->with('contacts', $contacts);
        
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
        $contact = Contacts::findOrFail($id);
        return view('edit', compact('contact'));
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
        $updateData = $request->validate([
            'fullName' => 'required|max:255',
            'phoneNumber' => 'required|numeric|max:15',
            'email' => 'required|max:255',            
            'imgPath' => 'required|max:255',
        ]);
        Contacts::whereId($id)->update($updateData);
        return redirect('/dashboard')->with('completed', 'Contact has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contacts::findOrFail($id);
        $contact->delete();
        return redirect('/dashboard')->with('completed', 'Contact has been deleted');
    }
}
