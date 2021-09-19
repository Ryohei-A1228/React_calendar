<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Follow;
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

        return redirect()->to('/home');
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

    /**
     * イベント削除
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function eventDelete(Request $request, Event $event)
    {
        $id = $request->input('id'); 
        $event = Event::find($id);
        $event->delete();

        return redirect()->to('/home');
    }

    /**
     * 友達追加
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function friendAdd(Request $request, User $user)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $user = User::where('name', $name)->where('email', $email)->first();
        $follow = new Follow;
        $follow->user()->associate(Auth::user());
        $follow->user_following_id = $user->id;
        $follow->save();

        return redirect()->to('/home');
    }
}
