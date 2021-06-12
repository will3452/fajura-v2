<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilePictureUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'picture'=>'required|image' 
        ]);

        $user->profile->update([
            'picture'=>$data['picture']->store('/public/profile')
        ]);
        toast('Profile picture changed!', 'success');
        return back();
    }
}
