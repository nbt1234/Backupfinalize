<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// use App\Models\;

class Tournament extends Controller
{
    public function index()
    {
        $result = DB::table(TOURNAMENT)->get();
        return view('admin/tournament/index')->with(compact('result'));
    }

    public function add_tournament()
    {
        return view('admin/tournament/add-tournament');
    }

    public function save_tournament(Request $request)
    {
      
        $request->validate([
            'tournament_name' => 'required',
            'tournament_date' => 'required',
            'tournament_time' => 'required',
            'registration_start_date' => 'required',
            'registration_end_date' => 'required',
            'players' => 'required',
            'amount' => 'required',
            'status' => 'required'
        ]);

        $inputs = $request->input();

        $data = array(
            'tournament_id' => Str::random(20),
            'tournament_name' => $inputs['tournament_name'],
            'tournament_date' => $inputs['tournament_date'],
            'tournament_time' => $inputs['tournament_time'],
            'registration_start_date' => $inputs['registration_start_date'],
            'registration_end_date' => $inputs['registration_end_date'],
            'players' => $inputs['players'],
            'amount' => $inputs['amount'],
            'status' => $inputs['status']
            
        );
          
        $result = DB::table(TOURNAMENT)->insert($data);

        if ($result) {
            return redirect('finalize-site-admin/tournament')->with('flash-success', 'tournament add successfully');
        } else {
            return redirect('finalize-site-admin/tournament')->with('flash-error', 'Some error occured in edit privacy-policy');
        }

    }

    public function edit_tournament($id)
    {
        $result = DB::table(TOURNAMENT)->where('id', $id)->get();
        return view('admin/tournament/edit-tournament')->with(compact('result'));

    }

    public function update_tournament(Request $request, $id)
    {
        $request->validate([
            'tournament_name' => 'required',
            'tournament_date' => 'required',
            'tournament_time' => 'required',
            'registration_start_date' => 'required',
            'registration_end_date' => 'required',
            'players' => 'required',
            'amount' => 'required',
            'status' => 'required'
        ]);

        $inputs = $request->input();

        $data = array(
            'tournament_name' => $inputs['tournament_name'],
            'tournament_date' => $inputs['tournament_date'],
            'tournament_time' => $inputs['tournament_time'],
            'registration_start_date' => $inputs['registration_start_date'],
            'registration_end_date' => $inputs['registration_end_date'],
            'players' => $inputs['players'],
            'amount' => $inputs['amount'],
            'status' => $inputs['status']
           
        );
          
        $result = DB::table(TOURNAMENT)->where('id', $id)->update($data);

        if ($result) {
            return redirect('finalize-site-admin/tournament')->with('flash-success', 'tournament update successfully');
        } else {
            return redirect('finalize-site-admin/tournament')->with('flash-error', 'tournament not update');
        }

    }


     public function delete_tournament($id){

     $data = DB::table(TOURNAMENT)->where('id',$id)->delete();
     return redirect('finalize-site-admin/tournament')->with('flash-success', 'tournament update successfully');
   
        }




}
