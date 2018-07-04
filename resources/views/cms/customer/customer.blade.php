@extends('templates.master')

@section('title','Customer')

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
    @if(isset($update))
      
    <h5 class="center-align cyan-text">ویرایش اطلاعات {{$customer->firstname. ' '. $customer->lastname}}</h5>
 <div  class="container row scrollspy">
    <form action="{{route('customer.edit')}}" method="post"  enctype="multipart/form-data" >
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
      <hr />
    </div>
    <input type="hidden" name="customer_id" value="{{encrypt($customer->id)}}">
   
    <div class="row col s12 m12 l12">

     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="firstname" name="firstname" type="text" value="{{ $customer->firstname }}" required length="64" minlength="3" maxlength="64" class="validate @if ($errors->has('firstname')) invalid @endif">
      <label for="firstname">اسم اول</label>
      @if ($errors->has('firstname'))
      <span class="error">
        <strong>{{ $errors->first('firstname') }}</strong>
      </span>
      @endif
    </div>


    <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="lastname" name="lastname" type="text" value="{{ $customer->lastname}}" class="validate @if ($errors->has('lastname')) invalid @endif">

      <label for="lastname">تخلص</label>
      @if ($errors->has('lastname'))
      <span class="error">
        <strong>{{ $errors->first('lastname') }}</strong>
      </span>
      @endif
    </div>

    </div>



    <div class="row col s12 m12 l12">

     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="email" name="email" type="text" value="{{ $customer->email }}"  class="validate @if ($errors->has('email')) invalid @endif">
      <label for="email">آدرس الکترونیکی</label>
      @if ($errors->has('email'))
      <span class="error">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>


     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="phone" name="phone" type="text" value="{{ $customer->phone }}"  class="validate @if ($errors->has('phone')) invalid @endif">
      <label for="phone">شماره تلیفون</label>
      @if ($errors->has('phone'))
      <span class="error">
        <strong>{{ $errors->first('phone') }}</strong>
      </span>
      @endif
    </div>


    </div>
     <div class="input-field col s12 m12 l12">
      <i class="mdi-action-account-box prefix"></i>
      <textarea id="remark" name="remark" type="text"  class="validate @if ($errors->has('remark')) invalid @endif materialize-textarea" placeholder="توضیحات در باره مشتری مانند آدرس و ....">
        {{ $customer->remark }}
      </textarea>
      <label for="remark">توضیحات</label>
      @if ($errors->has('remark'))
      <span class="error">
        <strong>{{ $errors->first('remark') }}</strong>
      </span>
      @endif
    </div>
        <div class="row col s12 m12 l12">



    <div class="col s12">
            <label for="file">تصویر</label>
            <input type="file" name="file" id="file" class="dropify-event" data-max-file-size="3M" />
   </div>

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
      <h5 class="center-align cyan-text">مشتریان سیستم</h5><br>
  <div id="ameryats_spy" class="row col s12 m12 l12 scrollspy">
    <table  class="responsive-table centered">
    <thead>

      <tr>
        <th>اسم</th>
        <th>آردس الکترونیکی</th>
        <th>شماره تماس</th>
        <th>تصویر</th>
        <th>راپور حساب</th>
        <th>تصحیح</th>
        <th colspan="3">حذف</th>
      </tr>
    </thead>
    <tbody>
    @if(count($customers) >0 && isset($customers))
      @foreach($customers as $customer)
      <tr>
        <td>{{$customer->firstname. ' '. $customer->lastname}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->phone}}</td>
       

        <td><img src="{{asset($customer->photo)}}" width="120" class="img-responsive" alt="تصویر در دسترس نیست"></td>

        <td>
          <a href="{{route('customer.report', ['id' => encrypt($customer->id)])}}" class="fa fa-book fa-2x"></a>
        </td>
        <td>        
           <a data-toggle="tooltip" title="ویرایش" style="cursor: pointer;" href="{{route('customer.update', ['id' => encrypt($customer->id)])}}"><i class="mdi-editor-mode-edit"></i></a> 
        </td>

        <td class="cyan-text">
            <a data-toggle="tooltip" title="حذف" href="{{route('customer.delete', ['id' => encrypt($customer->id)])}}" style="cursor: pointer;" class="delete"> 
              <i class="mdi-action-delete"></i>
            </a>
        </td>

      </tr>
      @endforeach
      {!! $customers->links() !!}
    @else

    <tr>
          <td colspan="8" class="red-text blod">استفاده کننده در سیستم موجود نیست!</td>
        </tr>
    @endif
     </tbody>
    </table>


    @else

    <h5 class="center-align cyan-text">ثبت مشتری به سیستم</h5>
    <div  class="container row scrollspy">
    <form action="{{route('customer.save')}}" method="post"  enctype="multipart/form-data" >
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
      <hr />
    </div>

   
    <div class="row col s12 m12 l12">

     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="firstname" name="firstname" type="text" value="{{ old('firstname') }}" required length="64" minlength="3" maxlength="64" class="validate @if ($errors->has('firstname')) invalid @endif">
      <label for="firstname">اسم اول</label>
      @if ($errors->has('firstname'))
      <span class="error">
        <strong>{{ $errors->first('firstname') }}</strong>
      </span>
      @endif
    </div>


    <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="lastname" name="lastname" type="text" value="{{ old('lastname') }}" class="validate @if ($errors->has('lastname')) invalid @endif">

      <label for="lastname">تخلص</label>
      @if ($errors->has('lastname'))
      <span class="error">
        <strong>{{ $errors->first('lastname') }}</strong>
      </span>
      @endif
    </div>

    </div>



    <div class="row col s12 m12 l12">

     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="email" name="email" type="text" value="{{ old('email') }}"  class="validate @if ($errors->has('email')) invalid @endif">
      <label for="email">آدرس الکترونیکی</label>
      @if ($errors->has('email'))
      <span class="error">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>


     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="phone" name="phone" type="text" value="{{ old('phone') }}"  class="validate @if ($errors->has('phone')) invalid @endif">
      <label for="phone">شماره تلیفون</label>
      @if ($errors->has('phone'))
      <span class="error">
        <strong>{{ $errors->first('phone') }}</strong>
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



    <div class="col s12">
            <label for="file">تصویر</label>
            <input type="file" name="file" id="file" class="dropify-event" data-max-file-size="3M" />
   </div>

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
