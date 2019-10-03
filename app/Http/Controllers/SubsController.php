<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscrRequest;
use App\Mail\SubscribeEmail;
use App\Subscription;
use Illuminate\Http\Request;

class SubsController extends Controller
{
    public function subscribe(SubscrRequest $request)
    {
        $subs = Subscription::add($request->get('email'));
        $subs->generateToken();

        \Mail::to($subs)->send(new SubscribeEmail($subs));

       return redirect()->back()->with('status', 'Проверьте вашу почту!');
    }

    public function verify($token)
    {
        $subs = Subscription::where('token', $token)->firstorFail();
        $subs->token = null;
        $subs->save();

        return redirect('/')->with('status', 'Ваша почта подтверждена!');
    }
}
