<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usaha;
use Illuminate\Http\Request;

class UsahaController extends Controller
{
    public function index()
    {
        $dataUsaha = Usaha::all(); // atau bisa juga pakai paginate()

        return view('admin.usaha', [
            'usahas' => $dataUsaha
        ]);
    }

    public function create()
    {
        return view('admin.usaha-create');
    }

    public function edit($id)
    {
        return view('admin.usaha.edit', compact('id'));
    }
}
