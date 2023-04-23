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
            ->with('success', "Type $type->title has been deleted.");
    }
}
