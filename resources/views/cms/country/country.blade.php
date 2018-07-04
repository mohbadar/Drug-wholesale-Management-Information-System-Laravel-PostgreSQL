@extends('templates.master')


@section('title','Country')

@section('content')
 <!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" style="width:100%;" class="" >
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
      @if(isset($update))
        <h5 class="breadcrumbs-title">ویرایش</h5>
        <ol class="breadcrumb">
          <li><a href="#">خانه</a></li>
          <li class="active">{{$country->name}}</li>
        </ol>
        @else
        <h5 class="breadcrumbs-title">کشور های سیستم</h5>
        <ol class="breadcrumb">
          <li><a href="#">خانه</a></li>
          <li class="active">کشور های سیستم</li>
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
    <div class="section col s12 m12 l10">


      @if(isset($update))
      <h5 class="center-align cyan-text">ویرایش کشور سیستم </h5>
      <div id="new_rayasat_spy" class="container row scrollspy">
         <form  action="{{ route('country.edit')}}" method="post">
          {!! csrf_field() !!}

          <input type="hidden" name="country_id" value="{{encrypt($country->id)}}">
          <div class="row col s12 m12 l12">
     <div class="input-field col s12 m12 l12">
      <i class="mdi-action-account-box prefix"></i>
      <input id="name" name="name" type="text" value="{{ $country->name }}" required length="64" minlength="2" maxlength="64" class="validate @if ($errors->has('name')) invalid @endif">
      <label for="name">اسم کشور</label>
      @if ($errors->has('name'))
      <span class="error">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>
    
          
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
  <h5 class="center-align cyan-text">ثبت کشور سیستم</h5>
  <div id="new_rayasat_spy" class="container row scrollspy">
   <form  action="{{ route('country.save')}}" method="post">
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
     <div class="input-field col s12 m12 l12">
      <i class="mdi-action-account-box prefix"></i>
      <input id="name" name="name" type="text" value="{{ old('name') }}" required length="64" minlength="2" maxlength="64" class="validate @if ($errors->has('name')) invalid @endif">
      <label for="name">اسم کشور</label>
      @if ($errors->has('name'))
      <span class="error">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>
    
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

<h5 class="center-align cyan-text">کشور های موجود سیستم</h5>
<div  id="reyasats_spy" class="row col s12 m12 l12 scrollspy">
  <table class="responsive-table centered">
    <thead>
      <tr>
        <th>اسم پوهنحُی </th>
      
        <th>حذف پوهنحُی</th>
        <th colspan="3">آپدیت پوهنحُی</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($countries) && count($countries)>0)

      @foreach ($countries as $country)
      <tr>
        <td>{{ $country->name}}</td>
      <td class="cyan-text">
            <a data-toggle="tooltip" title="حذف" href="{{route('country.delete',['id' =>encrypt($country->id)])}}" style="cursor: pointer;" class="delete"> 
              <i class="mdi-action-delete"></i>
            </a>
        </td>

          <td class="cyan-text">
            <a data-toggle="tooltip" href="{{route('country.update',['id' => encrypt($country->id)])}}" title="ویرایش" href="" style="cursor: pointer;">
              <i class="mdi-editor-mode-edit"></i>
            </a>
          </td>

        </tr>
        @endforeach
        {!!$countries->links()!!}
        @else
        <tr>
          <td colspan="4" class="red-text blod">کشور برای سیستم موجود نیست!</td>
        </tr>
        @endif

        <tr class="not_printable"><td colspan="6"><div class="divider"></div></td></tr>
      </tbody>
      <tfoot>
        <tr><div class="divider"></div></tr>
      </tfoot>
    </table>
  </div>
  @endif
</div>
<div class="col hide-on-med-and-down l2 not_printable">
  <ul class="section table-of-contents">

    <li><a href="#">ثبت کشور سیستم</a>
    </li>
    <li><a href="#">کشور های موجود</a>
    </li>

  </ul>
</div>


</div>
</section>
<!-- END CONTENT -->

@stop