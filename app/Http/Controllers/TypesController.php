<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function list()
    {
        return view('types.list', [
            'types' => Type::all()
        ]);
    }

    public function delete(Type $type)
    {
        $type->delete();
        return redirect('/console/types/list')
            ->with('success', "Type '$type->title' has been deleted.");
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255'
        ]);

        $type = new Type();
        $type->title = $request->input('title');
        $type->save();

        return redirect('/console/types/list')
            ->with('success', "Type '$type->title' has been created.");
    }

    public function edit(Type $type)
    {
        return view('types.edit', [
            'type' => $type
        ]);
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'title' => 'required|min:3|max:255'
        ]);

        $type->title = $request->input('title');
        $type->save();

        return redirect('/console/types/list')
            ->with('success', "Type '$type->title' has been updated.");
    }
}
