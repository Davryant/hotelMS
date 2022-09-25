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
    @include('settups.store.inventory.issue-side-bar')
   
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header card-header-default bg-info">
          Issue an Item
      </div>

      <div class="card-body bd bd-t-0 rounded-bottom">
        @include('alerts.success')

        @csrf
        <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                    <th class="wd-15p">Issue Order Code</th>
                    <th class="wd-15p">Issue By</th>
                    <th class="wd-15p">Date Issued</th>
                    <th class="wd-5p">Action</th>
                  </tr>
            </thead>
            <tbody>
                @foreach ($issues as $item)
                <tr>
                    <td>{{ $item->prepared_no }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                              <a href="/settup/store/issue/{{ $item->prepared_no }}/edit" class="btn btn-info btn-icon mg-r-5 mg-b-10"  title="Edit Item"><div><i class="fa fa-edit"></i></div></a>
                              {{-- <a href="/settup/store/{{ $item->prepared_no }}/show" class="btn btn-success btn-icon mg-r-5 mg-b-10"  title="Show Item"><div><i class="fa fa-eye"></i></div></a> --}}
                              <a href="/settup/store/issue/{{ $item->prepared_no }}/receive" class="btn btn-warning btn-icon mg-r-5 mg-b-10" title="Receive Inventory"><div><i class="fa fa-sign-in"></i></div></a>
                             
                            </div>
                          </div>
                    </td>
                  </tr>
                @endforeach
             
           
            </tbody>
          </table> 
      </div>
  </div>
    </div>
  
</div>

@endsection
@section('script')
<script>
    $(document).ready(function(){
   
   $.ajaxSetup({
     headers:{
       'X-CSRF-Token' : $("input[name=_token]").val()
     }
   });



    $('#datatable1').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
        }
    });

    $(function() {
        'use strict';

        $('.select2').select2();
    });


    // $('#saveBtn').click(function (e) {
    //         e.preventDefault();
    //         $(this).html('Sending..');
        
    //         $.ajax({
    //         data: $('#formadd').serialize(),
    //         url: "/settup/store",
    //         type: "POST",
    //         dataType: 'json',
    //         success: function (responce) {
    //           // alert('Saved');
    //           console.log(responce)
    //           $('#formadd').trigger("reset");
    //           $('#saveBtn').html('Save');

             
    //               swal({
    //                 title: "Good job!",
    //                 text: "Data Saved Successfuly",
    //                 icon: "success",
    //                 button: "Ok",
    //               });

    //             //   if(swal){ // if true (1)
    //             //       setTimeout(function(){// wait for 5 secs(2)
    //             //           location.reload(); // then reload the page.(3)
    //             //       }, 1000); 
    //             //   }
    //         },
    //         error: function (responce) {
    //             console.log(responce);
    //             $('#saveBtn').html('Save');
    //         }
    //     });
    //     });

    });
</script>
@endsection
