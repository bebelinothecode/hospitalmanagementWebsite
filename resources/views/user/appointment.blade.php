<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" action="{{url('appointment')}}" method="POST">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Full name" required="">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text"  name="email"class="form-control" placeholder="Email address.." required="">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control" required="">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="doctor" class="custom-select">
              <option value="">--Select doctor--</option>
              {{-- <option value="">Skin</option>
              <option value="">Heart</option>
              <option value="">Kidney</option>
              <option value="">Plastic Surgery</option> --}}
              @foreach ($doctor as $doctors)
              <option value="{{$doctors->doctor_name}}">{{$doctors->doctor_name}}--speciality--{{$doctors->speciality}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="appointmenttime" class="custom-select">
              <option value="">--Select a time slot--</option>
              <option value="11:30am">11:30am</option>
              <option value="13:40pm">13:40pm</option>
              <option value="14:30pm">14:30pm</option>
              <option value="5:00pm">5:00pm</option>
              {{-- @foreach ($doctor as $doctors)
              <option value="{{$doctors->doctor_name}}">{{$doctors->doctor_name}}--speciality--{{$doctors->speciality}}</option>
              @endforeach --}}
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="number" class="form-control" placeholder="Number.." required="">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div>