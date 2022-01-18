<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use App\Admin;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\EstateAgent;
use App\Solicitor;
use App\Lender;
use App\Capacity;
use App\System;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        return redirect("admin/SolicitorListView");
    }
    public function logout()
    {
        Auth::logout();
        \Session::flush();
        return redirect("/admin");
    }
    public function SettingView(){
        return view("admin.setting.view");
    }
    public function EditSettingView()
    {
        return view("admin.setting.edit");
    }
    public function EditSettingPost(Request $request)
    {
        $rules = array(
            'name'     => 'required',
            'password'      => 'required|confirmed|min:6',
            'email'         => 'required|email|unique:admins,email,'.Auth::user()->id
        );
        $validator = Validator::make($request->all(), $rules)->validate();

        $admin = Auth::user();
        $admin->name = $request['name'];
        $admin->email = $request['email'];
        if ($request['password'] != "******")
            $admin->password = bcrypt($request['password']);
        $admin->save();

        return redirect("admin/SettingView");
    }

    public function SolicitorListView(){
        $solicitors = Solicitor::all();
        return view("admin.solicitor.list")->with("solicitors", $solicitors);
    }
    public function SolicitorAddView(){
        return view("admin.solicitor.add");
    }
    public function SolicitorAddPost(Request $request){
        $solicitor = new Solicitor();
        $solicitor->name = $request['name'];
        $solicitor->branch_name = $request['branch_name'];
        $solicitor->address1 = $request['address1'];
        $solicitor->address2 = $request['address2'];
        $solicitor->address3 = $request['address3'];
        $solicitor->county = $request['county'];
        $solicitor->postcode = $request['postcode'];
        $solicitor->branch_manager = $request['branch_manager'];
        $solicitor->new_build = $request['new_build']?true:false;
        $solicitor->auction_property = $request['auction_property']?true:false;
        $solicitor->company_transaction = $request['company_transaction']?true:false;
        $solicitor->status = 1;
        $solicitor->capacity = 0;
        $solicitor->save();

        return redirect("admin/SolicitorListView");
    }
    public function SolicitorEditView($id){
        $solicitor = Solicitor::where("id", $id)->first();
        return view("admin.solicitor.edit")->with("solicitor", $solicitor);
    }
    public function SolicitorEditPost(Request $request){
        $solicitor = Solicitor::where("id", $request['id'])->first();
        $solicitor->name = $request['name'];
        $solicitor->branch_name = $request['branch_name'];
        $solicitor->address1 = $request['address1'];
        $solicitor->address2 = $request['address2'];
        $solicitor->address3 = $request['address3'];
        $solicitor->county = $request['county'];
        $solicitor->postcode = $request['postcode'];
        $solicitor->branch_manager = $request['branch_manager'];
        $solicitor->new_build = $request['new_build']?true:false;
        $solicitor->auction_property = $request['auction_property']?true:false;
        $solicitor->company_transaction = $request['company_transaction']?true:false;
        $solicitor->save();
        return redirect("admin/SolicitorListView");
    }
    public function SolicitorRemovePost(Request $request){
        Solicitor::where("id", $request['id'])->delete();
        return redirect("admin/SolicitorListView");
    }

    public function EstateAgentListView(){
        $estate_agents = EstateAgent::all();
        return view("admin.estateagent.list")->with("estate_agents", $estate_agents);
    }
    public function EstateAgentAddView(){
        return view("admin.estateagent.add");
    }
    public function EstateAgentAddPost(Request $request){
        $estate_agent = new EstateAgent();
        $estate_agent->name = $request['name'];
        $estate_agent->branch_name = $request['branch_name'];
        $estate_agent->address1 = $request['address1'];
        $estate_agent->address2 = $request['address2'];
        $estate_agent->address3 = $request['address3'];
        $estate_agent->county = $request['county'];
        $estate_agent->postcode = $request['postcode'];
        $estate_agent->branch_manager = $request['branch_manager'];
        $estate_agent->save();

        return redirect("admin/EstateAgentListView");
    }
    public function EstateAgentEditView($id){
        $estate_agent = EstateAgent::where("id", $id)->first();
        return view("admin.estateagent.edit")->with("estate_agent", $estate_agent);
    }
    public function EstateAgentEditPost(Request $request){
        $estate_agent = EstateAgent::where("id", $request['id'])->first();
        $estate_agent->name = $request['name'];
        $estate_agent->branch_name = $request['branch_name'];
        $estate_agent->address1 = $request['address1'];
        $estate_agent->address2 = $request['address2'];
        $estate_agent->address3 = $request['address3'];
        $estate_agent->county = $request['county'];
        $estate_agent->postcode = $request['postcode'];
        $estate_agent->branch_manager = $request['branch_manager'];
        $estate_agent->save();
        return redirect("admin/EstateAgentListView");
    }
    public function EstateAgentRemovePost(Request $request){
        EstateAgent::where("id", $request['id'])->delete();
        return redirect("admin/EstateAgentListView");
    }

    public function LenderListView(){
        $lenders = Lender::all();
        return view("admin.lender.list")->with("lenders", $lenders);
    }
    public function LenderAddView(){
        return view("admin.lender.add");
    }
    public function LenderAddPost(Request $request){
        $lender = new Lender();
        $lender->name = $request['name'];
        $lender->save();

        return redirect("admin/LenderListView");
    }
    public function LenderEditView($id){
        $lender = Lender::where("id", $id)->first();
        return view("admin.lender.edit")->with("lender", $lender);
    }
    public function LenderEditPost(Request $request){
        $lender = Lender::where("id", $request['id'])->first();
        $lender->name = $request['name'];
        $lender->save();
        return redirect("admin/LenderListView");
    }
    public function LenderRemovePost(Request $request){
        Lender::where("id", $request['id'])->delete();
        return redirect("admin/LenderListView");
    }

    public function LinkESView(Request $request){
        return view("admin.link.ES"); 
    }
    public function GetESSelected(Request $request){
        $estate_agent = EstateAgent::where("id", $request['id'])->first();
        echo json_encode($estate_agent->link_with_solicitor);
    }
    public function LinkESPost(Request $request){

        $estate_agent = EstateAgent::where("id", $request['estate_agent'])->first();
        $estate_agent->link_with_solicitor = $request['solicitor']?implode(",", $request['solicitor']):"";
        $estate_agent->save();

        return redirect("admin/LinkESView");
    }

    public function LinkLSView(Request $request){
        return view("admin.link.LS"); 
    }
    public function GetLSSelected(Request $request){
        $solicitor = Solicitor::where("id", $request['id'])->first();
        echo json_encode($solicitor->link_with_lender);
    }
    public function LinkLSPost(Request $request){

        $solicitor = Solicitor::where("id", $request['solicitor'])->first();
        $solicitor->link_with_lender = $request['lender']?implode(",", $request['lender']):"";
        $solicitor->save();

        return redirect("admin/LinkLSView");
    }

    public function FirmCapacityListView(){
        return view("admin.solicitor.capacitylist");
    }
    public function EditCurrentCapacity(Request $request){
        $solicitor = Solicitor::where("id", $request['id'])->first();
        $solicitor->capacity = $request['capacity'];
        $solicitor->last_updated = date("d/m/Y");
        $solicitor->save();

        return redirect("admin/FirmCapacityListView");
    }
    public function EditWeeklyCapacity(Request $request){
        $solicitor = Solicitor::where("id", $request['id'])->first();
        $solicitor->weekly_capacity = $request['weekly_capacity'];
        $solicitor->save();

        return redirect("admin/FirmCapacityListView");
    }
    public function SetFirmState(Request $request){

        $solicitor = Solicitor::where("id", $request['id'])->first();
        $solicitor->status = $request['val'];
        $solicitor->save();

        echo json_encode($request['val']);
    }
    public function SystemPasswordSetView(){
        return view("admin.setting.syspassword");
    }
    public function EditSystemPasswordSetPost(Request $request){
        $system = System::first();
        $system->password = $request['password'];
        $system->save();

        return redirect()->back();
    }
    public function GetCapcity(){
        $solicitors = Solicitor::all();
        echo json_encode($solicitors);
    }
}
