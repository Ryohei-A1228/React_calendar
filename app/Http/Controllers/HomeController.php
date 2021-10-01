<?php

namespace App\Http\Controllers;

use Date;
use Datetime;
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
        $this->middleware('verified');
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
        $follows = Follow::where('user_id', Auth::user()->id)->join('users', 'follows.user_following_id', '=', 'users.id')->get();
        $relations = [] ;
        array_push($relations, Auth::user()->id);
        foreach ($follows as $follow) {
            array_push($relations, $follow->id);
        }
        $events = Event::whereIn('user_id', $relations)->with('user')->get();

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
        if (Auth::id() != $event->user_id) {
            abort(403);
        }
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
        if (!isset($user)) {
            abort(403, 'User Not Found');
        }
        $follow = new Follow;
        $follow->user()->associate(Auth::user());
        $follow->user_following_id = $user->id;
        $follow->save();

        return redirect()->to('/home');
    }

    /**
     * フォロー取得
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function followGet()
    {
        $follows = Follow::where('user_id', Auth::user()->id)->join('users', 'follows.user_following_id', '=', 'users.id')->get();

        return response()->json($follows);
    }

    /**
     * google連携
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function googleEventGet(Request $request, User $user)
    {
        // 取得したAPIキー??メアドとパスワードで行けるか
        $api_key = $request->input('api');
        // カレンダーID??email-address
        $calendar_id = urlencode($request->input('email'));
        // データの開始日
        $start = date('2021-01-01\T00:00:00\Z');
        // データの終了日
        $end = date('2021-12-31\T00:00:00\Z');
        
        $url = "https://www.googleapis.com/calendar/v3/calendars/" . $calendar_id . "/events?";
        $query = [
            'key' => $api_key,
            'timeMin' => $start,
            'timeMax' => $end,
            'maxResults' => 50,
            'orderBy' => 'startTime',
            'singleEvents' => 'true'
        ];
        
        $results = [];
        if ($data = file_get_contents($url. http_build_query($query), true)) {
            $data = json_decode($data);
            //dd($data);
            foreach ($data->items as $row) {
                // 終日予定はdateプロパティ、時刻指定はdateTimeプロパティにデータがはいっている
                $start = new DateTime(property_exists($row->start,'date')?$row->start->date:$row->start->dateTime);
                $end   = new DateTime(property_exists($row->end,'date')?$row->end->date:$row->end->dateTime);
                $start_date = $start->format('Ymd');
                $end_date = $end->format('Ymd');

                if($start_date !== $end_date) {
                    $result = [
                        'title' => (string)$row->summary,
                        'user_id' => Auth::id(),
                        'date' => $start_date,
                        'start_time' => intval($start->format('H')),
                        'end_time' => 24
                    ];
                    array_push($results, $result); //初日

                    $roop_start = date('Ymd', strtotime($start_date . '+1 day'));

                    for ($i = $roop_start; $i < $end_date; $i = date('Ymd', strtotime($i . '+1 day'))) {
                        $result = [
                            'title' => (string)$row->summary,
                            'user_id' => Auth::id(),
                            'date' => $i,
                            'start_time' => 0,
                            'end_time' => 24
                        ];
                        array_push($results, $result); //中日

                    }

                    $result = [
                        'title' => (string)$row->summary,
                        'user_id' => Auth::id(),
                        'date' => $end_date,
                        'start_time' => 0,
                        'end_time' => intval($end->format('H'))
                    ];
                    array_push($results, $result); //最終日

                } else {
                    $result = [
                        'title' => (string)$row->summary,
                        'user_id' => Auth::id(),
                        'date' => $start->format('Ymd'),
                        'start_time' => intval($start->format('H')),
                        'end_time' => intval($end->format('H'))
                    ];
                    array_push($results, $result); //当日終わり

                }
            }
        }

        foreach ($results as $key => $result) {
            $event = new Event;
            $event->title = $result['title'];
            $event->user_id = $result['user_id'];
            $event->date = $result['date'];
            $event->start_time = $result['start_time'];
            $event->end_time = $result['end_time'];
            $event->save();
        }

        return redirect()->to('/home');
        
    }



}
