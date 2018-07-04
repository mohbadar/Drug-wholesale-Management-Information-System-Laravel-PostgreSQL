// ================================================================================
//   Item Name: Private Universities Page JS
//   Version: 1.0
//   Authors:Mojeeb Rahman Sedeqi /Sayed Enayat Sadat (ITCC Team)
//   Authors Email: mojeebrahmansedeqi@gmail.com / enayat.sadat10@gmail.com
// ================================================================================ 
/////////////////////Show message box and submit parent form//////////////////
function cmspf(text,type,current) {
  swal({
    title: text,
    type: type,
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'بلی',
    cancelButtonText: "نخیر",
    closeOnConfirm: true
  },
  function(){
    $(current).parent('form').submit();
  });
}
/////////////////dropify//////////////////////////////
function dropify_int(argument) {
  $('.dropify').dropify({
        messages: {
        'default': 'برای انتخاب فایل مربوط را در این جا قرار دهید.',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'غلطی موجود است!'
    },
    error: {
        'fileSize': 'حجم فایل شما از ({{ value }}) بزرگ بوده نمیتواند.',
        'minWidth': 'The image width is too small ({{ value }}}px min).',
        'maxWidth': 'The image width is too big ({{ value }}}px max).',
        'minHeight': 'The image height is too small ({{ value }}}px min).',
        'maxHeight': 'The image height is too big ({{ value }}px max).',
        'imageFormat': 'The image format is not allowed ({{ value }} only).',
        'fileExtension': 'شما میتوانید تنها و تنها به این فارمت  ({{ value }}) فایل داشته باشید.'
    },
    tpl: {
        wrap:            '<div class="dropify-wrapper"></div>',
        loader:          '<div class="dropify-loader"></div>',
        message:         '<div class="dropify-message center-align"><span class="file-icon" /> <p class="center-align bold">{{ default }}</p></div>',
        preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
        filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
        clearButton:     '<button type="button" class="dropify-clear">{{ remove }}</button>',
        errorLine:       '<p class="dropify-error center-align bold">{{ error }}</p>',
        errorsContainer: '<div class="dropify-errors-container center-align bold"><ul class=" center-align bold"></ul></div>'
    }
    });

  $('.dropify-event').dropify({
    messages: {
      'default': ' ',
      'replace': ' ',
      'remove':  'Remove',
      'error':   'Ooops, something wrong appended.'
    }
  });
// Used events

var drEvent = $('.dropify-event').dropify();

drEvent.on('dropify.beforeClear', function(event, element){
  return confirm("Do you really want to delete \"" + element.filename + "\" ?");
});

drEvent.on('dropify.afterClear', function(event, element){
  alert('File deleted');
});
}


