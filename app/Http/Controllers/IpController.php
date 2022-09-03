<?php

namespace App\Http\Controllers;

use App\Jobs\IpJob;
use App\Models\Site;
use Illuminate\Http\Request;
use App\Models\User;

class IpController extends Controller
{    
    /**
     * Method sendIps
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function sendIps(Request $request)
    {
        $validated = $request->validate([
            'siteName' => 'required|max:255'
        ]);

    dispatch(new IpJob($request->siteName));

    return redirect()->route('allSites');
  
    }
    
    /**
     * Method allSites
     *
     * @return void
     */
    public function allSites()
    {
        $allowedRequests = Site::all();
        return view('allSites',compact('allowedRequests'));
    }

}
