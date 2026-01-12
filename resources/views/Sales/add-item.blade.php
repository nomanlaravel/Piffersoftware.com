@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">

    <div>
        <h5 class="mt-3" style="font-weight: 700;">Compaign Items</h5>
        <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-4 spacing-right">
                    Item Name <br>
                    <input class="form-control" name="item_name" type="text" placeholder="..." style="width: 100%;" required>
                </div>
                <div class="col-lg-4 spacing-right">
                    Item Image <br>
                    <input class="form-control" name="item_image" type="file" placeholder="..." style="width: 100%;" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>


    <!-- Existing Categories -->
    <h5 class="mt-5">Existing Items :</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td><img src="{{ asset($item->item_image) }}" alt="{{ $item->item_name }}" width="100"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
       document.querySelector('.dropdown').addEventListener('mouseover', function () {
           document.querySelector('.dropdown-content').style.display = 'block';
       });

       document.querySelector('.dropdown').addEventListener('mouseout', function () {
           document.querySelector('.dropdown-content').style.display = 'none';
       });
   });
</script>
<script>
   document.getElementById("thumb_img_1").addEventListener("click", function(event) {
      event.preventDefault(); // prevent the default behavior of the link
      $("#image2-details").hide();
      $("#image3-details").hide();
      $("#image4-details").hide();
      $("#image5-details").hide();
      $("#image6-details").hide();
      $("#image7-details").hide();
      $("#image8-details").hide();
      $("#image9-details").hide();

      var div = document.getElementById("image1-details");
      if (div.style.display === "none") {
         div.style.display = "block";
      } else {
         div.style.display = "none";
      }

   });
</script>

