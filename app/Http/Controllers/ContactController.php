<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::paginate(5);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:6',
            'contact' => 'required|digits:9|unique:contacts,contact',
            'email' => 'required|email|unique:contacts,email',
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:6',
            'contact' => 'required|digits:9|unique:contacts,contact,' . $contact->id,
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contato excluído com sucesso!');
    }

}
