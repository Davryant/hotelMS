<script>
    @foreach(App\Models\DishCategory::all() as $catList)
    $(document).ready(function(){
        $("#cat{{ $catList->id }}").click(function(){
            var cat = $("#cat{{ $catList->id }}").val();
            
            $.ajax({
            url:'{{url('/dishCate')}}',
            type: 'get',
            dataType:'html',
            data:'cat_id='+cat,
            success: function(response) {
               console.log(response);

               $(".dishData").html(response);
            }
          });
        });
    });
    @endforeach
</script>