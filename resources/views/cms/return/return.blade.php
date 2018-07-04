@extends('templates.master')

@section('title','Return')

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
          <li class="active">{{$return->customer->firstname}}&nbsp;&nbsp; {{$return->customer->lastname}}</li>
        </ol>
        @else
        <h5 class="breadcrumbs-title">قرض های سیستم</h5>
        <ol class="breadcrumb">
          <li><a href="#">خانه</a></li>
          <li class="active">قرض های سیستم</li>
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
    @if(isset($update))
      
    <h5 class="center-align cyan-text">ویرایش اطلاعات {{$return->customer->firstname. ' '. $return->customer->lastname}}</h5>
<div  class="container row scrollspy">
    <form action="{{route('return.edit')}}" method="post"  enctype="multipart/form-data" >
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
      <hr />
    </div>
    <input type="hidden" value="{{encrypt($return->id)}}" name="return_id">
   
    <div class="row col s12 m12 l12">

        <div class="input-field col s12 m12 l12">
      <select name="customer" required class="browser-default waves-effect waves-light btn-drop">
      <option value="" disabled selected>لطفاُ  مشتری مربوطه را انتخاب نماید</option>
        @if(isset($customers) && count($customers)>0)
        @foreach ($customers as $customer)
        <option value="{{ encrypt($customer->id) }}" {{ $customer->id == $return->customer_id ? 'selected' : ''}}>{{ $customer->firstname. ' '. $customer->lastname}} </option>
        @endforeach
        @endif
      </select>
      <label>پوهنحُی</label>
      @if ($errors->has('customer'))
      <span class="error">
        <strong>{{ $errors->first('customer') }}</strong>
      </span>
      @endif
