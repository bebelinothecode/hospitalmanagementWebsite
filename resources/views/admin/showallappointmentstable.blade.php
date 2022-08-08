<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="admin/fonts/icomoon/style.css">

  <link rel="stylesheet" href="admin/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="admin/css/allappointmentstable.css">

  <!-- Style -->
  <link rel="stylesheet" href="admin/css/allappointmentstablestyle.css">

  @include('sweetalert::alert')

  <title>My Appointments</title>
</head>
<body>
  <div class="content">
    <div class="container">
      <div class="table-responsive">
        <table  style="background-color:#212529;" class="table table-striped custom-table">
          <thead>
            <tr>
              <th scope="col">Customer's Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Doctor's name</th>
              <th scope="col">Date</th>
              <th scope="col">Message</th>
              <th scope="col">Appointment time</th>
              <th scope="col">Status</th>
              <th scope="col">Approved</th>
              <th scope="col">Canceled</th>
              <th scope="col">Send Mail</th>
              <th scope="col">Send SMS</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $allappoints)
              <tr>
                  <td style="color: white">{{$allappoints->full_name}}</td>
                  <td style="color: white">{{$allappoints->email_address}}</td>
                  <td style="color: white">{{$allappoints->phone_number}}</td>
                  <td style="color: white">{{$allappoints->doctor}}</td>
                  <td style="color: white">{{$allappoints->date}}</td>
                  <td style="color: white">{{$allappoints->message}}</td>
                  <td style="color: white">{{$allappoints->appointmenttime}}</td>
                  <td style="color: white">{{$allappoints->status}}</td>
                  <td style="color: white"><a class="btn btn-success" href="{{url('approved',$allappoints->id)}}">Approved</a></td>
                  <td style="color: white"><a class="btn btn-danger"  href="{{url('cancelled',$allappoints->id)}}">Cancelled</a></td>
                  <td style="color: white"><a class="btn btn-primary"  href="{{url('sendmail',$allappoints->id)}}">Send Mail</a></td>
                  <td style="color: white"><a class="btn btn-secondary"  href="{{route('send.sms',$allappoints->id)}}">Send SMS</a></td>
             </tr>
                @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="admin/js/jquery-3.3.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="admin/js/popper.min.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>
  <script src="admin/js/main.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  {{-- Sweet Alert Delete --}}
  <script>
    function add() {
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  timer:false,
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
});
 }
  </script>
</body>
</html>