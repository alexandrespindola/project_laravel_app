<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(): View
    {
        $contacts = Contact::all();
        return view('pages.notes', compact('notes'));
    }

    public function create(): View
    {
        return view('note.create');
    }

    public function store(NoteRequest $request): RedirectResponse
    {
        Note::create($request->all());
        return redirect()->route('note.index')->with('success', 'Note created successfully');
    }

    public function edit(Note $note): View
    {
        return view('note.edit', compact('note'));
    }

    public function update(NoteRequest $request, Note $note): RedirectResponse
    {
        $note->update($request->all());
        return redirect()->route('note.index')->with('success', 'Note updated successfully');
    }

    public function show(Note $note): View
    {
        return view('note.show', compact('note'));
    }

    public function destroy(Note $note): RedirectResponse
    {
        $note->delete();
        return redirect()->route('note.index')->with('danger', 'Note deleted');
    }
}
