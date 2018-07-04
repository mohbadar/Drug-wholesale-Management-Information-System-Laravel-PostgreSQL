@extends('templates.master')

@section('title','Drug')

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
          <li class="active">{{$drug->name}}</li>
        </ol>
        @else
        <h5 class="breadcrumbs-title">ادویه جات سیستم</h5>
        <ol class="breadcrumb">
          <li><a href="#">خانه</a></li>
          <li class="active">ادویه جات سیستم</li>
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
      
    <h5 class="center-align cyan-text">ویرایش اطلاعات {{$drug->name}}</h5>
 <div  class="container row scrollspy">
    <form action="{{route('drug.edit')}}" method="post"  enctype="multipart/form-data" >
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
      <hr />
    </div>
    <input type="hidden" name="drug_id" value="{{encrypt($drug->id)}}">
   

    <div class="row col s12 m12 l12">

     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="name" name="name" type="text" value="{{ $drug->name }}" required length="64" minlength="3" maxlength="64" class="validate @if ($errors->has('name')) invalid @endif">
      <label for="name">اسم ادویه</label>
      @if ($errors->has('name'))
      <span class="error">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>

        <div class="input-field col s12 m6 l6">
      <select name="category" required class="browser-default waves-effect waves-light btn-drop">
      <option value="" disabled selected>لطفاُ  کتگوری مربوطه را انتخاب نماید</option>
        @if(isset($categories) && count($categories)>0)
        @foreach ($categories as $category)
        <option value="{{ encrypt($category->id) }}" {{ $drug->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }} </option>
        @endforeach
        @endif
      </select>
      <label>کتگوری</label>
      @if ($errors->has('category'))
      <span class="error">
        <strong>{{ $errors->first('category') }}</strong>
      </span>
      @endif
</div>
    
    </div>


<div class="row col s12 m12 l12">
  


        <div class="input-field col s12 m6 l6">
      <select name="country" required class="browser-default waves-effect waves-light btn-drop" id="country">
      <option value="" disabled selected>لطفاُ  کشور مربوطه را انتخاب نماید</option>
        @if(isset($countries) && count($countries)>0)
        @foreach ($countries as $country)
        <option value="{{ encrypt($country->id) }}" {{ $drug->country_id == $country->id ? 'selected' : ''}}>{{ $country->name }} </option>
        @endforeach
        @endif
      </select>
      <label>کشور</label>
      @if ($errors->has('country'))
      <span class="error">
        <strong>{{ $errors->first('country') }}</strong>
      </span>
      @endif
</div>
    


        <div class="input-field col s12 m6 l6">
      <select name="company" required class="browser-default waves-effect waves-light btn-drop" id="company"> 

      </select>
      <label>کمپنی</label>
      @if ($errors->has('company'))
      <span class="error">
        <strong>{{ $errors->first('company') }}</strong>
      </span>
      @endif
</div>

