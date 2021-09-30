<?php

namespace App\Http\Controllers;
Use \Carbon\Carbon;
use App\Models\agent;
use App\Models\check;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function get_insert(Request $req){
        try{
        
        //dd($req->name);
        $dt = Carbon::now();
        //$time =$dt->year(2021)->month(7)->day(20)->hour(22)->minute(32)->second(5)->toDateTimeString();
        //dd($dt); // 2 ngày cách nhau bao nhiêu ngày
        $id=agent::where('name',$req->name)->pluck('id')->first();
        // try{
        //     $t=check::find(1)->pluck('created_at')->first();
        //     $t1=check::find(1)->pluck('updated_at')->first();
        //     echo $t->diffInMinutes($dt);
        // }
        // catch(\Exception $e){
        //     // do task when error
        //     echo $e->getMessage();   // insert query
        //  }
        $check=new check;
        $check->id_user=$id;
        $check->save();
        $name=agent::where('name',$req->name)->pluck('name')->first();
        $sex=agent::where('name',$req->name)->pluck('sex')->first();
        $phone=agent::where('name',$req->name)->pluck('phone')->first();
        $address=agent::where('name',$req->name)->pluck('address')->first();
   
        if($sex==1){
            $sex2='Nam';
        }
        else{
            $sex2='Nữ';
        }
        echo "<table class='table table-dark'>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>sex</th>
                <th>phone</th>
                <th>address</th>
                <th>time</th>
            </tr>
            <tr>
                <td>$id</td>
                <td>$name</td>
                <td>$sex2</td>
                <td>$phone</td>
                <td>$address</td>
                <th>$dt</th>
            </tr>
        </table>";
    }
    catch(\Exception $e){
        // do task when error
        echo $e->getMessage();   // insert query
    }
    }
    public function get_select(Request $req){
        $check=check::all();
        echo "<table class='table table-dark'>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>sex</th>
                <th>phone</th>
                <th>address</th>
                <th>checked</th>
            </tr>";
        foreach($check as $i){
            try{
                $id=$i->agent->id;
                $name=$i->agent->name;
                $sex=$i->agent->sex;
                $phone=$i->agent->phone;
                $address=$i->agent->address;
                $time=$i->created_at;
            }
            catch(\Exception $e){
                // do task when error
                echo $e->getMessage();   // insert query
            }
            if($sex==1){
                $sex2='Nam';
            }
            else{
                $sex2='Nữ';
            }
            echo"
            <tr>
                <td>$id</td>
                <td>$name</td>
                <td>$sex2</td>
                <td>$phone</td>
                <td>$address</td>
                <td>$time</td>
            </tr>";
        
            
        }
        echo"</table>";
    }
}
