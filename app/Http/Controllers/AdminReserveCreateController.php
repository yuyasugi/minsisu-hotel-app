<?php

namespace App\Http\Controllers;

use App\Models\ReserveSpace;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AdminReserveCreateController extends BaseController
{
    public function admin_reserve_create(){

        $Rooms = Room::get();

        return view('admin_reserve.create',compact('Rooms'));
    }

    public function admin_reserve_store(Request $request){

        $posts = $request->all();
        // dd($posts['room']);

        if($posts['room'] == 1){
            $single = [
                ["room_id" => $posts['room'], "date" => $posts['date']],
                ["room_id" => $posts['room'], "date" => $posts['date']],
                ["room_id" => $posts['room'], "date" => $posts['date']],
                ["room_id" => $posts['room'], "date" => $posts['date']],
                ["room_id" => $posts['room'], "date" => $posts['date']]
              ];

            //   dd($single);

              $save_single = ReserveSpace::insert($single);

              if($save_single){
                $messageKey = 'successMessage';
                $flashMessage = '作成に成功しました！';
            } else {
                $messageKey = 'errorMessage';
                $flashMessage = '作成できませんでした。';
            }
        } elseif($posts['room'] == 2){
            $double = [
                ["room_id" => $posts['room'], "date" => $posts['date']],
                ["room_id" => $posts['room'], "date" => $posts['date']],
                ["room_id" => $posts['room'], "date" => $posts['date']]
              ];

              $save_double = ReserveSpace::insert($double);

              if($save_double){
                $messageKey = 'successMessage';
                $flashMessage = '作成に成功しました！';
            } else {
                $messageKey = 'errorMessage';
                $flashMessage = '作成できませんでした。';
            }
        }

        return redirect()->route('admin_reserve_create')->with($messageKey, $flashMessage);
    }

    public function admin_reserve_bulk_create(){

        $Rooms = Room::get();

        return view('admin_reserve.bulk_create',compact('Rooms'));
    }

    public function admin_reserve_bulk_store(Request $request){

        $Rooms = Room::get();

        $first_date = Carbon::parse($request->first_date);
        $last_date = Carbon::parse($request->last_date);
        $dates = [];

        while ($first_date->lte($last_date)) {
            $dates[] = $first_date->toDateString();
            $first_date->addDay();
        }

        $existDates = ReserveSpace::whereIn('date', $dates)
            ->where('room_id', $request->room)
            ->pluck('date')
            ->toArray();

        // 重複する日付が存在する場合は処理を中断する
        if (!empty($existDates)) {
            return redirect()->route('admin_reserve_bulk_create')
                ->with('error', '既に作成済みの日付が含まれています。');
        }

        // 期間内の各日に予約枠を作成する
        foreach ($dates as $date) {
            if($request->room == 1){
                $single = [
                    ["room_id" => $request->room, "date" => $date],
                    ["room_id" => $request->room, "date" => $date],
                    ["room_id" => $request->room, "date" => $date],
                    ["room_id" => $request->room, "date" => $date],
                    ["room_id" => $request->room, "date" => $date]
                  ];

                //   dd($single);

                  $save_single = ReserveSpace::insert($single);

                  if($save_single){
                    $messageKey = 'successMessage';
                    $flashMessage = '作成に成功しました！';
                } else {
                    $messageKey = 'errorMessage';
                    $flashMessage = '作成できませんでした。';
                }
            } elseif($request->room == 2){
                $double = [
                    ["room_id" => $request->room, "date" => $date],
                    ["room_id" => $request->room, "date" => $date],
                    ["room_id" => $request->room, "date" => $date]
                  ];

                  $save_double = ReserveSpace::insert($double);

                  if($save_double){
                    $messageKey = 'successMessage';
                    $flashMessage = '作成に成功しました！';
                } else {
                    $messageKey = 'errorMessage';
                    $flashMessage = '作成できませんでした。';
                }
            }
        }


        return view('admin_reserve.bulk_create',compact('Rooms'));
    }
}