</div>


    <div class="row col s12 m12 l12">

     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="made_date" name="made_date" type="text" value="{{ $drug->made_date }}"  class="validate @if ($errors->has('made_date')) invalid @endif">
      <label for="made_date">تاریخ تولید</label>
      @if ($errors->has('made_date'))
      <span class="error">
        <strong>{{ $errors->first('made_date') }}</strong>
      </span>
      @endif
    </div>


     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="expire_date" name="expire_date" type="text" value="{{ $drug->expire_date }}"  class="validate @if ($errors->has('expire_date')) invalid @endif">
      <label for="expire_date">تاریخ انقضا</label>
      @if ($errors->has('expire_date'))
      <span class="error">
        <strong>{{ $errors->first('expire_date') }}</strong>
      </span>
      @endif
    </div>


    </div>
     <div class="input-field col s12 m12 l12">
      <i class="mdi-action-account-box prefix"></i>
      <textarea id="remark" name="remark" type="text"  class="validate @if ($errors->has('remark')) invalid @endif materialize-textarea" placeholder="توضیحات در باره ادویه مانند آدرس و ....">
      {{$drug->remark}}
      </textarea>
      <label for="remark">توضیحات</label>
      @if ($errors->has('remark'))
      <span class="error">
        <strong>{{ $errors->first('remark') }}</strong>
      </span>
      @endif
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

  <h5 class="center-align cyan-text">جستجو ادویه</h5>
  <div id="new_rayasat_spy" class="container row scrollspy">
   <form  action="{{ route('drug.search')}}" method="post">
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
     <div class="input-field col s12 m12 l12">
      <i class="mdi-action-account-box prefix"></i>
      <input id="keyword" name="keyword" type="text" value="{{ old('keyword') }}" required length="64" minlength="2" maxlength="64" class="validate @if ($errors->has('keyword')) invalid @endif">
      <label for="name">نام ادویه</label>
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
      <h5 class="center-align cyan-text">ادویه جات سیستم</h5><br>
  <div id="ameryats_spy" class="row col s12 m12 l12 scrollspy">
    <table  class="responsive-table centered">
    <thead>

      <tr>
         <th>کتگوری</th>
        <th>اسم</th>
        <th>تاریخ تولید</th>
        <th>تاریخ انقضا</th>
        <th>کشور</th>
        <th>کمپنی</th>
        <th>تصحیح</th>
        <th colspan="3">حذف</th>
      </tr>
    </thead>
    <tbody>
    @if(count($drugs) >0 && isset($drugs))
      @foreach($drugs as $drug)
      <tr>
        <td>{{$drug->category->name}}</td>
        <td>{{$drug->name}}</td>

        <td>{{$drug->made_date}}</td>
       
        <td>{{$drug->expire_date}}</td>

        <td>
        @if($drug->country->name)
        {{$drug->country->name}}
        @endif      
        </td> 
        <td>
       @if($drug->company->name)
        {{$drug->company->name}}
       @endif  
      </td>     

        <td>        
           <a data-toggle="tooltip" title="ویرایش" style="cursor: pointer;" href="{{route('drug.update', ['id' => encrypt($drug->id)])}}"><i class="mdi-editor-mode-edit"></i></a> 
        </td>

        <td class="cyan-text">
            <a data-toggle="tooltip" title="حذف" href="{{route('drug.delete', ['id' => encrypt($drug->id)])}}" style="cursor: pointer;" class="delete"> 
              <i class="mdi-action-delete"></i>
            </a>
        </td>

      </tr>
      @endforeach
      {!! $drugs->links() !!}
    @else

    <tr>
          <td colspan="8" class="red-text blod">موجود نیست!</td>
        </tr>
    @endif
     </tbody>
    </table>


    @else

    <h5 class="center-align cyan-text">ثبت ادویه جدید به سیستم</h5>
    <div  class="container row scrollspy">
    <form action="{{route('drug.save')}}" method="post"  enctype="multipart/form-data" >
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
      <hr />
    </div>

   
    <div class="row col s12 m12 l12">

     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="name" name="name" type="text" value="{{ old('name') }}" required length="64" minlength="3" maxlength="64" class="validate @if ($errors->has('name')) invalid @endif">
      <label for="name">اسم ادویه</label>
      @if ($errors->has('name'))
      <span class="error">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>

        <div class="input-field col s12 m6 l6">
      <select name="category" required class="browser-default waves-effect waves-light btn-drop">
      <option value="" disabled selected>لطفاُ  کتگوری مربوطه را انتخاب نماید</option>
        @if(isset($categories) && count($categories)>0)
        @foreach ($categories as $category)
        <option value="{{ encrypt($category->id) }}">{{ $category->name }} </option>
        @endforeach
        @endif
      </select>
      <label>کتگوری</label>
      @if ($errors->has('category'))
      <span class="error">
        <strong>{{ $errors->first('category') }}</strong>
      </span>
      @endif
</div>
    
    </div>


<div class="row col s12 m12 l12">
  


        <div class="input-field col s12 m6 l6">
      <select name="country" required class="browser-default waves-effect waves-light btn-drop" id="country">
      <option value="" disabled selected>لطفاُ  کشور مربوطه را انتخاب نماید</option>
        @if(isset($countries) && count($countries)>0)
        @foreach ($countries as $country)
        <option value="{{ encrypt($country->id) }}">{{ $country->name }} </option>
        @endforeach
        @endif
      </select>
      <label>کشور</label>
      @if ($errors->has('country'))
      <span class="error">
        <strong>{{ $errors->first('country') }}</strong>
      </span>
      @endif
</div>
    


        <div class="input-field col s12 m6 l6">
      <select name="company" required class="browser-default waves-effect waves-light btn-drop" id="company"> 

      </select>
      <label>کمپنی</label>
      @if ($errors->has('company'))
      <span class="error">
        <strong>{{ $errors->first('company') }}</strong>
      </span>
      @endif
</div>

</div>


    <div class="row col s12 m12 l12">

     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="made_date" name="made_date" type="text" value="{{ old('made_date') }}"  class="validate @if ($errors->has('made_date')) invalid @endif">
      <label for="made_date">تاریخ تولید</label>
      @if ($errors->has('made_date'))
      <span class="error">
        <strong>{{ $errors->first('made_date') }}</strong>
      </span>
      @endif
    </div>


     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="expire_date" name="expire_date" type="text" value="{{ old('expire_date') }}"  class="validate @if ($errors->has('expire_date')) invalid @endif">
      <label for="expire_date">تاریخ انقضا</label>
      @if ($errors->has('expire_date'))
      <span class="error">
        <strong>{{ $errors->first('expire_date') }}</strong>
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



<script type="text/javascript">



    var get_url = "{{ route('getCompanies') }}";
  //code for retrieving department  of an pohanzays.
  $('#country').on('change', function() {
    var unId = $('#country').val();
    $.ajax({
      method : 'GET',
      url    : get_url,
      data   : {'id' : unId},
      dataType: "json",
    }).done(function(json) {
      var option = '<option value="" disabled selected class="center-align">کمپنی</option>';
      $('#company').empty();
      $.each(json, function(key, value) {
        option += "<option value='" + value['id'] +"'>" + value['name'] +"</option>";
      });

      $('#company').append(option);
      $('select').material_select();

            });

    });

</script>       
      
@stop
