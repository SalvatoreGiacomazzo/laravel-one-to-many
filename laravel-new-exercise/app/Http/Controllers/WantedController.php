<?php

namespace App\Http\Controllers;

use App\Models\Wanted;
use App\Models\Device;

use Illuminate\Http\Request;

class WantedController extends Controller
{
    public function __construct()
    {

        $this->middleware("auth");
    }

    public function index()
    {

        dd(Device::all()->pluck("id"));
        $wantedList = Wanted::paginate(10);

        return view('wanted.home', ['wantedList' => $wantedList]);
    }
    public function show($id)
    {

        $wanted = Wanted::findOrFail($id);


        return view('wanted.show', compact('wanted'));
    }
}
