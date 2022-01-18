<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\System;
use App\Solicitor;
use App\EstateAgent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function LoginWithPassword(){
        return view("loginwithpassword");
    }
    public function LoginWithPasswordPost(Request $request){
        $system = System::first();
        if ($request["login-password"] == $system->password){
            \Session::put("login_status", "Login");
            return redirect("home");
        }
        return redirect()->back()->withErrors(['Your entered password is incorrect.']);
    }
    public function LogoutWithPassword(){
        \Session::put("login_status", "Logout");
        return redirect()->back();
    }
    public function findsolicitorpost(Request $request){
        $estate_agent_id = $request['estate_agent'];
        $lender_id = $request['lender'];
        $new_build = $request['new_build'];
        $auction_property = $request['auction_property'];
        $company_transaction = $request['company_transaction'];

        //echo json_encode(array($estate_agent_id, $lender_id, $new_build));

        $estate_agent = EstateAgent::where("id", $estate_agent_id)->first();
        $links = [];
        if ($estate_agent->link_with_solicitor != "")
            $links = explode(",", $estate_agent->link_with_solicitor);

        $solicitors = Solicitor::whereIn("id", $links)->where("status", 1);
        if ($new_build == "yes"){
            $solicitors->where("new_build", 1);    
        }
        if ($auction_property == "yes"){
            $solicitors->where("auction_property", 1);    
        }
        if ($company_transaction == "yes"){
            $solicitors->where("company_transaction", 1);    
        }

        if ($lender_id != 0)
            $solicitors = $solicitors->where(function($query) use ($lender_id){
                                            $query->where("link_with_lender", "like", "%,".$lender_id.",%")
                                                  ->orWhere("link_with_lender", "like", "%,".$lender_id)
                                                  ->orWhere("link_with_lender", "like", $lender_id.",%")
                                                  ->orWhere("link_with_lender", "=", $lender_id);
                                       });
        $solicitors = $solicitors->get();

        echo json_encode($solicitors);
    }
    public function allocateSolicitor(Request $request){
        $solicitor = Solicitor::where("id", $request['id'])->first();
        $solicitor->capacity -= 1;
        $solicitor->save();

        return redirect()->back();
    }
}
