<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Society;

class TrackingController extends Controller
{
    public function trackReferrals($slug)
    {
        $soc = Society::whereSlug($slug)->firstOrFail();

        if ($soc->website){
            $soc->referrals++;
            $soc->save();
            $http = starts_with($soc->website, 'http://');
            $https = starts_with($soc->website, 'https://');
            if ($http || $https)
                return redirect($soc->website);
            else
                return redirect('http://'.$soc->website);
        }
    }
}
