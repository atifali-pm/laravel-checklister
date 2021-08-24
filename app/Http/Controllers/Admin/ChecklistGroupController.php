<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Models\ChecklistGroup;

class ChecklistGroupController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.checklist_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreChecklistGroupRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistGroupRequest $request)
    {
        ChecklistGroup::create($request->validated());
        return redirect()->route('home');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ChecklistGroup $checklist_group
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistGroup $checklist_group)
    {
        return view('admin.checklist_groups.edit', compact('checklist_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreChecklistGroupRequest $request
     * @param ChecklistGroup $checklist_group
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChecklistGroupRequest $request, ChecklistGroup $checklist_group)
    {
        $checklist_group->update($request->validated());
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ChecklistGroup $checklist_group
     * @return void
     */
    public function destroy(ChecklistGroup $checklist_group)
    {
        $checklist_group->delete();

        return redirect()->route('home');
    }
}
