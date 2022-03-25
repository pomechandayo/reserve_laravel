@extends('layouts.app')
<h1>マイページ</h1>

@foreach ($reserves as $reserve)
<div>id：{{ $reserve->id }}</div>
<div>予約日時：{{ dateFormatter($reserve->reserve_date) }}</div>
<div>予約人数：{{ $reserve->number_reservations }}</div>
@endforeach

user_id：：{{ $reserve->user_id }}

@php
function dateFormatter($date) 
{
	$dateTime = new DateTime($date);
	echo $dateTime->format('Y年m月d日');
}
@endphp