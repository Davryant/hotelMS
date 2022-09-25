

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <meta property="og:title" content="Hotel Pack">
    <meta property="og:description" content="Hotel Package">


    <!-- Meta -->
    <meta name="description" content="Hotel pack.">
    <meta name="author" content="Intouch Technology">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BEACO RESORT</title>

    <!-- vendor css -->
    <link href="/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <link href="/lib/highlightjs/github.css" rel="stylesheet">
    <link href="/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="/lib/spectrum/spectrum.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="/css/starlight.css">
    @yield('style')
    <style>
      .sl-logo img{
        /* width: 200px; */
        /* height: 100px; */
        margin-top: 30px;
      }
      .sl-sideleft{
        
      }
      html {
      /* zoom: 80%; */
      }
    </style>
  </head>

  <body>
    @include('sweetalert::alert')
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="/" ><i class="icon ion-android-star-outline"></i> <img src="/img/logo/beaco.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></a></div>
    <div class="sl-sideleft">
      <div class="sl-sideleft-menu  mg-t-60-force">
        <a href="/acc/front" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        @can('Accomodation-create')

        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Accommodation</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="/acc/service/check-in/all" class="nav-link">Check Inn</a></li>
          <!-- <li class="nav-item"><a href="/acc/service/check-in/all" class="nav-link">All Check In's</a></li> -->
          <li class="nav-item"><a href="/acc/service/check-out/all" class="nav-link">Check Out</a></li>
          <li class="nav-item"><a href="/acc/service/booking/all" class="nav-link">Booking</a></li>
          <li class="nav-item"><a href="/acc/service/all/customer-list" class="nav-link">Customer List</a></li>
          <li class="nav-item"><a href="/acc/service/reservation/all" class="nav-link">Reservation</a></li>
          {{-- <li class="nav-item"><a href="/acc/service/payments/all/customer-list" class="nav-link">Receive Payment</a></li> --}}
        </ul>

        @endcan

        @can('Accomodation-create')

        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-paper-outline tx-20"></i>
            <span class="menu-item-label">Receive Payment</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="/acc/service/payments/all/customer-list" class="nav-link">Accomodation</a></li>
          <li class="nav-item"><a href="/confe/service/booking" class="nav-link">Conference</a></li>
          <li class="nav-item"><a href="/acc/service/booking/all" class="nav-link">Video and Photos</a></li>
        </ul>

        @endcan

        @can('restaurant-pos-create')
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Restaurant</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          {{-- <li class="nav-item"><a href="/res/service/table" class="nav-link">Table</a></li> --}}
          
          <li class="nav-item"><a href="/res/service/pos" class="nav-link">Create KOT</a></li>
          <li class="nav-item"><a href="/rest/bill/room-sales" class="nav-link">Room Sales</a></li>
          <li class="nav-item"><a href="" class="nav-link">Create Receipt</a></li>
          <li class="nav-item"><a href="/rest/bill/create" class="nav-link">Generate Bill</a></li>
          <li class="nav-item"><a href="/rest/bill/create" class="nav-link">View KOT</a></li>
          <li class="nav-item"><a href="/rest/request" class="nav-link">Make Request</a></li>
          <li class="nav-item"><a href="/res/service/report" class="nav-link">Report</a></li>
        </ul>
        @endcan
       

        @can('bar-create')
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">Bar</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
           <li class="nav-item"><a href="" class="nav-link">Make Request</a></li>
           <!--<li class="nav-item"><a href="" class="nav-link">Create Bill</a></li>-->
          <li class="nav-item"><a href="" class="nav-link">Create Receipt</a></li>
          <li class="nav-item"><a href="/bar/service/report" class="nav-link">Report</a></li>
          <li class="nav-item"><a href="/bar/service/pos" class="nav-link">Sale</a></li>
        </ul>
        @endcan
        
        @can('Accomodation-create')
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Conference</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="/confe/service/new" class="nav-link">New Order</a></li>
          {{-- <li class="nav-item"><a href="/confe/service/booking" class="nav-link">Booking</a></li> --}}
          <li class="nav-item"><a href="/confe/service/booking" class="nav-link">All List</a></li>
        </ul>
        @endcan

        @can('Accomodation-create')
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Video & Images</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="/video/service/booking" class="nav-link">New Order</a></li>
          {{-- <li class="nav-item"><a href="/confe/service/booking" class="nav-link">Booking</a></li> --}}
          <li class="nav-item"><a href="/video/service/booking-list" class="nav-link">All List</a></li>
        </ul>
        @endcan

        @can('Store-create')
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
            <span class="menu-item-label">Store</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="/settup/store" class="nav-link">Purchasing Order</a></li>
            <li class="nav-item"><a href="/settup/store/bar" class="nav-link">All Purchasing Order</a></li>
          <li class="nav-item"><a href="/settup/store/bar" class="nav-link">Receive Inventory</a></li>
          <li class="nav-item"><a href="/settup/store/issue" class="nav-link">Issue Inventory</a></li>
          <li class="nav-item"><a href="/settup/store/report" class="nav-link">Report</a></li>
          {{-- <li class="nav-item"><a href="/settup/store" class="nav-link">New Purchasing Order</a></li> --}}
          
          <li class="nav-item"><a href="/settup/store/current-status" class="nav-link">Physical Stock</a></li>
          <!--<li class="nav-item"><a href="/settup/conference" class="nav-link">General Item</a></li>-->
         
        </ul>
        @endcan
      
        @can('finance-create')
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
            <span class="menu-item-label">Finance</span>
          
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="" class="nav-link">Balance Sheet</a></li>
          <li class="nav-item"><a href="" class="nav-link">Profit and Loss</a></li>
          <li class="nav-item"><a href="" class="nav-link">Report</a></li>
          <li class="nav-item"><a href="" class="nav-link">Payment Votcher</a></li>
          <li class="nav-item"><a href="" class="nav-link">Petty Cash</a></li>
          <li class="nav-item"><a href="/payments/service/hotel-income" class="nav-link">Hotel Income</a></li>
        </ul>
        @endcan
      
        @can('Store-create')
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Report</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="" class="nav-link">Bar</a></li>
        
          <li class="nav-item"><a href="/res/service/report" class="nav-link">Restaurant</a></li>
          {{-- <li class="nav-item"><a href="#" class="nav-link">Kitchen</a></li> --}}
          <li class="nav-item"><a href="/acc/service/report" class="nav-link">Accomodation</a></li>
          <li class="nav-item"><a href="/confe/service/report" class="nav-link">Conference</a></li>
          <li class="nav-item"><a href="/payments/service/report" class="nav-link">Payment</a></li>
          <li class="nav-item"><a href="/payments/service/hotel-income" class="nav-link">Hotel Income</a></li>
          <li class="nav-item"><a href="/acc/service/payments/all/pending" class="nav-link">Panding Bills</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Print</a></li>
        </ul>

        @endcan
        
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-22"></i>
            <span class="menu-item-label">Tools</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="/settup/settings" class="nav-link">Profile</a></li>
          <li class="nav-item"><a href="/settup/accomodation/id" class="nav-link">Accommodation</a></li>
          <li class="nav-item"><a href="/settup/bar" class="nav-link">Bar</a></li>
          <li class="nav-item"><a href="/settup/restaurant" class="nav-link">Restaurant</a></li>
          <li class="nav-item"><a href="/settup/store/item-category" class="nav-link">Add Item Category</a></li>
          <li class="nav-item"><a href="/settup/store/item" class="nav-link">Add Item</a></li>
          <li class="nav-item"><a href="/settup/conference" class="nav-link">Conference</a></li>
          <li class="nav-item"><a href="/settup/finance/payment-mode" class="nav-link">Finance</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Kitchen</a></li>
          <li class="nav-item"><a href="#" class="nav-link">House Keeping</a></li>
        </ul>
        
        @can('role-create')
          
         <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-22"></i>
            <span class="menu-item-label">Users</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="/settup/staff" class="nav-link">Assing Staff</a></li>
          <li class="nav-item"><a href="/role" class="nav-link">Roles</a></li>
          <li class="nav-item"><a href="/module" class="nav-link">Permission</a></li>
        </ul>
        @endcan

      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{ Auth::user()->name }}</span></span>
              <img src="/img/img3.jpg" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                {{-- <li><a href="/settup/my-profile"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li> --}}
                {{-- <li><a href="/settup/settings"><i class="icon ion-ios-gear-outline"></i> Settings</a></li> --}}
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();

                  document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

          @csrf

      </form>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      {{-- <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="../img/img4.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                  <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="../img/img7.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                  <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                  <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                  <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                  <span class="tx-12">October 02, 2017 12:44am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">October 01, 2017 10:20pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">October 01, 2017 6:08pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                  <span class="tx-12">September 27, 2017 6:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">September 28, 2017 11:30pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                  <span class="tx-12">September 26, 2017 11:01am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">September 23, 2017 9:19pm</span>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content --> --}}
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
      
        @yield('content')

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="/lib/jquery/jquery.js"></script>
    <script src="/lib/popper.js/popper.js"></script>
    <script src="/lib/bootstrap/bootstrap.js"></script>
    <script src="/lib/jquery-ui/jquery-ui.js"></script>
    <script src="/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="/lib/highlightjs/highlight.pack.js"></script>
    <script src="/lib/datatables/jquery.dataTables.js"></script>
    <script src="/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="/lib/select2/js/select2.min.js"></script>
    <script src="/lib/jquery.steps/jquery.steps.js"></script>
    <script src="/lib/parsleyjs/parsley.js"></script>
    <script src="/lib/spectrum/spectrum.js"></script>

    <script src="/js/starlight.js"></script>
    <script src="/js/swatalert.min.js"></script>

    <script src="/js/ticket.js" async></script>
    <script src="/js/jquery.json-2.4.min.js"></script>
    <script src="/js/tabledit.min.js"></script>
    <script src="/js/numberToWord.js"></script>
    <script src="/js/dataTables.buttons.min.js"></script>
    <script src="/js/buttons.flash.min.js"></script>
    <script src="/js/jszip.min.js"></script>
    <script src="/js/pdfmake.min.js"></script>
    <script src="/js/buttons.html5.min.js"></script>
    <script src="/js/buttons.print.min.js"></script>
    <script src="/js/buttons.colVis.min.js"></script>
    
    @yield('script')
    <script>
      // document.body.style.zoom="80%"
 
    </script>

  </body>
</html>
