<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class DistributorController extends Controller
{

    public function adddistributor()
    {
        return view('distributor.adddistributor');
    }

    public function distributors()
    {
        $userid = Auth::user()->id;

        if( Auth::user()->user_type_id == 1 ) {

        $distributors = DB::table('users')->where( 'user_type_id', '=', 3)->orderBy( 'id', 'Asc' )->get();;

        }

        if( Auth::user()->user_type_id == 2 ) {

        $distributors = DB::table('users')->where( 'user_type_id', '=', 3 )->where( 'refferal_id', '=', $userid )->orderBy( 'id', 'Asc' )->get();

        }

        return view('distributor.distributors',compact('distributors'));
    }

    public function savedistributor(Request $request)
    {
      $userid = Auth::user()->id;
      $savedistributor = DB::table('users')->insert([
        'name'          => $request->name,
        'aadhaar_no'    => $request->aadhaar_no,
        'password'      => Hash::make($request->password),
        'cpassword'     => $request->password,
        'email'         => $request->email,
        'phone'         => $request->phone,
        'address'       => $request->address,
        'gender'        => $request->gender,
        'date_of_birth' => $request->date_of_birth,
        'refferal_id'   => $userid,
        'user_type_id'  => '3',
        'status'        => 'Inactive'
      ]);

      $insertid = DB::getPdo()->lastInsertId();

      $profile = "";
      if ($request->profile != null) {
        $profile = $insertid.'.'.$request->file('profile')->extension();
        $filepath = public_path('upload' . DIRECTORY_SEPARATOR . 'distributor' . DIRECTORY_SEPARATOR);
        move_uploaded_file($_FILES['profile']['tmp_name'], $filepath . $profile);
      }
      $image = DB::table( 'users' )->where( 'id', $insertid )->update( [
        'profile'    => $profile,
      ] );

      return redirect('/distributors')->with('success', 'Distributor Add Successfully ... !');
    }

    public function updatedistributor(Request $request)
    {
      $updatedistributor = DB::table('users')->where( 'id', $request->distributor_id )->update([
        'name'          => $request->name,
        'aadhaar_no'    => $request->aadhaar_no,
        'email'         => $request->email,
        'phone'         => $request->phone,
        'address'       => $request->address,
        'gender'        => $request->gender,
        'date_of_birth' => $request->date_of_birth,
      ]);

      $profile = "";
      if ($request->profile != null) {
        $profile = $request->distributor_id.'.'.$request->file('profile')->extension();
        $filepath = public_path('upload' . DIRECTORY_SEPARATOR . 'distributor' . DIRECTORY_SEPARATOR);
        move_uploaded_file($_FILES['profile']['tmp_name'], $filepath . $profile);
        $sql = "update users set profile='$profile' where id = $request->distributor_id";
        DB::update(DB::raw($sql));
      }

      return redirect('/distributors')->with('success', 'Distributor Updated Successfully ... !');
    }

    public function statusupdate(Request $request)
    {

      $statusupdate = DB::table('users')->where( 'id', $request->statusid )->update([
        'status'        => $request->status,
      ]);

      return redirect('/distributors')->with('success', 'Status Updated Successfully ... !');
    }

    public function dropdistributor( $id ){

        $dropretailer = DB::table('users')->where( 'id', $id )->delete();
     return redirect()->back()->with('success', 'distributor Deleted Successfully ... !');
    }


    public function updateusertype(Request $request)
    {

      $usertype = DB::table('users')->where( 'id', $request->type_id )->update([
        'user_type_id'       => $request->user_type_id,
        'refferal_id'        => Auth::user()->id,
      ]);

      return redirect('/distributors')->with('success', 'UserType Updated Successfully ... !');
    }


}
