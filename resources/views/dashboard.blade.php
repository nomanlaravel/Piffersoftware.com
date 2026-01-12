@include('layouts.header')

@yield('main')
<h3 style="font-weight: 700; margin-left: 530px;">PIFFERS SECURITY SERVICES PVT.LTD</h3> //margin was 205px before

<div class="row head-heading" style="margin-top: 5%; margin-bottom: 5%; margin-left:320px; color: rgb(112, 0, 193);">
  <div class="col-lg-3">
    <h5> <a href=""> Get Things Done </a> </h5>
  </div>

  <div class="col-lg-3">
    <h5> <a href=""> Bussiness Overview </a> </h5>
  </div>

  <div class="col-lg-3">
    <h5> <a href=""> Customize Overview </a> </h5>
  </div>
</div>

<h4>Tasks</h4>
<h6 style="color: grey; margin-left: 255px;">We found email for sales transactions</h6>

<h5 style="color: grey; font-weight: 700; margin-top: 5%; margin-left:255px">
  Shorts
</h5>

<div class="row">
  <div class="col-lg-2">
            <img  src="{{ asset('public/dashboard/pic1.png') }}" style="width:100%; height:70%;" alt=""> <br>
    <p>Report a Non Account holder</p>
  </div>
  <div class="col-lg-2">
    <img src="dashboard/pic2.png" style="width:100%; height:70%;" alt=""> <br>
    <p>Guard without Nadra verification</p>
  </div>
  <div class="col-lg-2">
    <img src="dashboard/pic3.png" style="width:100%; height:70%;" alt=""> <br>
    <p>Guard without Police verification</p>
  </div>
  <div class="col-lg-2">
    <img src="dashboard/pic4.png" style="width:100%; height:70%;" alt=""> <br>
    <p>Guard without accounts</p>
  </div>
  <div class="col-lg-2">
    <img src="dashboard/pic5.png" style="width:100%; height:70%;" alt=""> <br>
    <p>Report a non account holders</p>
  </div>
</div>

</div>
<!--Customer form ends here-->
</div>
@include('layouts.footer')
