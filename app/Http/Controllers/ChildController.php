<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildStoreRequest;
use App\Http\Requests\ChildUpdateRequest;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ChildController extends Controller
{
    //

    public function index()
    {

        $user = Auth::user();
        $children = $user->children;
        return view('child.index', [
            'children' => $children,
        ]);
    }

    public function create(Request $request)
    {

        return view('child.create', [

        ]);

    }


    public function store(ChildStoreRequest $request)
    {


        $data = $request->validated();

        $child = $request->user()->children()->create($data);

        if ($child && $request->hasFile('childPhoto')) {

            $image = $request->file('childPhoto');
            $child->addMedia($image)->toMediaCollection('profile_images');

        }
        return Redirect::route('child.index');

    }

    public function edit(Request $request, Child $child)
    {

        return view('child.edit', [
            'child' => $child
        ]);

    }

    public function update(ChildUpdateRequest $request, Child $child)
    {
        $data = $request->validated();
        $child->fill($data);

        if ($request->hasFile('childPhoto')) {

            $photo = $request->file('childPhoto');
            $name = sprintf('avatar.%s', $photo->getClientOriginalExtension());
            $path = sprintf('child_galleries/%s/%s', $child->id, $name);
            if ($photo->storeAs('public/'.$path)) {
                $child->photo = $path;
                $child->save();
            }
        }
        $child->save();

        return Redirect::route('child.edit', ['child' => $child->id])->with('status', 'record-updated');


    }

    public function show(Request $request, Child $child)
    {

        return view("child.show", [
            'child' => $child,
        ]);
    }

    public function destroy(Request $request, Child $child)
    {
        $child->delete();
        return Redirect::route('child.index');
    }

}