/////////Totel_initialization//////////////
function Totel_initialization() {
  // body...

  "use strict";

  var window_width = $(window).width();

  /*Preloader*/
  $(window).load(function() {
    setTimeout(function() {
      $('body').addClass('loaded');      
    }, 200);
  });  


  // Search class for focus
  $('.header-search-input').focus(
    function(){
      $(this).parent('div').addClass('header-search-wrapper-focus');
    }).blur(
    function(){
      $(this).parent('div').removeClass('header-search-wrapper-focus');
    });  

  // Check first if any of the task is checked
  $('#task-card input:checkbox').each(function() {
    checkbox_check(this);
  });

  // Task check box
  $('#task-card input:checkbox').change(function() {
    checkbox_check(this);
  });

  // Check Uncheck function
  function checkbox_check(el){
    if (!$(el).is(':checked')) {
          $(el).next().css('text-decoration', 'none'); // or addClass            
        } else {
          $(el).next().css('text-decoration', 'line-through'); //or addClass
        }    
      }

  /*----------------------
  * Plugin initialization
  ------------------------*/

  // Materialize Slider
  $('.slider').slider({
    full_width: true
  });

  // Materialize Dropdown
  $('.dropdown-button').dropdown({
    inDuration: 300,
    outDuration: 125,
    constrain_width: true, // Does not change width of dropdown to that of the activator
    hover: false, // Activate on click
    alignment: 'left', // Aligns dropdown to left or right edge (works with constrain_width)
    gutter: 0, // Spacing from edge
    belowOrigin: true // Displays dropdown below the button
  });

  // Materialize Tabs
  $('.tab-demo').show().tabs();
  $('.tab-demo-active').show().tabs();

  // Materialize Parallax
  $('.parallax').parallax();
  $('.modal-trigger').leanModal();

  // Materialize scrollSpy
  $('.scrollspy').scrollSpy();

  // Materialize tooltip
  $('.tooltipped').tooltip({
    delay: 50
  });
  $('[data-toggle="tooltip"]').tooltip(); 
  // Materialize sideNav  

  //Main Left Sidebar Menu
  $('.sidebar-collapse').sideNav({
    edge: 'right', // Choose the horizontal origin    
  });

  // FULL SCREEN MENU (Layout 02)
  $('.menu-sidebar-collapse').sideNav({
    menuWidth: 240,
        edge: 'right', // Choose the horizontal origin     
        //defaultOpen:true // Set if default menu open is true
      });

  // HORIZONTAL MENU (Layout 03)
  $('.dropdown-menu').dropdown({
    inDuration: 300,
    outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true // Displays dropdown below the button
    });

  $('.notification-button').dropdown({
    inDuration: 300,
    outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: -50, // Spacing from edge
      belowOrigin: true // Displays dropdown below the button
    });
  $('.user-profile-button').dropdown({
    inDuration: 300,
    outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: -40, // Spacing from edge
      belowOrigin: true // Displays dropdown below the button
    });

  $('.profile-btn').dropdown({
    inDuration: 300,
    outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true // Displays dropdown below the button
    });
  $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  //Main Left Sidebar Chat
  $('.chat-collapse').sideNav({
    menuWidth: 300,
    edge: 'right',
  });
  $('.chat-close-collapse').click(function() {
    $('.chat-collapse').sideNav('hide');
  });
  $('.chat-collapsible').collapsible({
    accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
  });



  // Perfect Scrollbar
  $('select').not('.disabled').material_select();
  var leftnav = $(".page-topbar").height();  
  var leftnavHeight = window.innerHeight - leftnav;
  $('.leftside-navigation').height(leftnavHeight).perfectScrollbar({
    suppressScrollX: true
  });
  // $('.my-leftside-navigation').height(leftnavHeight).perfectScrollbar({
  //   suppressScrollX: true
  // });
  var righttnav = $("#chat-out").height();
  $('.rightside-navigation').height(righttnav).perfectScrollbar({
    suppressScrollX: true
  });  

var f=$(".page-topbar").height(),g=window.innerHeight-f;

$(".my-leftside-navigation").perfectScrollbar({suppressScrollX:!0});
  
  // Fullscreen
  function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
      (!document.mozFullScreen && !document.webkitIsFullScreen)) {
      if (document.documentElement.requestFullScreen) {
        document.documentElement.requestFullScreen();
      }
      else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      }
      else if (document.documentElement.webkitRequestFullScreen) {
        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
    }
    else {
      if (document.cancelFullScreen) {
        document.cancelFullScreen();
      }
      else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      }
      else if (document.webkitCancelFullScreen) {
        document.webkitCancelFullScreen();
      }
    }
  }

