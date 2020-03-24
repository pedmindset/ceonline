<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Service;
use App\Models\Salvation;
use App\Models\Attendance;
use App\Models\FirstTimer;
use Illuminate\Http\Request;
use App\Models\PaymentCategory;
use Merujan99\LaravelVideoEmbed\Facades\LaravelVideoEmbed;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $service = $this->service_with_video();
      
        $this->check_attendance($service);

        $video_iframe = $this->video_parse($service);

        $services = Service::latest()
                            ->with('servicetype', 'announcements')
                            ->limit(7)
                            ->get();

        $payment_categories = PaymentCategory::all();

        $timezone = geoip($request->ip());
        $timezone = $timezone['timezone'];

        return view('users.liveservice', compact('service', 'services', 'user','video_iframe', 'timezone', 'payment_categories'));
    }


    private function service_with_video(){
        $service = Service::has('videos')->with(['videos', 'comments'=> function($q){
             $q->latest();
             $q->with('user');
        }])->latest()->first();      
        
        // dd($service);

        return $service;
    }

    private function check_attendance($service)
    {
        $user = auth()->user();
        
        $check_attendance = Attendance::where('user_id', $user->id)
        ->where('service_id', $service->id)->latest()->first();

        if($check_attendance){
            $check_attendance->count = 1;
            $check_attendance->service_id = $service->id;
        }else{
            $attendance = new Attendance;
            $attendance->user_id = $user->id;
            $attendance->service_id = $service->id;
            $attendance->count = 1;
            $attendance->save();
        }
    }


    private function video_parse(Service $service)
    {
        if($service->platform != 'imm' & $service->platform != null & $service->link != null){
             //URL to be used for embed generation
            $url = $service->link;

            //Optional array of website names, if present any websites not in the array will result in false being returned by the parser
            $whitelist = ['YouTube', 'Vimeo', 'Facebook', 'Local Content'];

            //Optional parameters to be appended to embed
            $params = [
                'autoplay' => 1,
            ];

            //Optional attributes for embed container
            $attributes = [
            'type' => null,
            'class' => 'w-full h-video ',
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
            'service' => 'required',
            'user' => 'required',
            'church' => 'required',
        ]);
        
        $comment = new Comment;
        $comment->church_id = $request->church;
        $comment->service_id = $request->service;
        $comment->user_id = $request->user;
        $comment->message = $request->message;
        $comment->save();

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

        $service = Service::where('id', $id)->with(['videos', 'comments'=> function($q){
            $q->latest();
                $q->with('user');
        }])->latest()->first();

        if(!$service->videos()->exists() & $service->platform != 'youtube' & !empty($service->link))
        {
            toastr()->warning('Select Service video has not been uploaded yet')->success('You have been redirected to another service');

            $service = $this->service_with_video();
        }
      
        $this->check_attendance($service);

        $video_iframe = $this->video_parse($service);

        $services = Service::latest()
                            ->with('servicetype', 'announcements')
                            ->limit(7)
                            ->get();

        $payment_categories = PaymentCategory::all();



        $timezone = geoip($request->ip());
        $timezone = $timezone['timezone'];

        return view('users.liveservice', compact('service', 'services', 'user','video_iframe', 'timezone', 'payment_categories'));
    }

    public function first_timer(Request $request)
    {
        $user = $request->user();
        $first_timer = new FirstTimer;
        $first_timer->church_id = $request->church;
        $first_timer->service_id = $request->service;
        $first_timer->name = $user->name;
        $first_timer->user_id = $user->id;
        $first_timer->save(); 

        return response()->json([
            'message' => 'success',
            'code' => 100
        ]);

    }


    public function salvation(Request $request)
    {
        $user = $request->user();
        $salvation = new Salvation;
        $salvation->church_id = $request->church;
        $salvation->service_id = $request->service;
        $salvation->name = $user->name;
        $salvation->user_id = $user->id;
        $firssalvationt_timer->save(); 

        return response()->json([
            'message' => 'success',
            'code' => 100
        ]);

    }

  
}
