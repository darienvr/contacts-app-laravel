<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $user = Auth::user();
        $contacts = Contact::where('id_usuario', $user->id)->get();
        return view('contacts.index', ['contacts'=>$contacts, 'user' => $user]);
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
        $contact->id_usuario = Auth::id(); 
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
