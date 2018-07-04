@extends('templates.master')

@section('title','Users')

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
    @if(isset($update))
      
    <h5 class="center-align cyan-text">ویرایش پروفایل {{$user->name}}</h5>
    <div  class="container row scrollspy">
    <form action="{{route('user.edit')}}" method="post"  enctype="multipart/form-data" >
    {!! csrf_field() !!}
   <div class="row col s12 m12 l12">
      <hr />
    </div>

    <input type="hidden" name="user_id" value="{{encrypt($user->id)}}">

 <div class="row col s12 m12 l12">

     <div class="input-field col s12 m4 l4">
      <i class="mdi-action-account-box prefix"></i>
      <input id="firstname" name="firstname" type="text" value="{{ $user->name }}" required length="64" minlength="3" maxlength="64" class="validate @if ($errors->has('firstname')) invalid @endif">
      <label for="firstname">اسم</label>
      @if ($errors->has('firstname'))
      <span class="error">
        <strong>{{ $errors->first('firstname') }}</strong>
      </span>
      @endif
    </div>


         <div class="input-field col s12 m4 l4">
      <i class="mdi-action-account-box prefix"></i>
      <input id="email" name="email" type="text" value="{{ $user->email }}" required length="64" minlength="3" maxlength="64" class="validate @if ($errors->has('email')) invalid @endif">
      <label for="email">آدرس الکترونیکی</label>
      @if ($errors->has('email'))
      <span class="error">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>

    </div>



    <div class="row col s12 m12 l12">

    <div class="input-field col s12 m4 l4">
      <i class="mdi-action-account-box prefix"></i>
      <input id="password" name="password" type="password" value="{{ old('password') }}" required length="64" minlength="3" maxlength="64" class="validate @if ($errors->has('password')) invalid @endif">
      <label for="password">رمز عبور</label>
      @if ($errors->has('password'))
      <span class="error">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
    </div>


         <div class="input-field col s12 m4 l4">
      <i class="mdi-action-account-box prefix"></i>
      <input id="phone" name="phone" type="text" value="{{ $user->phone }}"  maxlength="64" class="validate @if ($errors->has('phone')) invalid @endif">
      <label for="phone">شماره تلیفون</label>
      @if ($errors->has('phone'))
      <span class="error">
        <strong>{{ $errors->first('phone') }}</strong>
      </span>
      @endif
    </div>




    <div class="col s12">
            <label for="file">تصویر</label>
            <input type="file" name="file" id="file" class="dropify-event" data-max-file-size="3M">
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


    @else

    <h5 class="center-align cyan-text">ثبت استفاده کننده های سیستم</h5>
    <div  class="container row scrollspy">
    <form action="{{route('user.create.post')}}" method="post"  enctype="multipart/form-data" >
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
      <hr />
    </div>

    <div class="row col s12 m12 l12">

     <div class="input-field col s12 m4 l4">
      <i class="mdi-action-account-box prefix"></i>
      <input id="firstname" name="firstname" type="text" value="{{ old('firstname') }}" required length="64" minlength="3" maxlength="64" class="validate @if ($errors->has('firstname')) invalid @endif">
      <label for="firstname">اسم</label>
      @if ($errors->has('firstname'))
      <span class="error">
        <strong>{{ $errors->first('firstname') }}</strong>
      </span>
      @endif
    </div>


         <div class="input-field col s12 m4 l4">
      <i class="mdi-action-account-box prefix"></i>
      <input id="email" name="email" type="text" value="{{ old('email') }}" required length="64" minlength="3" maxlength="64" class="validate @if ($errors->has('email')) invalid @endif">
      <label for="email">آدرس الکترونیکی</label>
      @if ($errors->has('email'))
      <span class="error">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>

    </div>



    <div class="row col s12 m12 l12">

    <div class="input-field col s12 m4 l4">
      <i class="mdi-action-account-box prefix"></i>
      <input id="password" name="password" type="password" value="{{ old('password') }}" required length="64" minlength="3" maxlength="64" class="validate @if ($errors->has('password')) invalid @endif">
      <label for="password">رمز عبور</label>
      @if ($errors->has('password'))
      <span class="error">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
    </div>


         <div class="input-field col s12 m4 l4">
      <i class="mdi-action-account-box prefix"></i>
      <input id="phone" name="phone" type="text" value="{{ old('phone') }}"  maxlength="64" class="validate @if ($errors->has('phone')) invalid @endif">
      <label for="phone">شماره تلیفون</label>
      @if ($errors->has('phone'))
      <span class="error">
        <strong>{{ $errors->first('phone') }}</strong>
      </span>
      @endif
    </div>




    <div class="col s12">
            <label for="file">تصویر</label>
            <input type="file" name="file" id="file" class="dropify-event" data-max-file-size="3M">
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

  <h5 class="center-align cyan-text">استفاده کننده های سیستم</h5><br>
  <div id="ameryats_spy" class="row col s12 m12 l12 scrollspy">
    <table  class="responsive-table centered">
    <thead>

      <tr>
        <th>اسم</th>
        <th>آردس الکترونیکی</th>
        <th>شماره تماس</th>
        <th>تصویر</th>
        <th>تصحیح</th>
        <th colspan="3">حذف</th>
      </tr>
    </thead>
    <tbody>
    @if(count($users) >0 && isset($users))
      @foreach($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
       

        <td><img src="{{asset($user->photo)}}" width="120" class="img-responsive" alt="تصویر در دسترس نیست"></td>

        <td>        
           <a data-toggle="tooltip" title="ویرایش" style="cursor: pointer;" href="{{route('user.update', ['id' => encrypt($user->id)])}}"><i class="mdi-editor-mode-edit"></i></a> 
        </td>

        <td class="cyan-text">
            <a data-toggle="tooltip" title="حذف" href="{{route('user.delete', ['id' => encrypt($user->id)])}}" style="cursor: pointer;" class="delete"> 
              <i class="mdi-action-delete"></i>
            </a>
        </td>

      </tr>
      @endforeach

    @else

    <tr>
          <td colspan="8" class="red-text blod">استفاده کننده در سیستم موجود نیست!</td>
        </tr>
    @endif
     </tbody>
    </table>

  </div>

    @endif
    </div>
  </div>
 </section>
@stop
