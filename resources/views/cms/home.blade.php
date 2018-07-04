@extends('templates.master')

@section('title','Home')

@section('content')

	<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" style="width:100%;" class="" >
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        @if(isset($update))
        <h5 class="breadcrumbs-title">ویرایش</h5>
        <ol class="breadcrumb">
          <li><a href="">خانه</a></li>
          <li class="active">{{$user->firstname}}&nbsp;&nbsp; {{$user->lastname}}</li>
        </ol>
        @else
        <h5 class="breadcrumbs-title">استفاده کننده های سیستم</h5>
        <ol class="breadcrumb">
          <li><a href="#">خانه</a></li>
          <li class="active">استفاده کننده های سیستم</li>
        </ol>
        @endif
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->
@include('layouts.partials.message')


<!-- START CONTENT -->
<section>
  <div class="row">
    <div class="section col s12 m12 l12">


    </div>
  </div>
 </section>
@stop
