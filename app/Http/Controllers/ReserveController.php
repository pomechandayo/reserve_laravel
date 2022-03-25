<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\reserve;
use App\Http\Requests\ReserveRequest;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reserve');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function reserve_confirm(ReserveRequest $request)
    {
        // dd($request);
        if (Auth::id() === null) {
            $request->session()->put('reserve_date', $request->reserve_date . '-' . $request->reserve_date_time);
            $request->session()->put('number_reservations', $request->number_reservations);
            $request->session()->put('reserve_flg', 'OK');
            return view('/auth/register');
        }
        // dd($request);
        return view('confirm')->with('reserve', $request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReserveRequest $request)
    {
        if (empty($request->session()->get('reserve_flg'))) {
            Reserve::create([
                'user_id' => Auth::id(),
                'reserve_date' => $request->reserve_date . '-' . $request->reserve_date_time,
                'number_reservations' => $request->number_reservations
            ]);
        } else {
            Reserve::create([
                'user_id' => Auth::id(),
                'reserve_date' => $request->session()->get('reserve_date'),
                'number_reservations' => $request->session()->get('number_reservations')
            ]);
            $request->session()->forget('reserve_flg');
        }
        return view('thanks');
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