</div>
    

    </div>



    <div class="row col s12 m12 l12">

     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="date" name="date" type="text" value="{{ $return->date }}"  class="validate @if ($errors->has('date')) invalid @endif">
      <label for="date">تاریخ</label>
      @if ($errors->has('date'))
      <span class="error">
        <strong>{{ $errors->first('date') }}</strong>
      </span>
      @endif
    </div>


     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="amount" name="amount" type="text" value="{{ $return->amount }}"  class="validate @if ($errors->has('amount')) invalid @endif">
      <label for="amount">مقدار</label>
      @if ($errors->has('amount'))
      <span class="error">
        <strong>{{ $errors->first('amount') }}</strong>
      </span>
      @endif
    </div>


    </div>
     <div class="input-field col s12 m12 l12">
      <i class="mdi-action-account-box prefix"></i>
      <textarea id="remark" name="remark" type="text"  class="validate @if ($errors->has('remark')) invalid @endif materialize-textarea" placeholder="توضیحات در باره مشتری مانند آدرس و ....">{{$return->remark}}</textarea>
      <label for="remark">توضیحات</label>
      @if ($errors->has('remark'))
      <span class="error">
        <strong>{{ $errors->first('remark') }}</strong>
      </span>
      @endif
    </div>
        <div class="row col s12 m12 l12">

   <div class="row col s12 m12 l12">
    <div class="input-field col s12 m4 l4">
      <button class="btn waves-effect waves-light cyan bold" type="submit">ثبت
        <i class="mdi-content-send right"></i>
      </button>
    </div>
  </div>

    </form>
    </div>


    @elseif(isset($list))

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
      <h5 class="center-align cyan-text">برگشت قرض ها</h5><br>
  <div id="ameryats_spy" class="row col s12 m12 l12 scrollspy">
    <table  class="responsive-table centered">
    <thead>

      <tr>
        <th>اسم</th>
        <th>تاریخ</th>
        <th>مقدار</th>
        <th>راپو کلی مشتری</th>
        <th>تصحیح</th>
        <th colspan="3">حذف</th>
      </tr>
    </thead>
    <tbody>
    @if(count($returns) >0 && isset($returns))
      @foreach($returns as $return)
      <tr>
        <td>{{$return->customer->firstname. ' '. $return->customer->lastname}}</td>
        <td>{{$return->date}}</td>
        <td>{{$return->amount}}</td>
       

        <td><a href="" class="fa fa-book fa-2x"></a></td>

        <td>        
           <a data-toggle="tooltip" title="ویرایش" style="cursor: pointer;" href="{{route('return.update', ['id' => encrypt($return->id)])}}"><i class="mdi-editor-mode-edit"></i></a> 
        </td>

        <td class="cyan-text">
            <a data-toggle="tooltip" title="حذف" href="{{route('return.delete', ['id' => encrypt($return->id)])}}" style="cursor: pointer;" class="delete"> 
              <i class="mdi-action-delete"></i>
            </a>
        </td>

      </tr>
      @endforeach
      {!! $returns->links() !!}
    @else

    <tr>
          <td colspan="8" class="red-text blod"> موجود نیست!</td>
        </tr>
    @endif
     </tbody>
    </table>


    @else

  <div class="row col s12 m12 l12">
    <div class="input-field col s12 m4 l4">
      <a class="btn waves-effect waves-light cyan bold" href="{{route('list.returns')}}">لست برگشت های قرض
        <i class="mdi-content-send right"></i>
      </a>
    </div>
  </div>

    <h5 class="center-align cyan-text">ثبت برگشت جدید قرض</h5>
    <div  class="container row scrollspy">
    <form action="{{route('return.save')}}" method="post"  enctype="multipart/form-data" >
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
      <hr />
    </div>

   
    <div class="row col s12 m12 l12">

        <div class="input-field col s12 m12 l12">
      <select name="customer" required class="browser-default waves-effect waves-light btn-drop">
      <option value="" disabled selected>لطفاُ  مشتری مربوطه را انتخاب نماید</option>
        @if(isset($customers) && count($customers)>0)
        @foreach ($customers as $customer)
        <option value="{{ encrypt($customer->id) }}">{{ $customer->firstname. ' '. $customer->lastname}} </option>
        @endforeach
        @endif
      </select>
      <label>پوهنحُی</label>
      @if ($errors->has('customer'))
      <span class="error">
        <strong>{{ $errors->first('customer') }}</strong>
      </span>
      @endif
</div>
    

    </div>



    <div class="row col s12 m12 l12">

     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="date" name="date" type="text" value="{{ old('date') }}"  class="validate @if ($errors->has('date')) invalid @endif">
      <label for="date">تاریخ</label>
      @if ($errors->has('date'))
      <span class="error">
        <strong>{{ $errors->first('date') }}</strong>
      </span>
      @endif
    </div>


     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="amount" name="amount" type="text" value="{{ old('amount') }}"  class="validate @if ($errors->has('amount')) invalid @endif">
      <label for="amount">مقدار</label>
      @if ($errors->has('amount'))
      <span class="error">
        <strong>{{ $errors->first('amount') }}</strong>
      </span>
      @endif
    </div>


    </div>
     <div class="input-field col s12 m12 l12">
      <i class="mdi-action-account-box prefix"></i>
      <textarea id="remark" name="remark" type="text" value="{{ old('remark') }}"  class="validate @if ($errors->has('remark')) invalid @endif materialize-textarea" placeholder="توضیحات در باره مشتری مانند آدرس و ...."></textarea>
      <label for="remark">توضیحات</label>
      @if ($errors->has('remark'))
      <span class="error">
        <strong>{{ $errors->first('remark') }}</strong>
      </span>
      @endif
    </div>
        <div class="row col s12 m12 l12">

   <div class="row col s12 m12 l12">
    <div class="input-field col s12 m4 l4">
      <button class="btn waves-effect waves-light cyan bold" type="submit">ثبت
        <i class="mdi-content-send right"></i>
      </button>
    </div>
  </div>

    </form>
    </div>


    @endif
    </div>
  </div>
 </section>
@stop
