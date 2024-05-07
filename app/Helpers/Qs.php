<?php
//
//namespace App\Helpers;
//use Auth;
//use App\Models\Company;
//use Mail;
//class Qs{
//
////    public static function getTeamAdmin()
////    {
////        return ['admin', 'super_admin', ];
////    }
////    public static function userIsAdmin()
////    {
////        return in_array(Auth::user()->user_type, self::getTeamAdmin());
////    }
//
//    public static function getOwner()
//    {
//        return ['admin'];
//    }
//    public static function userIsAdmin()
//    {
//        return in_array(Auth::user()->user_type, self::getOwner());
//    }
//    public static function getWorker()
//    {
//        return ['worker'];
//    }
//    public static function userIsWorker()
//    {
//        return in_array(Auth::user()->user_type, self::getWorker());
//    }
//    public static function getManager()
//    {
//        return ['manager'];
//    }
//    public static function userIsManager()
//    {
//        return in_array(Auth::user()->user_type, self::getManager());
//    }
//    public static function getClient()
//    {
//        return ['client'];
//    }
//
//    //    For Matching Request Purpose
//    public static function RequestIsManager($user_type)
//    {
//        return in_array($user_type, self::getManager());
//    }
//    public static function RequestIsOwner($user_type)
//    {
//        return in_array($user_type, self::getOwner());
//    }
//    public static function RequestIsEmploy($user_type)
//    {
//        return in_array($user_type, self::getEmployee());
//    }
//    //    For Matching Request Purpose
//
//
////    public static function getSendMail($email,$order_id =Null,$user_id=Null,$template_name ,$subject="Welcome To Emirati Coffee Wholesale",$detail=Null)
////    {
////
////        $user_name='';
////        $ids='';
////        $details['subject']=$subject;
////        $details['template']=$template_name;
////        $details['details']=$detail;
////        $details['product_detail']= url('/contract/'.$user_id);
////
////        $details['order']=$order_id;
//////dd($details);
////        \Mail::to($email)->send(new \App\Mail\customeMail($details));
////
////    }
//}
//