$(".toggle-fullscreen").click(function(){b()}),$("nav").length?$(".toc-wrapper").pushpin({top:$("nav").height()}):$("#index-banner").length?$(".toc-wrapper").pushpin({top:$("#index-banner").height()}):$(".toc-wrapper").pushpin({top:0});
function b(){document.fullScreenElement&&null!==document.fullScreenElement||!document.mozFullScreen&&!document.webkitIsFullScreen?document.documentElement.requestFullScreen?document.documentElement.requestFullScreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullScreen&&document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT):document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen()}


  // Floating-Fixed table of contents (Materialize pushpin)
  if ($('nav').length) {
    $('.toc-wrapper').pushpin({
      top: $('nav').height()
    });
  }
  else if ($('#index-banner').length) {
    $('.toc-wrapper').pushpin({
      top: $('#index-banner').height()
    });
  }
  else {
    $('.toc-wrapper').pushpin({
      top: 0
    });
  }
  $('.table-of-contents').pushpin({ top:300,
   offset:120,Bottom:200 });

  $('#breadcrumbs-wrapper').pushpin({ top:250,
   offset:55,Bottom:200 });

  // Toggle Flow Text
  var toggleFlowTextButton = $('#flow-toggle')
  toggleFlowTextButton.click(function() {
    $('#flow-text-demo').children('p').each(function() {
      $(this).toggleClass('flow-text');
    })
  });
  
  
  //Toggle Containers on page
  var toggleContainersButton = $('#container-toggle-button');
  toggleContainersButton.click(function() {
    $('body .browser-window .container, .had-container').each(function() {
      $(this).toggleClass('had-container');
      $(this).toggleClass('container');
      if ($(this).hasClass('container')) {
        toggleContainersButton.text("Turn off Containers");
      }
      else {
        toggleContainersButton.text("Turn on Containers");
      }
    });
  });
  // Detect touch screen and enable scrollbar if necessary
  function is_touch_device() {
    try {
      document.createEvent("TouchEvent");
      return true;
    }
    catch (e) {
      return false;
    }
  }
  if (is_touch_device()) {
    $('#nav-mobile').css({
      overflow: 'auto'
    })
  }
  //Trending chart for small screen
  if(window_width <= 480){    
    $("#trending-line-chart").attr({
      height: '200'
    });
  }


  ////////////////////persion_date init//////////////////////
  $(".persion_date").persianDatepicker({
    months: ["حمل","ثور","جوزا","سرطان","اسد","سنبله","میزان","عقرب","قوس","جدی","دلو","حوت"],
    cellWidth: 56, 
    cellHeight: 30,
    fontSize: 18, 
  });
  /////////////////////////////
function go_next(current) {
 current.addClass("hide");
 current.next().removeClass('hide');
   // Materialize scrollSpy
   $('.scrollspy').scrollSpy("refresh");
 }
 function go_back(current) {
   current.addClass("hide");
   current.prev().removeClass('hide');
   // Materialize scrollSpy
   $('.scrollspy').scrollSpy("refresh");
 }

 function next_confirm(callback,current) {
  swal({
    title: "فارم فعلی کار نشده است!",
    text: "آیا میخواهد این فارم را خالی بگزارید یا خیر؟",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'خالی بگزار!',
    cancelButtonText: "نخیر کار میکنم",
    closeOnConfirm: true
  },
  function(){
   callback(current);
 });
}
$('.arrow-btn.next').on('click',function(){
  var current = $(".scrollspy.section_parent").not(".hide");
  if ($(this).hasClass("submited")) {
    go_next(current);
  } else {
    next_confirm(go_next,current);
  }
});

$('.arrow-btn.back').on('click',function(){
  var current = $(".scrollspy.section_parent").not(".hide");
  if ($(this).hasClass("submited")) {
    swal({
      title: "فارم قبلاَ کار شده است",
      type: "success",
      confirmButtonColor: '#4caf50',
      confirmButtonText: 'درست است'});
    go_back(current);
  } else {
    next_confirm(go_back,current);
  }
});

$('.rad_btn').on('click',function(){
  $(".tasdeq").css('display','none');
  $(".rad").css('display','block');
});
$('.tasdeq_btn').on('click',function(){

  $(".tasdeq").css('display','block');
  $(".rad").css('display','none');
});      
$('#myTeamBtn').on('click',function(){

  $("#myTeam").slideToggle("slow");
});

$('.khareji_btn').change(function(){
  if ($(this).val()=='خارجی') {
    $('.khareji').slideDown("slow");

  } else {
    $('.khareji').slideUp("slow");
  }
});

$('.dawlati_btn').change(function(){
  if ($(this).val()=='بلی') {
    $('.dawlati').slideDown("slow");

  } else {
    $('.dawlati').slideUp("slow");
  }
});

