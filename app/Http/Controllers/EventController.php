<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Salvation;
use App\Events\NewComment;
use App\Models\Attendance;
use App\Models\FirstTimer;
use Illuminate\Http\Request;
use App\Models\PaymentCategory;
use Illuminate\Support\Facades\Auth;
use Merujan99\LaravelVideoEmbed\Facades\LaravelVideoEmbed;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $event = $this->Event_with_video();
        
        $video_iframe = $this->video_parse($event);

        $events = Event::latest()
                            ->limit(7)
                            ->get();

        $payment_categories = PaymentCategory::all();

        $timezone = geoip($request->ip());
        $timezone = $timezone['timezone'];

        return view('users.liveEvent', compact('Event', 'Events', 'user','video_iframe', 'timezone', 'payment_categories'));
    }


    private function Event_with_video(){
        $event = Event::has('videos')->with(['videos', 'comments'=> function($q){
             $q->latest();
             $q->with('user');
        }])->latest()->first();

        // dd($event);

        return $event;
    }

    private function check_attendance($event)
    {
        $user = auth()->user();

        $check_attendance = Attendance::where('user_id', $user->id)
        ->where('Event_id', $event->id)->latest()->first();

        if($check_attendance){
            $check_attendance->count = 1;
            $check_attendance->Event_id = $event->id;
            $check_attendance->updated_at = now()->toDateTimeString();

        }else{
            $attendance = new Attendance;
            $attendance->user_id = $user->id;
            $attendance->Event_id = $event->id;
            $attendance->count = 1;
            $attendance->save();
        }
    }


    private function video_parse(Event $event)
    {
        if($event->platform != 'imm' & $event->platform != null & $event->link != null){
             //URL to be used for embed generation
            $url = $event->link;

            //Optional array of website names, if present any websites not in the array will result in false being returned by the parser
            $whitelist = ['YouTube', 'Vimeo', 'Facebook', 'Local Content'];

            //Optional parameters to be appended to embed
            $params = [
                'rel' => 0
             ];

            //Optional attributes for embed container
            $attributes = [
            'type' => null,
            'class' => 'w-full sm:h-video',
            'data-html5-parameter' => true
            ];



            $video_iframe =  LaravelVideoEmbed::parse($url, $whitelist, $params, $attributes);

            return $video_iframe;
            // dd($video_iframe);
            //<iframe src="https://www.youtube.com/embed/8eK-5ivYb3o?wmode=transparent&amp;autoplay=1&amp;loop=1" type="" width="480" height="295" frameborder="0" allowfullscreen class="iframe-class" data-html5-parameter></iframe>

            // return LaravelVideoEmbed::getYoutubeThumbnail($url)
            // //https://<youtube image thumbnail with max resolution>. usage: <img src="{{ LaravelVideoEmbed::getYoutubeThumbnail($url) }}">

         }

         return false;
    }

        /**
     * Post a comment
     *
     * @return \Illuminate\Http\Response
     */
    public function post_comment(Request $request)
    {
        $validateDate = $request->validate([
            'church' => 'required',
            'Event' => 'required',
            'user' => 'required',
            'church' => 'required',
        ]);

        $comment = new Comment;
        $comment->church_id = $request->church;
        $comment->Event_id = $request->Event;
        $comment->user_id = $request->user;
        $comment->message = $request->message;
        $comment->save();

        broadcast(new NewComment($comment))->toOthers();

        $comment = Comment::where('id', $comment->id)->with('user')->first();

        return response()->json($comment);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = $request->user();

        $event = Event::where('id', $id)->with(['videos', 'comments'=> function($q){
            $q->latest();
                $q->with('user');
        }])->latest()->first();

        if(!$event->videos()->exists() & $event->platform != 'youtube' & !empty($event->link))
        {
            toastr()->warning('Select Event video has not been uploaded yet')->success('You have been redirected to another Event');

            $event = $this->Event_with_video();
        }

        $this->check_attendance($event);

        $video_iframe = $this->video_parse($event);

        $events = Event::latest()
                            ->with('Eventtype', 'announcements')
                            ->limit(7)
                            ->get();

        $payment_categories = PaymentCategory::all();



        $timezone = geoip($request->ip());
        $timezone = $timezone['timezone'];

        return view('users.liveEvent', compact('Event', 'Events', 'user','video_iframe', 'timezone', 'payment_categories'));
    }

    public function first_timer(Request $request)
    {
        $user = $request->user();

        $check = $user->first_timer()->exists();
        if($check){
            return response()->json([
                'message' => 'Already a first timer',
                'code' => 100
            ]);

        }else{
            $first_timer = new FirstTimer;
            $first_timer->church_id = $user->church_id;
            $first_timer->Event_id = $request->Event;
            $first_timer->name = $user->name;
            $first_timer->user_id = $user->id;
            $first_timer->save();

            return response()->json([
                'message' => 'A Pastor will contact you shortly',
                'code' => 100
            ]);
        }

    }


    public function salvation(Request $request)
    {
        $user = $request->user();

        $check = $user->salvation()->exists();
        if($check){

            return response()->json([
                'message' => 'Already been saved',
                'code' => 100
            ]);

        }else{

            $salvation = new Salvation;
            $salvation->church_id = $user->church_id;
            $salvation->Event_id = $request->Event;
            $salvation->name = $user->name;
            $salvation->user_id = $user->id;
            $salvation->save();
        }


        return response()->json([
            'message' => 'A Pastor will contact you shortly',
            'code' => 100
        ]);

    }

    public function invites()
    {
        $payment_categories = PaymentCategory::all();

        $event = Event::latest()->first();

        $user = Auth::user();

        $invites = Invite::where('owner_id', Auth::id())
                            ->with('user')
                            ->get();

        $total_year = Invite::where('owner_id', Auth::id())
                        ->whereBetween('created_at', [
                            now()->copy()->startOfYear()->toDateTimeString(),
                            now()->copy()->endOfYear()->toDateTimeString(),
                        ])
                        ->count();

        $total_month = Invite::where('owner_id', Auth::id())
        ->whereBetween('created_at', [
            now()->copy()->startOfMonth()->toDateTimeString(),
            now()->copy()->endOfMonth()->toDateTimeString(),
        ])
        ->count();

        $total_week = Invite::where('owner_id', Auth::id())
        ->whereBetween('created_at', [
            now()->copy()->startOfWeek()->toDateTimeString(),
            now()->copy()->endOfWeek()->toDateTimeString(),
        ])
        ->count();

        $total_day = Invite::where('owner_id', Auth::id())
        ->whereBetween('created_at', [
            now()->copy()->startOfDay()->toDateTimeString(),
            now()->copy()->endOfDay()->toDateTimeString(),
        ])
        ->count();

        $total_ = Invite::where('owner_id', Auth::id())->count();


        return view('users.invites', compact('invites', 'total_year', 'total_month', 'total_week', 'total_day', 'payment_categories', 'user', 'Event'));
    }


}
