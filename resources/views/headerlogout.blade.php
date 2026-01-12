    <div id="main" style="margin-left: 92%;">
          <button class="openbtn" onclick="openNav()">☰</button>
      </div>

      <div id="mySidebar" class="sidebar admin-setting">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
          <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
          <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration
              Setting</a>
          <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
          <hr>
          <a href="{{ url('logout') }}"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
      </div>