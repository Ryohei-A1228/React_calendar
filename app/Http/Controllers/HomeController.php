<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    /**
     * イベントの追加
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function eventAdd(Request $request)
    {
        $event = new Event;
        $event->fill($request->all());
        $event->user()->associate(Auth::user());
        $event->save();

        return view('home');
    }

    /**
     * イベント取得
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function eventGet()
    {   
        $events = Event::with('user')->get();

        return response()->json($events);
    }
}
