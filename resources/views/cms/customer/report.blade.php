@extends('templates.master')

@section('title','Customer Report')

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
          <li class="active">{{$customer->firstname}}&nbsp;&nbsp; {{$customer->lastname}}</li>
        </ol>
        @else
        <h5 class="breadcrumbs-title">مشتری های سیستم</h5>
        <ol class="breadcrumb">
          <li><a href="#">خانه</a></li>
          <li class="active">مشتری های سیستم</li>
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

<div class="container">
    <div class="col l12 m12 s12">
            <div class="card-panel hoverable" style="text-align: center;font-size:19px;font-family:Arial">
               برده گی های {{$customer->firstname. ' '. $customer->lastname}}
            </div>
    </div>

    <table class=" bordered " style="border: 1px double black">


          <thead>
            <th>تاریخ</th>
            <th>مقدار</th>
            <th>ملاحظات</th>
          </thead>
          <?php
            $takes =0
          ?>

             @foreach($loans as $loan)


            <tr>
                        <td>{{$loan->date}}</td>
                        <td>{{$loan->amount}}</td>
                        <td>{{$loan->remark}}</td>

                        <? $takes += $loan->amount; ?>


            </tr>

            @endforeach


    </table>
</div>


<div class="container">
    <div class="col l12 m12 s12">
            <div class="card-panel hoverable" style="text-align: center;font-size:19px;font-family:Arial">
               رسیدات {{$customer->firstname. ' '. $customer->lastname}}
            </div>
    </div>

    <table class=" bordered " style="border: 1px double black">


          <thead>
            <th>تاریخ</th>
            <th>مقدار</th>
            <th>ملاحظات</th>
          </thead>

          <?
            $receive =0;
          ?>
             @foreach($returns as $return)


            <tr>
                        <td>{{$return->date}}</td>
                        <td>{{$return->amount}}</td>
                        <td>{{$return->remark}}</td>

                        <?  $receive += $return->amount ?>


            </tr>

            @endforeach


    </table>
</div>

    <div class="col l12 m12 s12">
            <div class="card-panel hoverable" style="text-align: center;font-size:19px;font-family:Arial">
               حساب باقی {{ $takes-$receive}}
            </div>
    </div>





    </div>
  </div>
 </section>
@stop
