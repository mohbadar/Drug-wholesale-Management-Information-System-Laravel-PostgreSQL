@extends('templates.master')

@section('title','Bill')

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
          <li class="active">{{$item->bill->issue}}</li>
        </ol>
        @else
        <h5 class="breadcrumbs-title">بل های سیستم</h5>
        <ol class="breadcrumb">
          <li><a href="#">خانه</a></li>
          <li class="active">بل سیستم</li>
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
   


    @else


  <div class="row col s12 m12 l12">
    <div class="input-field col s12 m4 l4">
      <a class="btn waves-effect waves-light cyan bold" href="{{route('list.expenses')}}">دانلود PDF
        <i class="mdi-content-send right"></i>
      </a>
    </div>
  </div>

          <h5 class="center-align cyan-text">ادویه های بل</h5><br>
  <div id="ameryats_spy" class="row col s12 m12 l12 scrollspy">
    <table  class="responsive-table centered">
    <thead>

      <tr>
        <th>اسم ادویه</th>
        <th>تعداد</th>
        <th>قیمت فی</th>
        <th>مجموع</th>
        <th colspan="3">حذف</th>
      </tr>
    </thead>
    <tbody>
    @if(count($items) >0 && isset($items))
      @foreach($items as $item)
      <tr>
        <td>{{$item->drug->name}}</td>
        <td>{{$item->quantity}}</td>
        <td>{{$item->price}}</td>
        <td>{{ $item->multiply($item->quantity, $item->price)}}</td>

        <td class="cyan-text">
            <a data-toggle="tooltip" title="حذف" href="{{route('bill.detail.delete', ['id' => encrypt($item->id)])}}" style="cursor: pointer;" class="delete"> 
              <i class="mdi-action-delete"></i>
            </a>
        </td>

      </tr>
      @endforeach
    @else

    <tr>
          <td colspan="8" class="red-text blod"> موجود نیست!</td>
        </tr>
    @endif
     </tbody>
    </table>

<!-- <hr style="border:1px solid #ccc"> -->


    <h5 class="center-align cyan-text">ثبت بل جدید</h5>
    <div  class="container row scrollspy">
    <form action="{{route('bill.detail.save')}}" method="post"  enctype="multipart/form-data" >
    {!! csrf_field() !!}
    <div class="row col s12 m12 l12">
      <hr />
    </div>

    <input type="hidden" name="bill_id"  value="{{$id}}">

   
    <div class="row col s12 m12 l12">

        <div class="input-field col s12 m4 l4">
      <select name="country" required class="browser-default waves-effect waves-light btn-drop" id="country">
      <option value="" disabled selected>لطفاُ  کشور مربوطه را انتخاب نماید</option>
        @if(isset($countries) && count($countries)>0)
        @foreach ($countries as $country)
        <option value="{{ encrypt($country->id) }}">{{ $country->name}} </option>
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


        <div class="input-field col s12 m4 l4">
      <select name="category" required class="browser-default waves-effect waves-light btn-drop" id="category">
      <option value="" disabled selected>لطفاُ  کتگوری مربوطه را انتخاب نماید</option>
        @if(isset($categories) && count($categories)>0)
        @foreach($categories as $category)
        <option value="{{ encrypt($category->id) }}">{{ $category->name}} </option>
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


        <div class="input-field col s12 m4 l4">
      <select name="drug" required class="browser-default waves-effect waves-light btn-drop" id="drug">

      </select>
      <label>ادویه</label>
      @if ($errors->has('drug'))
      <span class="error">
        <strong>{{ $errors->first('drug') }}</strong>
      </span>
      @endif
</div>
    
    <div class="row col s12 m12 l12">
     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="quantity" name="quantity" type="text" value="{{ old('quantity') }}"  class="validate @if ($errors->has('quantity')) invalid @endif">
      <label for="quantity">تعداد</label>
      @if ($errors->has('quantity'))
      <span class="error">
        <strong>{{ $errors->first('quantity') }}</strong>
      </span>
      @endif
    </div>


     <div class="input-field col s12 m6 l6">
      <i class="mdi-action-account-box prefix"></i>
      <input id="price" name="price" type="text" value="{{ old('price') }}"  class="validate @if ($errors->has('price')) invalid @endif">
      <label for="price">قیمت</label>
      @if ($errors->has('price'))
      <span class="error">
        <strong>{{ $errors->first('price') }}</strong>
      </span>
      @endif
    </div>



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



  var get_url = "{{ route('getDrugs') }}";
  //code for retrieving department  of an pohanzays.
  $('#category').on('change', function() {
    var categoryId = $('#category').val();
    var countryId = $('#country').val();
    // alert(categoryId);
    $.ajax({
      method : 'GET',
      url    : get_url,
      data   : {'categoryId' : categoryId, 'countryId': countryId},
      dataType: "json",
    }).done(function(json) {
      var option = '<option value="" disabled selected class="center-align">ادویه</option>';
      $('#drug').empty();
      $.each(json, function(key, value) {
        option += "<option value='" + value['id'] +"'>" + value['name'] +"</option>";
      });

      $('#drug').append(option);
      $('select').material_select();

            });

    });

</script>       
@stop
