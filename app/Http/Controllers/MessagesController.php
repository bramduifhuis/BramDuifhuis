<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Messages::select("messages.*", "users.name")->join('users', 'messages.user_id', '=', 'users.id')->orderBy('messages.created_at', 'desc')->get();
        
        return view('index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        // $validatedData->merge(["user_id"=>auth()->id()]);
        $data = $request->all();
        $data["user_id"] = auth()->id();
        

        $show = Messages::create($data);
   
        return redirect('/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Messages $messages, $id)
    {
        $post = Messages::select("messages.*", "users.name")->join('users', 'messages.user_id', '=', 'users.id')->where('messages.id', "=", $id)->first();
        
        
        return view('show',compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(Messages $messages, $id)
    {
        $post = Messages::select("messages.*", "users.name")->join('users', 'messages.user_id', '=', 'users.id')->where('messages.id', "=", $id)->first();
        return view("edit", compact("post"));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        
        // $data = $request->all();
        // $data["user_id"] = auth()->id();
        Messages::whereId($id)->update($validatedData);

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messages $messages, $id)
    {
        $post = Messages::findOrFail($id);
        $post->delete();
        return redirect('/posts');

    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function stats(Messages $messages)
    {
       $stats =[ "messageCount" => Messages::count(),
       "userCount"=>  User::count(),
    ];
        return view('welcome',compact('stats'));
    }

    public function dashboard(Messages $messages)
    {
        $posts = Messages::select("messages.*", "users.name")->join('users', 'messages.user_id', '=', 'users.id')->where('users.id', "=", auth()->id())->get();
        return view('dashboard',compact('posts'));
        

    }
}
