<?php

namespace App\Http\Controllers;

use App\Mail\AdMail;
use App\Mail\Message;
use App\Models\Ad;
use App\Models\SecretMessage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdController extends Controller
{

    public function newAd(Request $request)
    {

        $validated = $request->validate([
            'title'=> 'required|min:3',
            'description'=> 'required|min:15',
            'location'=> 'required',
            'price'=> 'required|decimal:2',
            'name'=> 'required|',
            'email' => 'required|email',

        ]);

        $token = Str::random(40);
        $data = [
            'link' => url('/ad-validation/' . $token)
        ];

        $ad = new Ad();
        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->location = $request->location;
        $ad->price = $request->price;
        $ad->name = $request->name;
        $ad->email = $request->email;
        $ad->token = $token;
        $ad->status = 0;
        $ad->save();

        Mail::to($request->email)->send(new AdMail($data));

        return redirect('/new')->with('status', 'Annonce enregistrée ! Cliquez sur le lien reçu à ' . $request->email . ' pour la publier');
    }

    public function validateAd($token)
    {
        try{
            $ad = Ad::where('token', $token)->firstOrFail();
            $ad->status = 1;
            $ad->save();
            return redirect('/')->with('status', 'Annonce publiée !');
        } catch (ModelNotFoundException $exception){
            return redirect('/')->with('status', 'Erreur');
        }


    }
    public function showAll()
    {
        $ads = Ad::where('status', 1)->get();
        return view('/index', compact('ads'));
    }

    public function show($token)
    {
        try{
            $ad = Ad::where('token', $token)->firstOrFail();
            return view('/ad', compact('ad'));
        } catch (ModelNotFoundException $exception){
            return redirect('/')->with('status', 'Erreur');
        }
    }

    public function delete($token)
        {
            try{
                $ad = Ad::where('token', $token)->firstOrFail();
                $ad->delete();
                return redirect('/')->with('status', 'Annonce supprimée !');
            } catch (ModelNotFoundException $exception){
                return redirect('/')->with('status', 'Erreur de suppression');
            }
        }

}
