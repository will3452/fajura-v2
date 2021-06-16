<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function showNotifications(){
        $notifications = auth()->user()->notifications()->latest()->paginate(10);
        return view('notifications.show', compact('notifications'));
    }

    public function updateNotification($id){
        //just check first if he/she has notification with that given Id
        $notif = auth()->user()->notifications()->findOrFail($id);

        $notif->markAsRead();

        if(request()->has('goto_link')){
            return redirect(request()->goto_link);
        }else {
            toast('Mark as read, succesfully !', 'success');
            return back();
        }
    }

    public function clearNotification(){
        auth()->user()->notifications()->delete();
        toast('Notifications cleared!', 'success');
        return back();
    }
}
