<?php

namespace App\Helpers;
use App\Helpers\Qs;
use App\Models\OwnerProfile;
use Auth;
use App\Models\Company;
use Mail;
class Sc{


    public static function getCompanybyOwner()
    {

       if( Qs::userIsOwner()){
           $company = Company::where('userID',Auth()->user()->id)->get()->first();
       }else{
           $company = Company::where('userID',Auth()->user()->ownerID)->get()->first();
       }
        return $company;
    }
    public static function getUserProfile()
    {
        $profile = OwnerProfile::where('userID',Auth()->user()->id)->get()->first();
        return $profile;
    }
}

