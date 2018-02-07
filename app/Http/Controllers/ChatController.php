<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Events\ChatMessage;
use App\Message;

class ChatController extends Controller
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
     * Send chat message
     * @param $request
     * @return void
     */
    public function sendMessage(Request $request)
    {

        $this->validate($request, [
        'id' => 'required',
        'message' => 'required',
        ]);
        $user = Auth::user();
        $message =[
            "id" => $request->id,
            "sourceuserid" => $user->id,
            "name" => $user->name,
            "message" => $request->message
        ];
        $message1 = Message::create([
            "id" => $request->id,     //receiver id
            "sourceuserid" => $user->id,
            "name" => $user->name,
            "message" => $request->message
        ]);

        event(new ChatMessage($message));
        return "true";
    }

    public function chatPage()
    {

        $users = User::where('usertype','parent')->get();
         $users2 = User::where('usertype','teacher')->get();

        return view('chat',['users'=> $users],['users2'=> $users2]);
    }

    public function fetchMessages(Request $request)
    {
      $this->validate($request, [
      'id' => 'required',
      ]);

      $recieverid = $request->id;
      $user = Auth::user();
      $message = DB::table('messages')
      ->Where(function ($query) use ($recieverid,$user) {
                $query->where('sourceuserid', $user->id)
                ->where('id', $recieverid);
            })
      ->orWhere(function ($query) use ($recieverid,$user){
                $query->where('sourceuserid', $recieverid)
                      ->where('id', $user->id);
            })
            ->get();
      // ->pluck('message');
      return $message;
    }
}
