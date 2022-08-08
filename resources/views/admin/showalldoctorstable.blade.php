<!doctype html>
<html lang="en">
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="admin/fonts/icomoon/style.css">

  <link rel="stylesheet" href="admin/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="admin/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="admin/css/style.css">

  <title>My Appointments</title>
</head>
<body style="background-color: #212529;">
@include('sweetalert::alert')
  <div  class="content">
    <div class="container">
      <div class="table-responsive">
        <table  class="table table-striped custom-table">
          <thead>
            <tr>
              <th style="color:white;" scope="col">Doctor's name</th>
              <th style="color:white;" scope="col">Doctor's Phone </th>
              <th style="color:white;" scope="col">Speciality</th>
              <th style="color:white;"scope="col">Room Number</th>
              <th style="color:white;" scope="col">Image</th>
              <th style="color:white;" scope="col">Delete</th>
              <th style="color:white;" scope="col">Update</th>
            </tr>
          </thead>
          <tbody>
                @foreach ($data as $doctor)
                <tr>
                    <td style="color:white;">{{$doctor->doctor_name}}</td>
                    <td style="color:white;">{{$doctor->doctor_Pnumber}}</td>
                    <td style="color:white;">{{$doctor->speciality}}</td>
                    <td style="color:white;">{{$doctor->room_number}}</td>
                    <td><img height="200" width="200" src="doctorimage/{{$doctor->doctor_image}}" alt=""></td>
                    <td><a  href="{{url('deletedoctor',$doctor->id)}}" class="btn btn-danger delete-confirm">Delete</a></td>
                    <td><a href="{{url('updatedoctor',$doctor->id)}}" class="btn btn-primary">Update</a></td>
                </tr> 
                @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="admin/js/jquery-3.3.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="admin/js/popper.min.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>
  <script src="admin/js/main.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  {{-- Sweet Alert Delete --}}
  <script>
      $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
  </script>
</body>
</html>