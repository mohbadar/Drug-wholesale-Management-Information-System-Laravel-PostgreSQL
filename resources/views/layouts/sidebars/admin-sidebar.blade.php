<aside id="my-left-sidebar-nav">
        <ul id="my-slide-out" class="side-nav my-leftside-navigation ">
          <li class="user-details cyan">
            <div class="row">
               <div class="col col s4 m4 l4">
                <img src="{{Auth::user()->photo}}" alt="" class="circle responsive-img valign profile-image materialboxed">
              </div>
              <div class="col col s8 m8 l8">
                <ul id="my-profile-dropdown1" class="dropdown-content">
                 <li>
                        <a href="{{route('user.update', ['id' => encrypt(Auth::user()->id)])}}"><i class="mdi-action-account-box"></i> پروفایل</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                          <form method="post" action="{{route('logout')}}" name="logout">
                               <a class="mdi-action-exit-to-app" onclick="document.forms['logout'].submit();"> خروج از سیستم</a>
                            {!! csrf_field() !!}
                          </form>
                      </li>
              </ul>
                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="my-profile-dropdown1">{{Auth::user()->name}}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                <p class="user-roal">مدیر سیستم</p>
            </div>
          </div>
        </li>
         <li class="bold"><a href="{{ url('/home') }}" class="waves-effect waves-itck"><i class="mdi-action-home"></i>خانه</a>
        </li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header float-buttons"><i class="mdi-action-account-box"></i>استفاده کننده ها</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('user.create')}}">ثبت استفاده کننده </a>
                  </li>
                </ul>
              </div>
            </li>

           <li class="bold"><a class="collapsible-header float-buttons"><i class="mdi-action-account-box"></i>راحستر </a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('country.create')}}">کشور </a>
                  </li>

                  <li><a href="{{route('company.create')}}">شرکت</a>
                  </li>

                  <li><a href="{{route('category.create')}}">نوعیت</a>
                  </li>

                </ul>
              </div>
            </li>



           <li class="bold"><a class="collapsible-header float-buttons"><i class="mdi-action-account-box"></i>مشتریان </a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('customer.create')}}">ثبت مشتری </a>
                  </li>

                  <li><a href="{{route('list.customers')}}">لست مشتریان</a>
                  </li>

                    <li><a href="{{route('loan.create')}}">قرض ها</a>
                  </li>

                    <li><a href="{{route('return.create')}}">برگشت قرض</a>
                  </li>
                </ul>
              </div>
            </li>


            <li class="bold"><a class="collapsible-header float-buttons"><i class="mdi-action-account-box"></i> ادویه </a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('drug.create')}}">ثبت ادویه جدید </a>
                  </li>

                  <li><a href="{{route('list.drugs')}}">لست ادویه جات</a>
                  </li>

                  <li><a href="{{route('list.drugs.expire')}}">لست کم تاریخ ها</a>
                  </li>
                </ul>
              </div>
            </li>


            <li class="bold"><a class="collapsible-header float-buttons"><i class="mdi-action-account-box"></i> راپور </a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('customers.report')}}">راپو حساب مشتریان </a>
                  </li>

                  <li><a href="{{route('list.drugs.expire')}}">راپور ادویه جات</a>
                  </li>


                  <li><a href="{{route('expenses.report')}}">راپور مصارف</a>
                  </li>


                  <li><a href="{{route('bills.report')}}">راپور بل ها</a>
                  </li>
                </ul>
              </div>
            </li>
            

          <li class="bold"><a class="collapsible-header float-buttons"><i class="mdi-action-account-box"></i> بل </a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('bill.create')}}">بل جدید </a>
                  </li>

                  <li><a href="{{route('list.bills')}}">لست بل ها</a>
                  </li>
                </ul>
              </div>
            </li>
            

            <li class="bold"><a class="collapsible-header float-buttons"><i class="mdi-action-account-box"></i> مصارفات </a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('expense.create')}}">ثبت مصرف جدید </a>
                  </li>

                  <li><a href="{{route('list.expenses')}}">لست مصارفات</a>
                  </li>
                </ul>
              </div>
            </li>

            
            
            
            

            
          </ul>
        </li>
        <li class="li-hover"><div class="divider"></div></li>
      </ul>
    </aside>
    <!-- END LEFT SIDEBAR NAV-->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">

        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav not_printable">
          <ul id="slide-out" class="side-nav leftside-navigation hide-on-large-only" style="min-height: 100% !important">
           <li class="user-details cyan">
            <div class="row">
               <div class="col col s4 m4 l4">
                <img src="{{Auth::user()->photo}}" alt="" class="circle responsive-img valign profile-image">
              </div>
              <div class="col col s8 m8 l8">
                <ul id="my-profile-dropdown" class="dropdown-content" >
                 <li>
                        <a href=""><i class="mdi-action-account-box"></i> پروفایل</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                          <form method="post" action="{{route('logout')}}" name="logout">
                               <a class="mdi-action-exit-to-app" onclick="document.forms['logout'].submit();"> خروج از سیستم</a>
                            {!! csrf_field() !!}
                          </form>
                      </li>
              </ul>
             <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="my-profile-dropdown">{{Auth::user()->lastname}}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                <p class="user-roal">مدیر سیستم</p>
            </div>
          </div>
        </li>
         <li class="bold"><a href="{{ url('/home') }}" class="waves-effect waves-itck"><i class="mdi-action-home"></i>خانه</a>
        </li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header float-buttons"><i class="mdi-action-account-box"></i>استفاده کننده ها</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="">ثبت استفاده کننده </a>
                  </li>
                </ul>
              </div>
            </li>
           

            
          </ul>
        </li>
        <li class="li-hover"><div class="divider"></div></li>
          </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
