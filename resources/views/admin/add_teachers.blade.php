<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Add Teachers | {{config('app.name')}}</title>



  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('front-end/css/bootstrap.css')}}" />
  <!-- progress barstle -->
  <link rel="stylesheet" href="{{asset('front-end/css/css-circular-prog-bar.css')}}">
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- font wesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="{{asset('front-end/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('front-end/css/responsive.css')}}" rel="stylesheet" />




  <link rel="stylesheet" href="{{asset('front-end/css/css-circular-prog-bar.css')}}">


</head>

<body>
  <div class="top_container sub_pages">
    <!-- header section strats -->
    @include('layouts.navber.front.top-navber')
  </div>
  <!-- end header section -->


  <!-- teacher section -->
  <section class="teacher_section layout_padding-bottom">
    <div class="container">
      @include('validation-msg.error-success-massage')
      <div class="row justify-content-center">
        <div class="col-md-8 border border-primary pt-5 pb-5">
            <h2 class="main-heading ">
                Upload Student Information File
              </h2>
              <div class="row justify-content-center mt-5">
                <div class="col-md-4">
                    <form action="{{route('admin.add-teacher')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <label for="student-file"></label>
                        <input id="student-file" type="file" name="csvFile" id="" accept=".csv">
                        <button class="btn btn-primary mt-4">Upload</button>
                    </form>
                </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <h3  class="main-heading text-center">Teachers List</h3>
        <table class="table table-bordered mt-5">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Department</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($teachers as $teacher)
                  <tr>
                    <th scope="row">{{$teacher->teacher_id}}</th>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->email}}</td>
                    {{-- {{dd($teacher->department->name)}} --}}
                    <td>{{$teacher->department->name ?? 'none'}}</td>
                    {{-- <td>{{$teacher->section}}</td> --}}
                  </tr>
                @endforeach
              </tbody>
          </table>
          {{ $teachers->links() }}
    </div>
  </section>

  <!-- teacher section -->


  <!-- footer section -->
  @include('layouts.navber.front.footer')
  <!-- footer section -->

  <script type="text/javascript" src="{{asset('front-end/js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('front-end/js/bootstrap.js')}}"></script>
  <!-- progreesbar script -->
  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>
  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <!-- end google map js -->
</body>

</html>