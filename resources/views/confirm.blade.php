@extends('layouts.app')
<h1 class="text-center">予約情報確認ページ</h1>
<form class="w-50 mx-auto mt-5 form-reserve" action="/reserve/store" method="post">
  @csrf
  <input type="hidden" name="number_reservations" value="{{$reserve['number_reservations']}}">
  <input type="hidden" name="reserve_date_time" value="{{$reserve['reserve_date_time']}}">
  <input type="hidden" name="reserve_date" value="{{ $reserve['reserve_date']}}">

  <div class="form-group">
    <label for="exampleFormControlInput1">予約人数</label>
    <div>{{ $reserve['number_reservations']}}</div>
  </div>
  <div class="form-group">
  <label for="">予約時間</label>
  <div>{{ $reserve['reserve_date_time']}}</div>
  </div>
  <div class="form-group">
    <label for="">予約日時</label>
   <div>{{ $reserve['reserve_date']}}</div>
  </div>
  <button class="btn btn-success">予約を確定する</button>
</form>