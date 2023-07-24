<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\TeamFormRequest;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('position', 'asc')->get();
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(TeamFormRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $request->file('image')->store('teamImage');
        Team::create($validatedData);
        return redirect()->route('team.index')->with('success', 'Member added successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(TeamFormRequest $request, Team $team)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            Storage::delete($team->image);
            $validatedData['image'] = $request->file('image')->store('teamImage');
        }
        $team->update($validatedData);
        return redirect()->route('team.index')->with('info', 'Details updated successfully.');
    }

    public function destroy(Team $team)
    {
        Storage::delete($team->image);
        $team->delete();
        return redirect()->route('team.index')->with('danger', 'Member removed successfully.');
    }
}