$('.asnad_tasely_btn').change(function(){
  if ($(this).val()=='بکلوریا') {
    $('.asnad.5,.asnad.4 ,.asnad.3,.asnad.2').slideUp("slow");
    $('.asnad.1').slideDown("slow");
  } else if($(this).val()=='فوق بکلوریا'){
    $('.asnad.5,.asnad.4 ,.asnad.3').slideUp("slow");
    $('.asnad.1 ,.asnad.2').slideDown("slow");
  } else if ($(this).val()=='لیسانس') {
    $('.asnad.5,.asnad.4').slideUp("slow");
    $('.asnad.1 ,.asnad.2 ,.asnad.3').slideDown("slow");
  } else if($(this).val()=='ماستر'){
    $('.asnad.5').slideUp("slow");
    $('.asnad.1 ,.asnad.2 ,.asnad.3 ,.asnad.4').slideDown("slow");
  } else if ($(this).val()=='دکتورا') {
    $('.asnad.1 ,.asnad.2 ,.asnad.3, .asnad.4, .asnad.5').slideDown("slow");
  } else{
    $('.asnad.5,.asnad.4 ,.asnad.3,.asnad.2,.asnad.1').slideUp("slow");
  }

});

$('.pohanzy_btn').change(function(){
  // alert($(this).val());
  $(".deportment").slideUp(1000);
  var element = String($(this).val());
  element = element.replace(/,/g, " ,.");
  element = "."+element;
  $(element).slideDown("slow");

});


//////////////////

$('.spy_parent a').on('click',function(){
  $('.spy_parent li').siblings('li').children('a').removeClass("active");
  $(this).siblings('ul').slideToggle();
});
$('.spy_parent ul li').on('click',function(){
  $('.spy_parent li').siblings('li').children('a').removeClass("active");
  $(this).children('a').addClass("active");
});

$('.spy_parent > a').on('click',function(){
  $('.spy_parent').siblings('li').children('a').removeClass("active");
  $(this).children('a').addClass("active");
  $(".scrollspy.section_parent").addClass("hide");
  var str = $(this).attr("href");
  $(str).removeClass('hide');
  $('.asnad.5,.asnad.4 ,.asnad.3,.asnad.2,.asnad.1').slideUp("slow");
  $(".deportment").slideUp(1000);
});
//////////////////////////////

$('.kankor_result_btn').change(function(){
  // alert($(this).val());
  if ($(this).val() == "true") {
$("#pohanzay_id_form").slideDown(1000);
$("#id_phohazy").prop('required',true);
$("#sal_shumol_pohanzay").slideDown(1000).prop('required',true);
  }else{
    $("#pohanzay_id_form").slideUp(1000);
    $("#sal_shumol_pohanzay").slideUp(1000).removeProp('required');
    $("#id_phohazy").removeProp('required');
  }
  
});
$('.colc_tedad_sahat_darsi').change(function(){
  // alert($(this).val());
 var sayat = $(this).val()*16;
$("#sayat").val(sayat);
});

//////////////////////////////////////////////
$('#makan_btn').change(function(){
  // alert($(this).val());
  $(".makan_info").slideUp(1000);
  var id = $(this).val();
  $("#makan_"+id).slideDown(1000);
});
//////////////////////////////////////////////
$('#malik_btn').change(function(){
  // alert($(this).val());
  $(".malik_info").slideUp(1000);
  // var id = $(this).val();
$('#malik_btn :selected').each(function(i, selected){ 
  var id = $(selected).val();
  $("#malik_"+id).slideDown(1000);
});
  
});
///////////////////////////////////////
$('.show_department').click(function(e){
  var department = $(this).attr("department");
  $(".department_part").slideUp(10);
  $("#"+department).slideDown(1000);
});
///////////////////////////////////////
$('.showFileUpload').click(function(e){
  var fileUpload = $(this).attr("fileUpload");
  $("."+fileUpload).slideToggle(10);
});


////////////////////////////////////////
}
$(function() {
  Totel_initialization();
  ////////////////////////dropify////////////////////////////////
  dropify_int();
}); // end of document ready

////////////////////////////////print//////////////////////////////////////////
function Popup(data) 
{  

  var restor = document.body.innerHTML; 
  var prtContent = data;
  document.body.innerHTML=prtContent;
  window.print();
  document.body.innerHTML=restor;
  Totel_initialization();
    $('#kameson_model').closeModal();

}
function PrintElem(elem)
{
 $("[data-toggle='tooltip']").tooltip('hide');
 Popup($(elem).html());
}