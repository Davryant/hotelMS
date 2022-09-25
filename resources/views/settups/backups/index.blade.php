@extends('master')
@section('content')
@section('style')
    <style>
        .modal .modal-dialog {

        margin-top: -10vh;

        }
    </style>
@endsection


   <div class="row">
   
   @include('settups.left-side-menu')      

        <div class="col-lg-3">
              <div class="card bd-0 mg-b-10">
                <div class="card-header card-header-default bg-info">
                  Edit Site Logo 
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="/img/logo/logo.png" width="30" height="30" alt="">
                        </div>
                        <div class="col-lg-8">
                            <form action="" method="post">
                                @csrf
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                  </label>
                            </form>
                        </div>
                    </div>
                </div><!-- card-body -->
              </div><!-- card -->

        </div>
    </div><!-- row -->


@endsection
@section('script')
    <script>
     
      
    </script>
@endsection