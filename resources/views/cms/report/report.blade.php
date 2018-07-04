@extends('templates.master')

@section('title','Report')

@section('content')

  <!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" style="width:100%;" class="" >
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">

        <h5 class="breadcrumbs-title">راپور های سیستم</h5>
        <ol class="breadcrumb">
          <li><a href="#">خانه</a></li>
          <li class="active">راپور های سیستم</li>
        </ol>

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
    @if(isset($customers_report))

  <h5 class="center-align cyan-text">جستجو مشتری</h5>
  <div id="new_rayasat_spy" class="container row scrollspy">
   <form  action="{{ route('customer.search')}}" method="post">
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
     <div class="input-field col s12 m12 l12">
      <i class="mdi-action-account-box prefix"></i>
      <input id="keyword" name="keyword" type="text" value="{{ old('keyword') }}" required length="64" minlength="2" maxlength="64" class="validate @if ($errors->has('keyword')) invalid @endif">
      <label for="name">نام مشتری</label>
      @if ($errors->has('keyword'))
      <span class="error">
        <strong>{{ $errors->first('keyword') }}</strong>
      </span>
      @endif
    </div>
    
      </div>
  <div class="row col s12 m12 l12">
    <div class="input-field col s12 m4 l4">
      <button class="btn waves-effect waves-light cyan bold" type="submit">جستحو
        <i class="mdi-content-send right"></i>
      </button>
    </div>
  </div>

</form>
</div>
      <h5 class="center-align cyan-text">قرض ها</h5><br>
  <div id="ameryats_spy" class="row col s12 m12 l12 scrollspy">
    <table  class="responsive-table centered">
    <thead>

      <tr>
        <th>اسم</th>
        <th>مقدار قرض گرفته شده</th>
        <th>برگشت</th>
        <th>باقیمانده</th>
        <th>راپور با جزییات</th>
      </tr>
    </thead>
    <tbody>
    @if(count($customers) >0 && isset($customers))
      @foreach($customers as $customer)

      @if(($customer->sumLoan($customer->id) - $customer->sumLoanReturns($customer->id)) > 0)

      <tr>
        <td>{{$customer->firstname. ' '. $customer->lastname}}</td>
        <td>{{$customer->sumLoan($customer->id)}}</td>
        <td>{{$customer->sumLoanReturns($customer->id)}}</td>
        <td>{{$customer->sumLoan($customer->id) - $customer->sumLoanReturns($customer->id)}}</td>

       <td>
          <a href="{{route('customer.report', ['id' => encrypt($customer->id)])}}" class="fa fa-book fa-2x"></a>
        </td>

      </tr>

      @endif
      @endforeach
      {!! $customers->links() !!}
    @else

    <tr>
          <td colspan="8" class="red-text blod"> موجود نیست!</td>
        </tr>
    @endif
     </tbody>
    </table>


@elseif(isset($expeses_report))
    

     <h5 class="center-align cyan-text">مصارفات</h5><br>
  <div id="ameryats_spy" class="row col s12 m12 l12 scrollspy">
    <table  class="responsive-table centered">
    <thead>

      <tr>
        <th>عنوان</th>
        <th>تاریخ</th>
        <th>مقدار</th>
        <th>توضیحات</th>

      </tr>
    </thead>
    <tbody>
    @if(count($expenses) >0 && isset($expenses))
      @foreach($expenses as $expense)
      <tr>
        <td>{{$expense->issue}}</td>
        <td>{{$expense->date}}</td>
        <td>{{$expense->amount}}</td>

       <td>{{$expense->remark}}</td>


      </tr>
      @endforeach
      {!! $expenses->links() !!}
    @else

    <tr>
          <td colspan="8" class="red-text blod"> موجود نیست!</td>
        </tr>
    @endif
     </tbody>
    </table>


    @elseif(isset($bills_report))

    <h5 class="center-align cyan-text">جستجو بل</h5>
  <div id="new_rayasat_spy" class="container row scrollspy">
   <form  action="{{ route('customer.search')}}" method="post">
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
     <div class="input-field col s12 m12 l12">
      <i class="mdi-action-account-box prefix"></i>
      <input id="keyword" name="keyword" type="text" value="{{ old('keyword') }}" required length="64" minlength="2" maxlength="64" class="validate @if ($errors->has('keyword')) invalid @endif">
      <label for="name">اسم مشتری</label>
      @if ($errors->has('keyword'))
      <span class="error">
        <strong>{{ $errors->first('keyword') }}</strong>
      </span>
      @endif
    </div>
    
      </div>
  <div class="row col s12 m12 l12">
    <div class="input-field col s12 m4 l4">
      <button class="btn waves-effect waves-light cyan bold" type="submit">جستحو
        <i class="mdi-content-send right"></i>
      </button>
    </div>
  </div>

</form>
</div>
      <h5 class="center-align cyan-text">بل ها</h5><br>
  <div id="ameryats_spy" class="row col s12 m12 l12 scrollspy">
    <table  class="responsive-table centered">
    <thead>

      <tr>
        <th>اسم</th>
        <th>تاریخ</th>
        <th>مجموع</th>
        <th>اقلام بل</th>
      </tr>
    </thead>
    <tbody>
    @if(count($bills) >0 && isset($bills))
      @foreach($bills as $bill)
      <tr>
        <td>{{$bill->customer->firstname. ' '. $bill->customer->lastname}}</td>
        <td>{{$bill->date}}</td>
        <td>{{$bill->getValue($bill->id)}}</td>

       

        <td><a href="{{route('bill.details', ['id' => encrypt($bill->id)])}}" class="fa fa-book fa-2x"></a></td>

      </tr>
      @endforeach
      {!! $bills->links() !!}
    @else

    <tr>
          <td colspan="8" class="red-text blod"> موجود نیست!</td>
        </tr>
    @endif
     </tbody>
    </table>



    @endif
    </div>
  </div>
 </section>
@stop
