    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../mainmenu/dashboard" class="site_title"><i class="fa fa-envelope"></i> <span>ICS SANS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
          
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ session()->get('firstname') }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../students/studentlist">Students List</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Classes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../classes/allclass">All Class</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i>Lecturer <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../lecturer/lecturerlist">Lecturer List</a></li>
                    </ul>
                  </li>
                  
                </ul>
              </div>
            

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>