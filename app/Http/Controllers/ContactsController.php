<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contacts = Contact::all();
        return view('contacts.index', ['contacts'=>$contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $contact = new Contact;
        $contact->nombre = $request->nombre;
        $contact->numero = $request->numero;
        $contact->save();

        return redirect()->route('contacts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $contact = Contact::find($id);
        return view('contacts.edit', ['contact'=>$contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id);
        $contact->nombre = $request->nombre;
        $contact->numero = $request->numero;
        $contact->save();

        return redirect()->route('contacts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contacts');
    }
}
