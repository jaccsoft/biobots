<?php

namespace App\Http\Controllers;

use App\PrintData;
use App\Crosslink;
use App\User;
use Validator;
use Redirect;
use Request;
use Session;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use DB;

class FrontController extends Controller
{
    /**
     * Show the index page.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::All();
        return view('index', compact('users'));
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int $id
     * @return Response
     */
    public function showProfile($id)
    {
        $user = User::find($id);
        return view('show', compact('user', 'id'));
    }

    /**
     * Import and populate the database.
     *
     */
    public function importFile(Request $request)
    {
        DB::table('print_info')->truncate();
        DB::table('crosslink')->truncate();
        DB::table('pressure')->truncate();
        DB::table('resolution')->truncate();
        DB::table('print_data')->truncate();
        DB::table('users')->truncate();

        $file = Input::file('filefield');
        $file->move(storage_path(), 'bioprint-data.json');
        $jsondata = file_get_contents(storage_path() . '/bioprint-data.json');
        $data = json_decode($jsondata, true);

        foreach ($data as $info) {
            $user_info = $info['user_info'];
            $user = User::where('email', '=', $user_info['email'])->first();

            if (!$user) {
                $user = new User;
                $user->email = $user_info['email'];
                $user->serial = $user_info['serial'];
                $user->save();
            }
            
            $print_data = $info['print_data'];
            DB::table('print_data')->insert(
                [
                    'dead_percent' => $print_data['deadPercent'],
                    'elasticity' => $print_data['elasticity'],
                    'live_percent' => $print_data['livePercent'],
                    'user_id' => $user->id,
                ]
            );

            $print_info = $info['print_info'];
            DB::table('print_info')->insert(
                [
                    'wellplate' => $print_info['wellplate'],
                    'user_id' => $user->id,
                ]
            );

            $crosslink = $info['print_info']['crosslinking'];
            DB::table('crosslink')->insert(
                [
                    'cl_duration' => $crosslink['cl_duration'],
                    'cl_enabled' => $crosslink['cl_enabled'],
                    'cl_intensity' => $crosslink['cl_intensity'],
                    'user_id' => $user->id,
                ]
            );

            $pressure = $info['print_info']['pressure'];
            DB::table('pressure')->insert(
                [
                    'extruder1' => $pressure['extruder1'],
                    'extruder2' => $pressure['extruder2'],
                    'user_id' => $user->id,
                ]
            );

            $resolution = $info['print_info']['resolution'];
            DB::table('resolution')->insert(
                [
                    'layer_height' => $resolution['layerHeight'],
                    'layer_num' => $resolution['layerNum'],
                    'user_id' => $user->id,
                ]
            );
        }

        return redirect('dashboard');
    }
}
