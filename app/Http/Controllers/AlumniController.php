<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Alumni;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AlumniFormRequest;

class AlumniController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Batch $batch)
    {
        return view('admin.alumni.create', compact('batch'));
    }

    public function store(AlumniFormRequest $request, Batch $batch)
    {
        $validatedData = $request->validated();
        $validatedData['batch_id'] = $batch->id;
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('alumniImage');
        }
        Alumni::create($validatedData);
        return redirect()->route('batch.show', $batch->id)->with('success', 'Alumnus added successfully.');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $alumni = Alumni::find($id);
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function update(AlumniFormRequest $request, $id)
    {
        $alumni = Alumni::find($id);
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            if (!is_null($alumni->image)) {
                Storage::delete($alumni->image);
            }
            $validatedData['image'] = $request->file('image')->store('alumniImage');
        }
        $alumni->update($validatedData);
        return redirect()->route('batch.show', $alumni->batch_id)->with('info', 'Details updated successfully.');
    }

    public function destroy($id)
    {
        $alumni = Alumni::find($id);
        if (!is_null($alumni->image)) {
            Storage::delete($alumni->image);
        }
        $alumni->delete();
        return back()->with('danger', 'Alumnus removed successfully.');
    }
}
