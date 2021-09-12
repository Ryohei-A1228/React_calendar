<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        dd($request->request);

        return view('home');
    }

    /**
     * イベント取得
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function eventGet(Request $request)
    {
        $events=[
            [
                "name"=>'ボブ',
                "title"=> 'バイト',
                "date"=>'20210912',
                "time"=> '17'
            ]
        ];

        return response()->json($events);
    }
}
