<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Playlist;

class OurPlaylistController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $playlist = Playlist::all();
            return view('home', array('playlist' => $playlist));
        }else{
            return redirect('/');
        }
    }
    
    public function create(Request $request)
    {
        $method = $request->method();
        if(Auth::check())
        {
            if($request->isMethod('get')){
                return view('playlist_create');
            }else{
                $data = [
                    'user_id' => $request->input('id'),
                    'name' => $request->input('name')
                ];
                Playlist::firstOrCreate($data);

                return view('home');
            }

        }else{
            return redirect('/');
        }
    }

    public function show($id)
    {
        $playlist = Playlist::find($id);
        return view('playlist_show', array('playlist'=> $playlist));
    }
}
