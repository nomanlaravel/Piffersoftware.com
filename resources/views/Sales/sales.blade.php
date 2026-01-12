@include('layouts.header')

@yield('main')

      <div id="content" style="  height: 100vh;
         overflow: auto;">

         <!--End of the Navbar-->
         <div class="head col-lg-10" style="margin-left:190px;">
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: small;">
               <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#sales-planning-activities" type="button" role="tab" aria-controls="inactive" aria-selected="false">  Lead Generation </button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#lead-generation" type="button" role="tab" aria-controls="active" aria-selected="false"> Sales / Planning Activities </button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#target-assignment" type="button" role="tab" aria-controls="branches" aria-selected="true"> Dialy Sales Visits </button>
               </li>
               
               <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#sales-pipeline" type="button" role="tab" aria-controls="inactive" aria-selected="false"> Sales Pipeline </button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#rfq-pipeline" type="button" role="tab" aria-controls="branches" aria-selected="true"> Target Assignments  </button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#daily-sales-visit" type="button" role="tab" aria-controls="active" aria-selected="false"> RFQ Piplelines </button>
               </li>
            </ul>
         </div>
         <!--Customer Form-->
         <div class="customer_form">
            <div id="main" style="margin-left: 92%;">
               <button class="openbtn" onclick="openNav()">☰</button>
            </div>
            <div id="mySidebar" class="sidebar admin-setting">
               <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
               <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
               <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a>
               <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
               <hr>
               <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
            </div>
            <div class="tab-content" id="myTabContent">
               <!--Toggle tab- Status Form-->
               <!--Target Assignment-->
               <div class="tab-pane fade show active" id="target-assignment" role="tabpanel" aria-labelledby="home-tab">
                  <div class="new_branch mt-2">
                     <a href="{{ route('planning') }}"><button>
                     + Add Assignment
                     </button></a>
                  </div>
                  <table class="table table-bordered mt-5" id="user-table">
                     <tr>
                        <th class="col-lg-1 col-sm-1 col-1">Sr No</th>
                        <th class="col-lg-3 col-sm-5 col-1">Name</th>
                        <th class="col-lg-1 col-sm-5 col-1">Code</th>
                        <th class="col-lg- col-sm-5 col-1">Branch Address</th>
                        <th class="col-lg-1 col-sm-1 col-1">Action</th>
                     </tr>
                     <tbody>
                        <tr>
                           <th scope="row">1</th>
                           <td> Nasir Khattak </td>
                           <td>13</td>
                           <td>unknown address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row">2</th>
                           <td> Sultan Raheem </td>
                           <td>79</td>
                           <td>anonymous address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!--Lead Generation-->
               <div class="tab-pane fade" id="lead-generation" role="tabpanel" aria-labelledby="profile-tab">
                     <div class="new_branch mt-2">
                        <button data-toggle="modal" data-target="#add_lead">
                        + New Lead
                        </button>
                     </div>
                     <div class="col-lg-6">
                           <div class="chartjs-size-monitor" style="width: 100%;">
                              <div class="chartjs-size-monitor-expand">
                                    <div></div>
                              </div>
                              <div class="chartjs-size-monitor-shrink">
                                 <div></div>
                              </div>
                           </div>
                     </div>
                     <!--Pie Chart-->
                     <canvas id="myChart" style="width: 484px; max-width: 600px; display: block; height: 242px;" width="484" height="242" class="chartjs-render-monitor"></canvas>
                     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                     <script>
                        var xValues = ["RHQ North-I", "RHQ North-II", "RHQ South", "RFQ Central-I", "RFQ Central-II", "National Sales Office", "Contract Management Department"];
                        var yValues = [55, 49, 44, 24, 15, 30, 20];
                        var barColors = [
                           "#b91d47",
                           "#00aba9",
                           "#2b5797",
                           "#e8c3b9",
                           "#1e7145",
                           "#FFFF00", // New Category 1 color
                           "#36a2eb" // New Category 2 color
                        ];

                        new Chart("myChart", {
                           type: "pie",
                           data: {
                                 labels: xValues,
                                 datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                 }]
                           },
                           options: {
                                 title: {
                                    display: true,
                                    text: "Piffers Sales Review"
                                 }
                           }
                        });
                     </script>
                     <div class="row mt-2">
                        <div class="col-lg-3 mb-2 spacing-right">
                           Total Sales Target FMO<br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-3 mb-2 spacing-right spacing-left">
                           Total Target Achieved <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-2 mb-2 spacing-left ">
                           Total Remaining Target <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                     <div class="container" >
                        <div id="my-chart"></div>
                     </div>
                     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                     <script>
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                           var data = google.visualization.arrayToDataTable([
                              ['Year', 'Sales', 'Expenses', 'Profit'],
                              ['2014', 1000, 400, 200],
                              ['2015', 1170, 460, 250],
                              ['2016', 660, 1120, 300],
                              ['2017', 1030, 540, 350]
                           ]);

                           var options = {
                              chart: {
                                 title: 'Company Performance',
                                 subtitle: 'Commercial Analysis of Prospects',
                              },
                              bars: 'horizontal', // Required for Material Bar Charts.
                              hAxis: {format: 'decimal'},
                              height: 400,
                              colors: ['#1b9e77', '#d95f02', '#7570b3']
                           };

                           var chart = new google.charts.Bar(document.getElementById('my-chart'));

                           chart.draw(data, google.charts.Bar.convertOptions(options));


                           btns.onclick = function (e) {
                              if (e.target.tagName === 'BUTTON') {
                                 options.hAxis.format = e.target.id === 'my-none' ? '' : e.target.id;
                                 chart.draw(data, google.charts.Bar.convertOptions(options));
                              }
                           }
                        }
                     </script>
                      <div class="row">
                       <h6>Commercial Analysis of RHQ North FMO [Current Month] :</h6>
                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Prospect</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Commercial Exchanged</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Negotiation</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>
                     </div>
                     <div class="row mt-2">
                       <h6>Commercial Analysis of RHQ South FMO [Current Month] :</h6>
                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Prospect</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Commercial Exchanged</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Negotiation</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>
                     </div>
                     <div class="row mt-2">
                       <h6>Commercial Analysis of RHQ Central-I FMO [Current Month] :</h6>
                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Prospect</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Commercial Exchanged</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Negotiation</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>
                     </div>
                     <div class="row mt-2">
                       <h6>Commercial Analysis of RHQ Central-II FMO [Current Month] :</h6>
                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Prospect</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Commercial Exchanged</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Negotiation</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>
                     </div>
                     <div class="row mt-2">
                       <h6>Commercial Analysis of National Sales Office FMO [Current Month] :</h6>
                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Prospect</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Commercial Exchanged</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Negotiation</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>
                     </div>
                     <div class="row mt-2">
                       <h6>Commercial Analysis of CMD FMO [Current Month] :</h6>
                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Prospect</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Commercial Exchanged</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Negotiation</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>
                     </div>
                     <div class="row mt-2">
                       <h5>Total Commercial Analysis Nationwide:</h5>
                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Prospect</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Commercial Exchanged</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">Negotiation</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>
                     </div>
                     <br>
                     <style media="screen">
                        /**************************************************************************/
                        /* GENERIC                                                                */
                        /**************************************************************************/
                        *{
                           margin: 0;
                           padding: 0;
                        }

                        *,
                        *:before,
                        *:after{
                           box-sizing: border-box;
                        }

                        body{
                           font-family: Helvetica, Arial, Sans-Serif;
                           font-weight: normal;
                           line-height: 1.4em;
                           font-size: 0.9em;
                           color: #000;
                        }


                        /**************************************************************************/
                        /* DESKTOP                                                                */
                        /**************************************************************************/

                        /* FIGURE */
                        figure{
                           min-width: 200px;
                           max-width: 600px;
                           margin: 2rem;
                           padding: 1.5rem 2rem 2rem;
                           border: 1px solid #000;
                        }

                        /* TABLE */
                        .barChart_h{
                           display: block;
                           height: auto;                         /* Do I need this? */
                           width: 100%;
                           overflow-wrap: break-word;
                           border-spacing: 0;
                        }

                        /* CAPTION */
                        .barChart_h caption{
                           display: block;
                           padding: 0 0 1rem 0;
                           line-height: 1.1;
                           font-size: 1.1rem;
                           font-weight: bold;
                           text-align: left;
                        }

                        /* TBODY */
                        .barChart_h tbody{
                           display: block
                        }

                        .barChart_h tbody:after{                /* For IE9 and under, need to enclose floats... */
                           content: "";
                           display: block;
                           clear: both;
                           height: 0;
                        }

                        /* TH */
                        .barChart_h tbody th{
                           width: 25%;
                           font-weight: normal;
                           text-align: right;
                        }

                        /* TD */
                        .barChart_h tbody td{
                           border-left: 2px solid #F00;          /* X-AXIS. (vertical) */

                           border-right: 1px solid #DDD;         /* Finish out repeating vertical-gridlines. */

                           background-image: linear-gradient(to right, #DDD 1px, transparent 1px);
                                                               /* Create black-transparent gradient for 1px, then remainder of gradient is transparent.
                                                                  This creates the illusion of a 1px vertical-line. */
                           background-size: 10% 100%;            /* Go right in 10% increments. */
                        }

                        /* TH+TD */
                        .barChart_h tbody th,
                        .barChart_h tbody td{
                           padding: 0.5rem 0 0.4rem 0;           /* Space around Bars. */
                        }

                        .barChart_h tbody tr.firstRow th,
                        .barChart_h tbody tr.firstRow td{
                           padding: 1rem 0 0.5rem 0;             /* Add spacing. */
                        }

                        .barChart_h tbody tr.lastRow th,
                        .barChart_h tbody tr.lastRow td{
                           padding: 0.5rem 0 1rem 0;             /* Add spacing. */
                        }

                        /* BARS */
                        .barChart_h tbody td span{
                           position: relative;                   /* Needed for absolute-positioning of Bar-value. */
                           display: block;                       /* Expands <span> to fill <td> */
                           height: 20px;
                           background: #99FFFF;
                           border-top: 1px solid #000;
                           border-right: 1px solid #000;
                           border-bottom: 1px solid #000;
                           box-shadow: 5px 0px 5px rgba(0, 0, 0, 0.3);
                        }

                        /* BAR-VALUES */
                        .barChart_h tbody td span b{
                           position: absolute;
                           left: 100%;
                           top: 0;
                           right: auto;
                           bottom: 0;
                           display: block;
                           padding: 0 0 0 0.5rem;
                        }

                        /* Y-AXIS TITLE+LABELS */
                        .barChart_h tbody th.y-axis{
                           display: block;
                           width: 100%;
                     /*      width: calc(100% + 2px);            /* Hide right border. /**/

                           display: flex;                        /* Create Flexbox (Flex-Container). */
                           padding-bottom: 1.4rem;
                           font-weight: bold;
                           border-bottom: 2px solid #F00;        /* Y-AXIS. (horizontal) */
                           background-color: #FFF;
                        }


                        /* NEED HELP WITH STYLES BELOW... */

                        /* Y-AXIS TITLE */
                        .barChart_h tbody .rotate{
                           display: block;
                        }
                     /*
                           -ms-writing-mode: initial;
                           writing-mode: initial;
                           white-space: nowrap;
                           transform: none;
                           margin: 0;
                           line-height: normal;
                           font-size: 0.9rem;
                        }
                     /**/

                        /* Y-AXIS LABELS */
                        .barChart_h tbody th.y-axis ol.segments{
                           position: absolute;
                           top: auto;
                           bottom: 0;
                           right: 0;
                           left: 0;
                           display: flex;                        /* Create Flexbox (Flex-Container). */
                           flex-direction: row;
                           font-size: 0.9rem;
                        }

                        .barChart_h tbody ol.segments li{
                           flex: 1 0 0;
                           text-align: right;
                        }

                        .barChart_h tbody ol.segments li b{
                           display: inline-flex;
                           transform: translate(50%, 0%);
                        }

                        .barChart_h tbody ol.segments li.zero{
                           left: 0;
                           right: auto;
                           bottom: auto;
                           top: 0;
                        }

                        .barChart_h tbody ol.segments li.zero b{
                           transform: translate(-50%, 0%);
                        }

                        /**************************************************************************/
                        /* MOBILE                                                                 */
                        /**************************************************************************/
                        @media screen and (max-width: 414px){
                           body{
                           font-size: 0.8em;
                           }

                           /* CAPTION */
                           .barChart_h caption{
                           font-size: 1rem;
                           }

                           /* FIGURE */
                           figure{
                           margin: 0;
                           padding: 1rem;
                           }

                           /* TD */
                           .barChart_h tbody td{
                           width: 60%;
                           }
                        }

                     </style>
                     <figure>
                        <table class="barChart_h">
                           <caption>Region Wise Sales Report.</caption>

                           <tbody>
                           <!-- Y-axis -->
                           <!-- <tr>
                              <th class="blankCell"></th>
                              <th class="y-axis">
                                 <div class="rotate">Responses</div>
                                 <ol class="segments">
                                 <li><b>100</b></li>
                                 <li><b>80</b></li>
                                 <li><b>60</b></li>
                                 <li><b>40</b></li>
                                 <li><b>20</b></li>
                                 <li class="zero"><b>0</b></li>
                                 </ol>
                              </th>
                           </tr> -->

                           <!-- Data Rows -->
                           <tr class="firstRow">
                              <th scope="row">Contract Management</th>
                              <td><span style="width:10%"><b>10</b></span></td>
                           </tr>
                           <tr>
                              <th scope="row">National Sales Office</th>
                              <td><span style="width:30%"><b>30</b></span></td>
                           </tr>
                           <tr>
                              <th scope="row">RHQ Central-I</th>
                              <td><span style="width:20%"><b>20</b></span></td>
                           </tr>
                           <tr>
                              <th scope="row">RHQ Central-II</th>
                              <td><span style="width:70%"><b>70</b></span></td>
                           </tr>
                           <tr>
                              <th scope="row">RHQ South</th>
                              <td><span style="width:9 0%"><b>90</b></span></td>
                           </tr>
                           <tr class="lastRow">
                              <th scope="row">RHQ North</th>
                              <td><span style="width:40%"><b>40</b></span></td>
                           </tr>
                           </tbody>

                        </table>
                     </figure>
                     <div class="row">
                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">RHQ North Sales FMO [Current Month]</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">RHQ South Sales FMO [Current Month]</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">RHQ Central-I Sales FMO [Current Month]</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>
                     </div>
                     <div class="row mt-2">
                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">RHQ Central-II Sales FMO [Current Month]</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">National Sales Office Sales FMO [Current Month]</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>

                        <div class="col-lg-4 spacing-right">
                              <label for="" class="mb-0">CMD Sales FMO [Current Month]</label>
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>
                     </div>
                     <h5>Total Sales Figure :</h5>
                     <div class="row mt-2">
                        <div class="col-lg-4 spacing-right">
                              <input class="form-control" id="exampleFormControlTextarea1" />
                        </div>
                     </div>
                  </div>
               <!--Sales Pipeline-->
               <div class="tab-pane fade" id="sales-pipeline" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="new_branch mt-2">
                     <button data-toggle="modal" data-target="#add_sales">
                     + Add Sales
                     </button>
                  </div>
                  <table class="table table-bordered mt-5" id="user-table">
                     <tr>
                        <th class="col-lg-1 col-sm-1 col-1">Sr No</th>
                        <th class="col-lg-3 col-sm-5 col-1">Name</th>
                        <th class="col-lg-1 col-sm-5 col-1">Code</th>
                        <th class="col-lg- col-sm-5 col-1">Branch Address</th>
                        <th class="col-lg-1 col-sm-1 col-1">Action</th>
                     </tr>
                     <tbody>
                        <tr>
                           <th scope="row">1</th>
                           <td> Nasir Khattak </td>
                           <td>13</td>
                           <td>unknown address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row">2</th>
                           <td> Sultan Raheem </td>
                           <td>79</td>
                           <td>anonymous address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row">3</th>
                           <td> Nosherwan Ali </td>
                           <td>97</td>
                           <td>Finding address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!--RFQ Pipeline-->
               <div class="tab-pane fade" id="rfq-pipeline" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="new_branch mt-2">
                     <button data-toggle="modal" data-target="#add_rfq">
                     + Add RFQ
                     </button>
                  </div>
                  <table class="table table-bordered mt-5" id="user-table">
                     <tr>
                        <th class="col-lg-1 col-sm-1 col-1">Sr No</th>
                        <th class="col-lg-3 col-sm-5 col-1">Name</th>
                        <th class="col-lg-1 col-sm-5 col-1">Code</th>
                        <th class="col-lg- col-sm-5 col-1">Branch Address</th>
                        <th class="col-lg-1 col-sm-1 col-1">Action</th>
                     </tr>
                     <tbody>
                        <tr>
                           <th scope="row">1</th>
                           <td> Nasir Khattak </td>
                           <td>13</td>
                           <td>unknown address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row">2</th>
                           <td> Sultan Raheem </td>
                           <td>79</td>
                           <td>anonymous address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row">3</th>
                           <td> Nosherwan Ali </td>
                           <td>97</td>
                           <td>Finding address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!--Daily Sales Visit-->
               <div class="tab-pane fade" id="daily-sales-visit" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="new_branch mt-2">
                     <button data-toggle="modal" data-target="#add_daily">
                     + Add Daily Sales
                     </button>
                  </div>
                  <table class="table table-bordered mt-5" id="user-table">
                     <tr>
                        <th class="col-lg-1 col-sm-1 col-1">Sr No</th>
                        <th class="col-lg-3 col-sm-5 col-1">Name</th>
                        <th class="col-lg-1 col-sm-5 col-1">Code</th>
                        <th class="col-lg- col-sm-5 col-1">Branch Address</th>
                        <th class="col-lg-1 col-sm-1 col-1">Action</th>
                     </tr>
                     <tbody>
                        <tr>
                           <th scope="row">1</th>
                           <td> Nasir Khattak </td>
                           <td>13</td>
                           <td>unknown address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row">2</th>
                           <td> Sultan Raheem </td>
                           <td>79</td>
                           <td>anonymous address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row">3</th>
                           <td> Nosherwan Ali </td>
                           <td>97</td>
                           <td>Finding address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!--Sales / Planning Activities-->
               <div class="tab-pane fade" id="sales-planning-activities" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="new_branch mt-2">
                     <button data-toggle="modal" data-target="#add_planning">
                     + Add Sales / Planning
                     </button>
                  </div>
                  <table class="table table-bordered mt-5" id="user-table">
                     <tr>
                        <th class="col-lg-1 col-sm-1 col-1">Sr No</th>
                        <th class="col-lg-3 col-sm-5 col-1">Name</th>
                        <th class="col-lg-1 col-sm-5 col-1">Code</th>
                        <th class="col-lg- col-sm-5 col-1">Branch Address</th>
                        <th class="col-lg-1 col-sm-1 col-1">Action</th>
                     </tr>
                     <tbody>
                        <tr>
                           <th scope="row">1</th>
                           <td> Nasir Khattak </td>
                           <td>13</td>
                           <td>unknown address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row">2</th>
                           <td> Sultan Raheem </td>
                           <td>79</td>
                           <td>anonymous address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th scope="row">3</th>
                           <td> Nosherwan Ali </td>
                           <td>97</td>
                           <td>Finding address</td>
                           <td>
                              <div class="btn-group dropup">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-gear-wide"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <i class="bi bi-trash" type="button" href="#"></i> <br>
                                    <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                                    <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                                 </div>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!--Customer Portfolio/Tagging-->
               <div class="tab-pane fade" id="customer-portfolio-tagging" role="tabpanel" aria-labelledby="contact-tab">
                  <h5 class="mt-3" style="font-weight: 700;">
                     Customers
                   </h5>
                 <div class="new_branch mt-2">
                     <button data-toggle="modal" data-target="#add_user">
                       + Add Customer
                     </button>
                 </div>

                 <table class="table table-bordered mt-5" id="user-table">
                   <tr>
                     <th class="col-lg-1 col-sm-1 col-1">Sr No</th>
                     <th class="col-lg-3 col-sm-5 col-1">Customer ID</th>
                     <th class="col-lg-1 col-sm-5 col-1">Site ID</th>
                     <th class="col-lg- col-sm-5 col-1">Company Name</th>
                     <th class="col-lg-1 col-sm-1 col-1">Action</th>
                   </tr>

                 <tbody>
                   <tr>
                     <th scope="row">1</th>
                     <td> 1 </td>
                     <td>13</td>
                     <td>unknown address</td>
                     <td>
                       <div class="btn-group dropup">
                         <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="bi bi-gear-wide"></i>
                         </button>
                         <div class="dropdown-menu">
                           <i class="bi bi-trash" type="button" href="#"></i> <br>
                           <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                           <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                         </div>
                       </div>
                     </td>
                   </tr>
                   <tr>
                     <th scope="row">2</th>
                     <td>2</td>
                     <td>79</td>
                     <td>anonymous address</td>
                     <td>
                       <div class="btn-group dropup">
                         <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="bi bi-gear-wide"></i>
                         </button>
                         <div class="dropdown-menu">
                           <i class="bi bi-trash" type="button" href="#"></i> <br>
                           <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                           <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                         </div>
                       </div>
                     </td>
                   </tr>
                   <tr>
                     <th scope="row">3</th>
                     <td>3</td>
                     <td>97</td>
                     <td>Finding address</td>
                     <td>
                       <div class="btn-group dropup">
                         <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="bi bi-gear-wide"></i>
                         </button>
                         <div class="dropdown-menu">
                           <i class="bi bi-trash" type="button" href="#"></i> <br>
                           <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                           <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                         </div>
                       </div>
                     </td>
                   </tr>
                 </tbody>
               </table>
               </div>
            </div>
            <!--Popup model for Sales Pipeline-->
            <div class="modal fade" id="add_sales" >
               <div class="modal-dialog" role="document" style="max-width: 90%;">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> Sales Pipeline </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <section>
                           <form action="" class="liscence_form m-5" style="width: 90%;">
                              <div class="row">
                                 <h5>Sales Pipeline Details</h5>
                                 <div class="col-lg-6 spacing-right">
                                    <div class="row mb-2 mt-3">
                                       <div class="col-lg-10 spacing-right">
                                          What We Offer  <br>
                                          <select id="hrm_type" class="input_field mt-1" name="hrmType" style="width: 100%;">
                                             <option value="Service 1">Men Guarding Services</option>
                                             <option value="Service 2">Escort Services</option>
                                             <option value="Service 3">Canine Services</option>
                                             <option value="Service 4">Facilitation Services</option>
                                             <option value="Service 5">Event Security</option>
                                             <option value="Service 6">Security Consultancy</option>
                                             <option value="Service 7">Fire Fighting Equipment</option>
                                             <option value="Service 8">Security Equipment</option>
                                             <option value="Service 9">CCTV</option>
                                             <option value="Service 10">Security Alarm System</option>
                                             <option value="Service 11">Web Surveillance Solutions</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row mb-1">
                                       <h6>Client Details</h6>
                                       <div class="col-lg-3 spacing-right">
                                          Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-3  spacing-left spacing-right">
                                          Contact No  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-4 spacing-left spacing-right">
                                          Visiting Card <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                    <div class="row mb-1">
                                       <div class="col-lg-10  spacing-right">
                                          Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                    <div class="row mb-1">
                                       <div class="col-lg-5  spacing-right">
                                          POC Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-5  spacing-left spacing-right">
                                          City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                    <div class="row mb-3">
                                       <div class="col-lg-10 spacing-right">
                                          Address  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    <div class="row" style="margin-top: 6%;">
                                       <div class="col-lg-5 spacing-right">
                                          Type <br>
                                          <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                             <option value="Public">Public</option>
                                             <option value="Private">Private</option>
                                          </select>
                                       </div>
                                       <div class="col-lg-5 spacing-left spacing-right">
                                          Initiation Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                    <div class="row mb-1">
                                       <div class="col-lg-5 spacing-right">
                                          Submission Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-5 spacing-left spacing-right">
                                          <div class="dropdown">
                                             <button class="btn-dropdown dropdown-toggle input_field" style="background-color: white; margin-top: 10%; width: 100%; border: groove;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             Bid Security
                                             </button>
                                             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" data-toggle="collapse" href="#yes" role="button" aria-expanded="false" aria-controls="collapseExample">YES</a>
                                                <a class="dropdown-item" data-toggle="collapse" href="#no" role="button" aria-expanded="false" aria-controls="collapseExample">NO</a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="collapse" id="yes">
                                          <div class="mt-4">
                                             <input class="input_field" type="text" placeholder="..." style="width: 83%;">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row mb-1">
                                       <div class="col-lg-5 spacing-right">
                                          Status
                                          <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                             <option value="Document-Collection">Document Collection</option>
                                             <option value="WIP">WIP</option>
                                             <option value="Submitted">Submitted</option>
                                             <option value="Qualified">Qualified</option>
                                             <option value="Disqualified">Disqualified</option>
                                          </select>
                                       </div>
                                       <div class="col-lg-5 spacing-left spacing-right">
                                          Region
                                          <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                             <option value="No">Region 1</option>
                                             <option value="Yes">Region 2</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="row mb-1" style="margin-top: 4%;">
                                       <div class="col-lg-5 spacing-right">
                                          Sales Person  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-5 spacing-left spacing-right">
                                          Operations POC <br>
                                          <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                             <option value="Operations1">Operations 1</option>
                                             <option value="Operations2">Operations 2</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row mb-1" >
                                       <div class="col-lg-5 spacing-right">
                                          Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-5 spacing-left spacing-right">
                                          Estimated Revenue <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                    <!-- <div class="row mb-1" >
                                       <div class="col-lg-10 spacing-right">
                                           Summary  <br> <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
                                        </div>
                                       </div> -->
                                    <div class="row mb-2">
                                       <div class="col-lg-10 spacing-right">
                                          Notes & Remarks <br>
                                          <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="row mb-1" style="margin-top: 4%;">
                                       <div class="col-lg-5 spacing-right">
                                          Target Month/Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-5 spacing-left spacing-right">
                                          Status <br>
                                          <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                             <option value="Operations1">Iniatiation</option>
                                             <option value="Operations2">Prospecting</option>
                                             <option value="Operations1">Qualifying</option>
                                             <option value="Operations2">Proposal Submission</option>
                                             <option value="Operations1">Negotiation</option>
                                             <option value="Operations2">Successful</option>
                                             <option value="Operations1">Opportunity</option>
                                             <option value="Operations2">Lead Generation</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row" >
                                       <div class="col-lg-12 spacing-right">
                                          <div class="row mb-1">
                                             <div class="col-lg-5 ">
                                                Propability  <br>
                                                <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                                   <option value="low">low</option>
                                                   <option value="medium">medium</option>
                                                   <option value="high">high</option>
                                                </select>
                                             </div>
                                             <div class="col-lg-5 spacing-left">
                                                Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
							   <!--Tabs forDetails-->
							   <nav>
								<div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
								   <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#address-info1" role="tab" aria-controls="nav-home" aria-selected="true">Address Info</a>
								   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#leads-info1" role="tab" aria-controls="nav-profile" aria-selected="false">Leads Info</a>
								   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#details-of-sales-agent1" role="tab" aria-controls="nav-profile" aria-selected="false">Details of Sales Agent</a>
								   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#sales-visit1" role="tab" aria-controls="nav-profile" aria-selected="false">Sales Visit</a>
								   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#comparative-analysis1" role="tab" aria-controls="nav-contact" aria-selected="false">Competitive Analysis</a>
								   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#rfq-documents1" role="tab" aria-controls="nav-contact" aria-selected="false">RFQ Documents</a>
								   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#attachements1" role="tab" aria-controls="nav-contact" aria-selected="false">Attachements</a>
								   <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#basic-info" role="tab" aria-controls="nav-contact" aria-selected="false">Basic Info</a> -->
								   <!-- <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#summary" role="tab" aria-controls="nav-home" aria-selected="true">Summary</a> -->
								   <!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#site-id" role="tab" aria-controls="nav-profile" aria-selected="false">Site ID</a> -->
								   <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="nav-contact" aria-selected="false">Accounts</a> -->
								   <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#rfq-pipelines" role="tab" aria-controls="nav-contact" aria-selected="false">RFQ Pipeline</a>
									  <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#sales-pipeline" role="tab" aria-controls="nav-home" aria-selected="true">Sales Pipeline</a> -->
								</div>
							 </nav>
							 <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
								<!--address-info-->
								<div class="tab-pane fade show active m-3" style="opacity: 90%;" id="address-info1" role="tabpanel" aria-labelledby="nav-home-tab">
								   <div class="row">
									  <div class="col-lg-6 spacing-right">
										 <div class="row mb-2">
											<div class="col-lg-2 spacing-right">
											   Street  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-4  spacing-left spacing-right">
											   State  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-4 spacing-left spacing-right">
											   Country  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-5 spacing-right">
											   Region  <br>
											   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
												  <option value="hrm_guard">region1</option>
												  <option value="hrm_staff">region2</option>
											   </select>
											</div>
											<div class="col-lg-3  spacing-left spacing-right">
											   City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-2 spacing-left spacing-right">
											   Zip Code  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-10 spacing-right">
											   <input class="input_field" type="text" placeholder="www.facebook.com/" style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-10 spacing-right">
											   <input class="input_field" type="text" placeholder="www.skype.com/" style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-10 spacing-right">
											   <input class="input_field" type="text" placeholder="www.twitter.com/" style="width: 100%;">
											</div>
										 </div>
									  </div>
									  <div class="col-lg-6 spacing-right">
										 <div class="row mb-1">
											<div class="col-lg-10 spacing-right">
											   Company  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-1">
											<div class="col-lg-6 spacing-right">
											   Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-4 spacing-left spacing-right">
											   Fax  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-1">
											<div class="col-lg-10 spacing-right">
											   website  <br>  <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-1">
											<div class="col-lg-10 spacing-right">
											   Notes & Remarks <br>
											   <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea>
											</div>
										 </div>
									  </div>
									  <div class="row">
										 <div class="col-lg-3 mt-3" style="margin-left: 35%;">
											<button type="button" class="add-more-btn" style="width: 90%;" onclick="sales_address_add_fields()">Add Addresses</button>
										 </div>
									  </div>
								   </div>
								   <div id="sales_address_add_fields">
								   </div>
								</div>
								<!--leads-info-->
								<div class="tab-pane fade m-3" style="opacity: 90%;" id="leads-info1" role="tabpanel" aria-labelledby="nav-profile-tab">
								   <div class="row">
									  <div class="col-lg-6 spacing-right">
										 <div class="row mb-2">
											<div class="col-lg-10 spacing-right">
											   What We Offer  <br>
											   <select id="hrm_type" class="input_field mt-1" name="hrmType" style="width: 100%;">
												  <option value="Service 1">Men Guarding Services</option>
												  <option value="Service 2">Escort Services</option>
												  <option value="Service 3">Canine Services</option>
												  <option value="Service 4">Facilitation Services</option>
												  <option value="Service 5">Event Security</option>
												  <option value="Service 6">Security Consultancy</option>
												  <option value="Service 7">Fire Fighting Equipment</option>
												  <option value="Service 8">Security Equipment</option>
												  <option value="Service 9">CCTV</option>
												  <option value="Service 10">Security Alarm System</option>
												  <option value="Service 11">Web Surveillance Solutions</option>
											   </select>
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-5 spacing-right">
											   Lead Generated By  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-5  spacing-left spacing-right">
											   Lead Assigned To  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-5  spacing-right">
											   Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-5 spacing-left spacing-right">
											   Estimated Revenue  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-6 spacing-right">
											   Name  <br>  <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-4 spacing-left spacing-right">
											   Phone  <br>  <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;">
											</div>
										 </div>
									  </div>
									  <div class="col-lg-6 spacing-right">
										 <div class="row mb-2">
											<div class="col-lg-10 spacing-right">
											   Date Initiated  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-10 spacing-right">
											   Notes & Remarks <br>
											   <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea>
											</div>
										 </div>
									  </div>
								   </div>
								   <div class="rfq-pipeline" style="display: none;">
									  <div class=" row">
										 <div class="col-lg-6 spacing-right">
											<div class="row mb-1">
											   <h6>Client Details</h6>
											   <div class="col-lg-6 spacing-right">
												  Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											   <div class="col-lg-4  spacing-left spacing-right">
												  Contact No  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
											<div class="row mb-1">
											   <div class="col-lg-10  spacing-right">
												  Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
											<div class="row mb-1">
											   <div class="col-lg-5  spacing-right">
												  POC Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											   <div class="col-lg-5  spacing-left spacing-right">
												  City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
											<div class="row mb-3">
											   <div class="col-lg-10 spacing-right">
												  Address  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
										 </div>
										 <div class="col-lg-6 spacing-right">
											<div class="row" style="margin-top: 6%;">
											   <div class="col-lg-5 spacing-right">
												  Type <br>
												  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													 <option value="Public">Public</option>
													 <option value="Private">Private</option>
												  </select>
											   </div>
											   <div class="col-lg-5 spacing-left spacing-right">
												  Initiation Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
											<div class="row mb-1">
											   <div class="col-lg-5 spacing-right">
												  Submission Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											   <div class="col-lg-5 spacing-left spacing-right">
												  Bid Security
												  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													 <option value="No">No</option>
													 <option value="Yes">Yes</option>
												  </select>
											   </div>
											</div>
											<div class="row mb-1">
											   <div class="col-lg-5 spacing-right">
												  Status
												  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													 <option value="Document-Collection">Document Collection</option>
													 <option value="WIP">WIP</option>
													 <option value="Submitted">Submitted</option>
													 <option value="Qualified">Qualified</option>
													 <option value="Disqualified">Disqualified</option>
												  </select>
											   </div>
											   <div class="col-lg-5 spacing-left spacing-right">
												  Region
												  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													 <option value="No">Region 1</option>
													 <option value="Yes">Region 2</option>
												  </select>
											   </div>
											</div>
										 </div>
									  </div>
									  <div class="row">
										 <div class="col-lg-6">
											<div class="row mb-1" style="margin-top: 4%;">
											   <div class="col-lg-5 spacing-right">
												  Sales Person  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											   <div class="col-lg-5 spacing-left spacing-right">
												  Operations POC <br>
												  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													 <option value="Operations1">Operations 1</option>
													 <option value="Operations2">Operations 2</option>
												  </select>
											   </div>
											</div>
											<div class="row mb-1" >
											   <div class="col-lg-5 spacing-right">
												  Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											   <div class="col-lg-5 spacing-left spacing-right">
												  Estimated Revenue <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
											<div class="row mb-1" >
											   <div class="col-lg-10 spacing-right">
												  Summary  <br> <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
											   </div>
											</div>
										 </div>
										 <div class="col-lg-6">
											<div class="row" style="margin-top: 4%;">
											   <div class="col-lg-12 spacing-right">
												  <div class="row mb-2">
													 <div class="col-lg-10">
														Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
													 </div>
												  </div>
												  <div class="row mb-2">
													 <div class="col-lg-10">
														Notes <br>
														<textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
													 </div>
												  </div>
											   </div>
											</div>
										 </div>
									  </div>
								   </div>
								   <div class="sales-pipeline" style="display: none;">
									  <div class="row">
										 <div class="col-lg-6 spacing-right">
											<div class="row mb-1">
											   <h6>Client Details</h6>
											   <div class="col-lg-6 spacing-right">
												  Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											   <div class="col-lg-4  spacing-left spacing-right">
												  Contact No  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
											<div class="row mb-1">
											   <div class="col-lg-10  spacing-right">
												  Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
											<div class="row mb-1">
											   <div class="col-lg-5  spacing-right">
												  POC Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											   <div class="col-lg-5  spacing-left spacing-right">
												  City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
											<div class="row mb-3">
											   <div class="col-lg-10 spacing-right">
												  Address  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
										 </div>
										 <div class="col-lg-6 spacing-right">
											<div class="row" style="margin-top: 6%;">
											   <div class="col-lg-5 spacing-right">
												  Type <br>
												  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													 <option value="Public">Public</option>
													 <option value="Private">Private</option>
												  </select>
											   </div>
											   <div class="col-lg-5 spacing-left spacing-right">
												  Initiation Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
											<div class="row mb-1">
											   <div class="col-lg-5 spacing-right">
												  Submission Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											   <div class="col-lg-5 spacing-left spacing-right">
												  Bid Security
												  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													 <option value="No">No</option>
													 <option value="Yes">Yes</option>
												  </select>
											   </div>
											</div>
											<div class="row mb-1">
											   <div class="col-lg-5 spacing-right">
												  Status
												  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													 <option value="Document-Collection">Document Collection</option>
													 <option value="WIP">WIP</option>
													 <option value="Submitted">Submitted</option>
													 <option value="Qualified">Qualified</option>
													 <option value="Disqualified">Disqualified</option>
												  </select>
											   </div>
											   <div class="col-lg-5 spacing-left spacing-right">
												  Region
												  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													 <option value="No">Region 1</option>
													 <option value="Yes">Region 2</option>
												  </select>
											   </div>
											</div>
										 </div>
									  </div>
									  <div class="row">
										 <div class="col-lg-6">
											<div class="row mb-1" style="margin-top: 4%;">
											   <div class="col-lg-5 spacing-right">
												  Sales Person  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											   <div class="col-lg-5 spacing-left spacing-right">
												  Operations POC <br>
												  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													 <option value="Operations1">Operations 1</option>
													 <option value="Operations2">Operations 2</option>
												  </select>
											   </div>
											</div>
											<div class="row mb-1" >
											   <div class="col-lg-5 spacing-right">
												  Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											   <div class="col-lg-5 spacing-left spacing-right">
												  Estimated Revenue <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											   </div>
											</div>
											<div class="row mb-1" >
											   <div class="col-lg-10 spacing-right">
												  Summary  <br> <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
											   </div>
											</div>
										 </div>
										 <div class="col-lg-6">
											<div class="row mb-1" style="margin-top: 4%;">
											   <div class="col-lg-5 spacing-right">
												  Target Month/Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
											   </div>
											   <div class="col-lg-5 spacing-left spacing-right">
												  Status <br>
												  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													 <option value="Operations1">Iniatiation</option>
													 <option value="Operations2">Prospecting</option>
													 <option value="Operations1">Qualifying</option>
													 <option value="Operations2">Proposal Submission</option>
													 <option value="Operations1">Negotiation</option>
													 <option value="Operations2">Successful</option>
													 <option value="Operations1">Opportunity</option>
													 <option value="Operations2">Lead Generation</option>
												  </select>
											   </div>
											</div>
											<div class="row" >
											   <div class="col-lg-12 spacing-right">
												  <div class="row mb-1">
													 <div class="col-lg-5 ">
														Propability  <br>
														<select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														   <option value="low">low</option>
														   <option value="medium">medium</option>
														   <option value="high">high</option>
														</select>
													 </div>
													 <div class="col-lg-5 spacing-left">
														Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
													 </div>
												  </div>
												  <div class="row mb-2">
													 <div class="col-lg-10">
														Notes <br>
														<textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
													 </div>
												  </div>
											   </div>
											</div>
										 </div>
									  </div>
								   </div>
								</div>
								<!--Details of Sales Agent-->
								<div class="tab-pane fade m-3" style="opacity: 90%;" id="details-of-sales-agent1" role="tabpanel" aria-labelledby="nav-contact-tab">
								   <div class="row">
									  <div class="col-lg-6 spacing-right">
										 <div class="row mb-2">
											<div class="col-lg-5 spacing-right">
											   Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-5 spacing-right">
											   Employee Number  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-5  spacing-right">
											   Designation  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-5  spacing-right">
											   Percentage/Figure of Sales  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-10  spacing-right">
											   Attachement of All Correspondance/Recording  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
									  </div>
									  <div class="col-lg-6 spacing-right">
										 <div class="row mb-2">
											<div class="col-lg-10">
											   Notes & Remarks <br>
											   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
											</div>
											<div class="col-lg-10 ">
											   Other Attachement <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
									  </div>
								   </div>
								</div>
								<!--Sales Visit-->
								<div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-visit1" role="tabpanel" aria-labelledby="nav-contact-tab">
								   <div class="row">
									  <div class="col-lg-6 spacing-right">
										 <div class="row mb-2">
											<div class="col-lg-5 spacing-right">
											   Name of Visitor  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-5 spacing-right">
											   Date of Visit   <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-5  spacing-right">
											   To whom He Met  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-5  spacing-right">
											   Minutes of Meeting  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row" style="margin-top: 6%;">
											<div class="col-lg-5 spacing-right">
											   Type <br>
											   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
												  <option value="Public">Public</option>
												  <option value="Private">Private</option>
											   </select>
											</div>
											<div class="col-lg-5 spacing-left spacing-right">
											   Initiation Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-1">
											<div class="col-lg-5 spacing-right">
											   Submission Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-5 spacing-left spacing-right">
											   Bid Security
											   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
												  <option value="No">No</option>
												  <option value="Yes">Yes</option>
											   </select>
											</div>
										 </div>
										 <div class="row mb-1">
											<div class="col-lg-5 spacing-right">
											   Status
											   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
												  <option value="Document-Collection">Document Collection</option>
												  <option value="WIP">WIP</option>
												  <option value="Submitted">Submitted</option>
												  <option value="Qualified">Qualified</option>
												  <option value="Disqualified">Disqualified</option>
											   </select>
											</div>
											<div class="col-lg-5 spacing-left spacing-right">
											   Region
											   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
												  <option value="No">Region 1</option>
												  <option value="Yes">Region 2</option>
											   </select>
											</div>
										 </div>
									  </div>
									  <div class="col-lg-6 spacing-right">
										 <div class="row mb-2">
											<div class="col-lg-10">
											   Notes & Remarks <br>
											   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
											</div>
											<div class="col-lg-10 ">
											   Other Attachement <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-5  spacing-right">
											   Name of Courier Service  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-5 spacing-left">
											   Screen Shots (Delivery Status) <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row">
											<div class="col-lg-10 ">
											   TCS Slip  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
									  </div>
								   </div>
								</div>
								<!--attachements-->
								<div class="tab-pane fade m-3" style="opacity: 90%;" id="attachements1" role="tabpanel" aria-labelledby="nav-contact-tab">
								   <div class="row">
									  <div class="col-lg-6 spacing-right">
										 <div class="row">
											<div class="col-lg-10">
											   Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-10">
											   Notes & Remarks  <br>
											   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
											</div>
										 </div>
									  </div>
								   </div>
								</div>
								<!--Comparative Analysis-->
								<div class="tab-pane fade m-3" style="opacity: 90%;" id="comparative-analysis1" role="tabpanel" aria-labelledby="nav-contact-tab">
								   <div class="row">
									  <div class="col-lg-6 spacing-right">
										 <div class="row mb-2">
											<div class="col-lg-10 spacing-right">
											   Compertitor's Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2">
											<div class="col-lg-5  spacing-right">
											   Competitors's Rate  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
											<div class="col-lg-5  spacing-right">
											   Number of Guards  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
									  </div>
									  <div class="col-lg-6 spacing-right">
										 <div class="row mb-2">
											<div class="col-lg-10">
											   Notes & Remarks <br>
											   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
											</div>
										 </div>
									  </div>
								   </div>
								</div>
								<!--RFQ Documents-->
								<div class="tab-pane fade m-3" style="opacity: 90%;" id="rfq-documents1" role="tabpanel" aria-labelledby="nav-contact-tab">
								   <div class="row">
									  <div class="col-lg-6 spacing-right">
										 <div class="row">
											<div class="col-lg-10">
											   Name of Document <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
											</div>
										 </div>
										 <div class="row mb-2 mt-1">
											<div class="col-lg-10">
											   Worksheet <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
											</div>
										 </div>
									  </div>
									  <div class="col-lg-6 spacing-right">
										 <div class="row mb-2">
											<div class="col-lg-10">
											   Notes & Remarks <br>
											   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
											</div>
										 </div>
									  </div>
								   </div>
								</div>
								<!--basic-info-->
								<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="basic-info" role="tabpanel" aria-labelledby="nav-contact-tab">
								   <div class="row">
									   <div class="col-lg-6 spacing-right">
											   <div class="row mb-2">
												   <div class="col-lg-10 spacing-right">
													  Company  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
											   </div>
											   <div class="row mb-2">
												   <div class="col-lg-6 spacing-right">
													  Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-4 spacing-left spacing-right">
													   Fax  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
													</div>
											   </div>
									   </div>
									   <div class="col-lg-6 spacing-right">
										   <div class="row mb-2">
											   <div class="col-lg-10">
												   Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
											   </div>
										   </div>
										   <div class="row mb-2">
											   <div class="col-lg-10">
												   Notes <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
											   </div>
										   </div>
								   </div>
								   </div>
								   </div> -->
								<!--summary-->
								<!-- <div class="tab-pane fade show m-3" style="opacity: 90%;" id="summary" role="tabpanel" aria-labelledby="nav-home-tab"> -->
								<!-- <div class="row">
								   <div class="col-lg-6 spacing-right">
									   <div class="row mb-2">
										   <div class="col-lg-10">
											   Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
										   </div>
									   </div>
									   <div class="row mb-2">
										   <div class="col-lg-10">
											   Notes <br>
											   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
										   </div>
									   </div>
								   </div>
								   </div> -->
								<!-- </div> -->
								<!--site-id-->
								<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="site-id" role="tabpanel" aria-labelledby="nav-contact-tab">
								   <div class="row mb-1">
									   <div class="col-lg-5 spacing-left">
										   Customer Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
									   </div>
									   <div class="col-lg-5 ">
										   Parent Customer  <br>
										   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
											   <option value="Customer 1">Customer 1</option>
											   <option value="Customer 2">Customer 2</option>
											   <option value="Customer 3">Customer 3</option>
										   </select>
									   </div>
								   </div>
								   </div> -->
								<!--accounts-->
								<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="accounts" role="tabpanel" aria-labelledby="nav-contact-tab">
								   <div class="row">
									   <div class="col-lg-6 spacing-right">

									   </div>
									   <div class="col-lg-6 spacing-right">

									   </div>
								   </div>
								   </div> -->
								<!--rfq-pipelines-->
								<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="rfq-pipelines" role="tabpanel" aria-labelledby="nav-contact-tab">
								   </div>  -->
								<!--sales-pipeline-->
								<div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-pipeline" role="tabpanel" aria-labelledby="nav-contact-tab">
								</div>
							 </div>
							 <!--Tabs end-->
                           </form>
                        </section>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-primary" >Save Changes</button>
                        <button type="button" class="btn btn-secondary" onclick="reset_data()">RESET</button>
                        <button type="button" class="btn btn-primary" >Submit</button>
                     </div>
                  </div>
               </div>
            </div>
            <!--Popup model for RFQ Pipeline-->
            <div class="modal fade" id="add_rfq" >
               <div class="modal-dialog" role="document" style="max-width: 90%;">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> RFQ Pipeline </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <section>
                           <form action="" class="liscence_form m-5" style="width: 90%;">
                              <div class="row">
                                 <h5>RFQ Pipeline Details</h5>
                                 <div class="col-lg-6 spacing-right">
                                    <div class="row mb-2 mt-3">
                                       <div class="col-lg-10 spacing-right">
                                          What We Offer  <br>
                                          <select id="hrm_type" class="input_field mt-1" name="hrmType" style="width: 100%;">
                                             <option value="Service 1">Men Guarding Services</option>
                                             <option value="Service 2">Escort Services</option>
                                             <option value="Service 3">Canine Services</option>
                                             <option value="Service 4">Facilitation Services</option>
                                             <option value="Service 5">Event Security</option>
                                             <option value="Service 6">Security Consultancy</option>
                                             <option value="Service 7">Fire Fighting Equipment</option>
                                             <option value="Service 8">Security Equipment</option>
                                             <option value="Service 9">CCTV</option>
                                             <option value="Service 10">Security Alarm System</option>
                                             <option value="Service 11">Web Surveillance Solutions</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row mb-1">
                                       <h6>Client Details</h6>
                                       <div class="col-lg-3 spacing-right">
                                          Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-3  spacing-left spacing-right">
                                          Contact No  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-4 spacing-left spacing-right">
                                          Visiting Card <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                    <div class="row mb-1">
                                       <div class="col-lg-10  spacing-right">
                                          Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                    <div class="row mb-1">
                                       <div class="col-lg-5  spacing-right">
                                          POC Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-5  spacing-left spacing-right">
                                          City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                    <div class="row mb-3">
                                       <div class="col-lg-10 spacing-right">
                                          Address  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    <div class="row" style="margin-top: 6%;">
                                       <div class="col-lg-5 spacing-right">
                                          Type <br>
                                          <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                             <option value="Public">Public</option>
                                             <option value="Private">Private</option>
                                          </select>
                                       </div>
                                       <div class="col-lg-5 spacing-left spacing-right">
                                          Initiation Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                    <div class="row mb-1">
                                       <div class="col-lg-5 spacing-right">
                                          Submission Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-5 spacing-left spacing-right">
                                          Bid Security
                                          <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                             <option value="No">No</option>
                                             <option value="Yes">Yes</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row mb-1">
                                       <div class="col-lg-5 spacing-right">
                                          Status
                                          <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                             <option value="Document-Collection">Document Collection</option>
                                             <option value="WIP">WIP</option>
                                             <option value="Submitted">Submitted</option>
                                             <option value="Qualified">Qualified</option>
                                             <option value="Disqualified">Disqualified</option>
                                          </select>
                                       </div>
                                       <div class="col-lg-5 spacing-left spacing-right">
                                          Region
                                          <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                             <option value="No">Region 1</option>
                                             <option value="Yes">Region 2</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="row mb-1" style="margin-top: 4%;">
                                       <div class="col-lg-5 spacing-right">
                                          Sales Person  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-5 spacing-left spacing-right">
                                          Operations POC <br>
                                          <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                             <option value="Operations1">Operations 1</option>
                                             <option value="Operations2">Operations 2</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row mb-1" >
                                       <div class="col-lg-5 spacing-right">
                                          Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-5 spacing-left spacing-right">
                                          Estimated Revenue <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                    </div>
                                    <div class="row mb-1" >
                                       <div class="col-lg-10 spacing-right">
                                          Summary  <br> <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="row" style="margin-top: 4%;">
                                       <div class="col-lg-12 spacing-right">
                                          <div class="row mb-2">
                                             <div class="col-lg-10">
                                                Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-lg-10">
                                                Notes & Remarks <br>
                                                <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
							    <!--Tabs forDetails-->
								<nav>
									<div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
									   <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#address-info2" role="tab" aria-controls="nav-home" aria-selected="true">Address Info</a>
									   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#leads-info2" role="tab" aria-controls="nav-profile" aria-selected="false">Leads Info</a>
									   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#details-of-sales-agent2" role="tab" aria-controls="nav-profile" aria-selected="false">Details of Sales Agent</a>
									   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#sales-visit2" role="tab" aria-controls="nav-profile" aria-selected="false">Sales Visit</a>
									   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#comparative-analysis2" role="tab" aria-controls="nav-contact" aria-selected="false">Competitive Analysis</a>
									   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#rfq-documents2" role="tab" aria-controls="nav-contact" aria-selected="false">RFQ Documents</a>
									   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#attachements2" role="tab" aria-controls="nav-contact" aria-selected="false">Attachements</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#submission2" role="tab" aria-controls="nav-contact" aria-selected="false">Submission Details</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#reporting2" role="tab" aria-controls="nav-contact" aria-selected="false">Reporting</a>
									   <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#basic-info" role="tab" aria-controls="nav-contact" aria-selected="false">Basic Info</a> -->
									   <!-- <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#summary" role="tab" aria-controls="nav-home" aria-selected="true">Summary</a> -->
									   <!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#site-id" role="tab" aria-controls="nav-profile" aria-selected="false">Site ID</a> -->
									   <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="nav-contact" aria-selected="false">Accounts</a> -->
									   <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#rfq-pipelines" role="tab" aria-controls="nav-contact" aria-selected="false">RFQ Pipeline</a>
										  <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#sales-pipeline" role="tab" aria-controls="nav-home" aria-selected="true">Sales Pipeline</a> -->
									</div>
								 </nav>
								 <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                                    <!--Submission Details-->
                                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="submission2" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="row">
                                           <div class="col-lg-6 spacing-right">
                                              <div class="row mb-2">
                                                 <div class="col-lg-5 spacing-right">
                                                    RFQ Submitted By  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                                 </div>
                                                 <div class="col-lg-5 spacing-right">
                                                    Submission Date   <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
                                                 </div>
                                              </div>
                                              <div class="row mb-2">
                                                 <div class="col-lg-5  spacing-right">
                                                    Submission Time  <br>  <input class="input_field" type="time" placeholder="..." style="width: 100%;">
                                                 </div>
                                                 <div class="col-lg-5  spacing-right">
                                                    Payment Method  <br>  <select id="" class="input_field" name="" style="width: 100%;">
                                                        <option value="">Pay order</option>
                                                        <option value="">Cheque</option>
                                                     </select>

                                                 </div>
                                              </div>
                                              <div class="row mb-2">
                                                 <div class="col-lg-10  spacing-right">
                                                    Bank Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                                 </div>
                                              </div>
                                              <div class="row mb-2">
                                                <div class="col-lg-10  spacing-right">
                                                    Submitted By  <br>  <select id="" class="input_field" name="" style="width: 100%;">
                                                        <option value="">Courier</option>
                                                        <option value="">Email</option>
                                                        <option value="">By hand</option>
                                                     </select>
                                                </div>
                                             </div>
                                           </div>
                                           <div class="col-lg-6 spacing-right">
                                              <div class="row mb-2">
                                                 <div class="col-lg-10">
                                                    Name of the person Submitted<br>
                                                    <input style="width: 100%;" name="" id="" cols="20" rows="4"/>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                     <!--Reporting-->

									<!--address-info-->
									<div class="tab-pane fade show active m-3" style="opacity: 90%;" id="address-info2" role="tabpanel" aria-labelledby="nav-home-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-2 spacing-right">
												   Street  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-4  spacing-left spacing-right">
												   State  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-4 spacing-left spacing-right">
												   Country  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5 spacing-right">
												   Region  <br>
												   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													  <option value="hrm_guard">region1</option>
													  <option value="hrm_staff">region2</option>
												   </select>
												</div>
												<div class="col-lg-3  spacing-left spacing-right">
												   City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-2 spacing-left spacing-right">
												   Zip Code  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   <input class="input_field" type="text" placeholder="www.facebook.com/" style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   <input class="input_field" type="text" placeholder="www.skype.com/" style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   <input class="input_field" type="text" placeholder="www.twitter.com/" style="width: 100%;">
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-1">
												<div class="col-lg-10 spacing-right">
												   Company  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-1">
												<div class="col-lg-6 spacing-right">
												   Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-4 spacing-left spacing-right">
												   Fax  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-1">
												<div class="col-lg-10 spacing-right">
												   website  <br>  <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-1">
												<div class="col-lg-10 spacing-right">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea>
												</div>
											 </div>
										  </div>
										  <div class="row">
											 <div class="col-lg-3 mt-3" style="margin-left: 35%;">
												<button type="button" class="add-more-btn" style="width: 90%;" onclick="sales_address_add_fields()">Add Addresses</button>
											 </div>
										  </div>
									   </div>
									   <div id="sales_address_add_fields">
									   </div>
									</div>
									<!--leads-info-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="leads-info2" role="tabpanel" aria-labelledby="nav-profile-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   What We Offer  <br>
												   <select id="hrm_type" class="input_field mt-1" name="hrmType" style="width: 100%;">
													  <option value="Service 1">Men Guarding Services</option>
													  <option value="Service 2">Escort Services</option>
													  <option value="Service 3">Canine Services</option>
													  <option value="Service 4">Facilitation Services</option>
													  <option value="Service 5">Event Security</option>
													  <option value="Service 6">Security Consultancy</option>
													  <option value="Service 7">Fire Fighting Equipment</option>
													  <option value="Service 8">Security Equipment</option>
													  <option value="Service 9">CCTV</option>
													  <option value="Service 10">Security Alarm System</option>
													  <option value="Service 11">Web Surveillance Solutions</option>
												   </select>
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5 spacing-right">
												   Lead Generated By  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5  spacing-left spacing-right">
												   Lead Assigned To  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5  spacing-right">
												   Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5 spacing-left spacing-right">
												   Estimated Revenue  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-6 spacing-right">
												   Name  <br>  <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-4 spacing-left spacing-right">
												   Phone  <br>  <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   Date Initiated  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea>
												</div>
											 </div>
										  </div>
									   </div>
									   <div class="rfq-pipeline" style="display: none;">
										  <div class=" row">
											 <div class="col-lg-6 spacing-right">
												<div class="row mb-1">
												   <h6>Client Details</h6>
												   <div class="col-lg-6 spacing-right">
													  Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-4  spacing-left spacing-right">
													  Contact No  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-10  spacing-right">
													  Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5  spacing-right">
													  POC Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5  spacing-left spacing-right">
													  City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-3">
												   <div class="col-lg-10 spacing-right">
													  Address  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
											 </div>
											 <div class="col-lg-6 spacing-right">
												<div class="row" style="margin-top: 6%;">
												   <div class="col-lg-5 spacing-right">
													  Type <br>
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Public">Public</option>
														 <option value="Private">Private</option>
													  </select>
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Initiation Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5 spacing-right">
													  Submission Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Bid Security
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="No">No</option>
														 <option value="Yes">Yes</option>
													  </select>
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5 spacing-right">
													  Status
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Document-Collection">Document Collection</option>
														 <option value="WIP">WIP</option>
														 <option value="Submitted">Submitted</option>
														 <option value="Qualified">Qualified</option>
														 <option value="Disqualified">Disqualified</option>
													  </select>
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Region
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="No">Region 1</option>
														 <option value="Yes">Region 2</option>
													  </select>
												   </div>
												</div>
											 </div>
										  </div>
										  <div class="row">
											 <div class="col-lg-6">
												<div class="row mb-1" style="margin-top: 4%;">
												   <div class="col-lg-5 spacing-right">
													  Sales Person  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Operations POC <br>
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Operations1">Operations 1</option>
														 <option value="Operations2">Operations 2</option>
													  </select>
												   </div>
												</div>
												<div class="row mb-1" >
												   <div class="col-lg-5 spacing-right">
													  Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Estimated Revenue <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1" >
												   <div class="col-lg-10 spacing-right">
													  Summary  <br> <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												   </div>
												</div>
											 </div>
											 <div class="col-lg-6">
												<div class="row" style="margin-top: 4%;">
												   <div class="col-lg-12 spacing-right">
													  <div class="row mb-2">
														 <div class="col-lg-10">
															Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
														 </div>
													  </div>
													  <div class="row mb-2">
														 <div class="col-lg-10">
															Notes <br>
															<textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
														 </div>
													  </div>
												   </div>
												</div>
											 </div>
										  </div>
									   </div>
									   <div class="sales-pipeline" style="display: none;">
										  <div class="row">
											 <div class="col-lg-6 spacing-right">
												<div class="row mb-1">
												   <h6>Client Details</h6>
												   <div class="col-lg-6 spacing-right">
													  Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-4  spacing-left spacing-right">
													  Contact No  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-10  spacing-right">
													  Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5  spacing-right">
													  POC Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5  spacing-left spacing-right">
													  City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-3">
												   <div class="col-lg-10 spacing-right">
													  Address  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
											 </div>
											 <div class="col-lg-6 spacing-right">
												<div class="row" style="margin-top: 6%;">
												   <div class="col-lg-5 spacing-right">
													  Type <br>
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Public">Public</option>
														 <option value="Private">Private</option>
													  </select>
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Initiation Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5 spacing-right">
													  Submission Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Bid Security
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="No">No</option>
														 <option value="Yes">Yes</option>
													  </select>
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5 spacing-right">
													  Status
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Document-Collection">Document Collection</option>
														 <option value="WIP">WIP</option>
														 <option value="Submitted">Submitted</option>
														 <option value="Qualified">Qualified</option>
														 <option value="Disqualified">Disqualified</option>
													  </select>
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Region
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="No">Region 1</option>
														 <option value="Yes">Region 2</option>
													  </select>
												   </div>
												</div>
											 </div>
										  </div>
										  <div class="row">
											 <div class="col-lg-6">
												<div class="row mb-1" style="margin-top: 4%;">
												   <div class="col-lg-5 spacing-right">
													  Sales Person  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Operations POC <br>
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Operations1">Operations 1</option>
														 <option value="Operations2">Operations 2</option>
													  </select>
												   </div>
												</div>
												<div class="row mb-1" >
												   <div class="col-lg-5 spacing-right">
													  Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Estimated Revenue <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1" >
												   <div class="col-lg-10 spacing-right">
													  Summary  <br> <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												   </div>
												</div>
											 </div>
											 <div class="col-lg-6">
												<div class="row mb-1" style="margin-top: 4%;">
												   <div class="col-lg-5 spacing-right">
													  Target Month/Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Status <br>
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Operations1">Iniatiation</option>
														 <option value="Operations2">Prospecting</option>
														 <option value="Operations1">Qualifying</option>
														 <option value="Operations2">Proposal Submission</option>
														 <option value="Operations1">Negotiation</option>
														 <option value="Operations2">Successful</option>
														 <option value="Operations1">Opportunity</option>
														 <option value="Operations2">Lead Generation</option>
													  </select>
												   </div>
												</div>
												<div class="row" >
												   <div class="col-lg-12 spacing-right">
													  <div class="row mb-1">
														 <div class="col-lg-5 ">
															Propability  <br>
															<select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
															   <option value="low">low</option>
															   <option value="medium">medium</option>
															   <option value="high">high</option>
															</select>
														 </div>
														 <div class="col-lg-5 spacing-left">
															Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
														 </div>
													  </div>
													  <div class="row mb-2">
														 <div class="col-lg-10">
															Notes <br>
															<textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
														 </div>
													  </div>
												   </div>
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									<!--Details of Sales Agent-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="details-of-sales-agent2" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-5 spacing-right">
												   Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5 spacing-right">
												   Employee Number  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5  spacing-right">
												   Designation  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5  spacing-right">
												   Percentage/Figure of Sales  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10  spacing-right">
												   Attachement of All Correspondance/Recording  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												</div>
												<div class="col-lg-10 ">
												   Other Attachement <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									<!--Sales Visit-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-visit2" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-5 spacing-right">
												   Name of Visitor  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5 spacing-right">
												   Date of Visit   <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5  spacing-right">
												   To whom He Met  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5  spacing-right">
												   Minutes of Meeting  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row" style="margin-top: 6%;">
												<div class="col-lg-5 spacing-right">
												   Type <br>
												   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													  <option value="Public">Public</option>
													  <option value="Private">Private</option>
												   </select>
												</div>
												<div class="col-lg-5 spacing-left spacing-right">
												   Initiation Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-1">
												<div class="col-lg-5 spacing-right">
												   Submission Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5 spacing-left spacing-right">
												   Bid Security
												   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													  <option value="No">No</option>
													  <option value="Yes">Yes</option>
												   </select>
												</div>
											 </div>
											 <div class="row mb-1">
												<div class="col-lg-5 spacing-right">
												   Status
												   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													  <option value="Document-Collection">Document Collection</option>
													  <option value="WIP">WIP</option>
													  <option value="Submitted">Submitted</option>
													  <option value="Qualified">Qualified</option>
													  <option value="Disqualified">Disqualified</option>
												   </select>
												</div>
												<div class="col-lg-5 spacing-left spacing-right">
												   Region
												   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													  <option value="No">Region 1</option>
													  <option value="Yes">Region 2</option>
												   </select>
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												</div>
												<div class="col-lg-10 ">
												   Other Attachement <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5  spacing-right">
												   Name of Courier Service  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5 spacing-left">
												   Screen Shots (Delivery Status) <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row">
												<div class="col-lg-10 ">
												   TCS Slip  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									<!--attachements-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="attachements2" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row">
												<div class="col-lg-10">
												   Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10">
												   Notes & Remarks  <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									<!--Comparative Analysis-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="comparative-analysis2" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   Compertitor's Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5  spacing-right">
												   Competitors's Rate  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5  spacing-right">
												   Number of Guards  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									<!--RFQ Documents-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="rfq-documents1" role="tabpane2" aria-labelledby="nav-contact-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row">
												<div class="col-lg-10">
												   Name of Document <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2 mt-1">
												<div class="col-lg-10">
												   Worksheet <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									<!--basic-info-->
									<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="basic-info" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										   <div class="col-lg-6 spacing-right">
												   <div class="row mb-2">
													   <div class="col-lg-10 spacing-right">
														  Company  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
													   </div>
												   </div>
												   <div class="row mb-2">
													   <div class="col-lg-6 spacing-right">
														  Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
													   </div>
													   <div class="col-lg-4 spacing-left spacing-right">
														   Fax  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
														</div>
												   </div>
										   </div>
										   <div class="col-lg-6 spacing-right">
											   <div class="row mb-2">
												   <div class="col-lg-10">
													   Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
												   </div>
											   </div>
											   <div class="row mb-2">
												   <div class="col-lg-10">
													   Notes <br>
													   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												   </div>
											   </div>
									   </div>
									   </div>
									   </div> -->
									<!--summary-->
									<!-- <div class="tab-pane fade show m-3" style="opacity: 90%;" id="summary" role="tabpanel" aria-labelledby="nav-home-tab"> -->
									<!-- <div class="row">
									   <div class="col-lg-6 spacing-right">
										   <div class="row mb-2">
											   <div class="col-lg-10">
												   Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
											   </div>
										   </div>
										   <div class="row mb-2">
											   <div class="col-lg-10">
												   Notes <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
											   </div>
										   </div>
									   </div>
									   </div> -->
									<!-- </div> -->
									<!--site-id-->
									<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="site-id" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row mb-1">
										   <div class="col-lg-5 spacing-left">
											   Customer Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
										   </div>
										   <div class="col-lg-5 ">
											   Parent Customer  <br>
											   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
												   <option value="Customer 1">Customer 1</option>
												   <option value="Customer 2">Customer 2</option>
												   <option value="Customer 3">Customer 3</option>
											   </select>
										   </div>
									   </div>
									   </div> -->
									<!--accounts-->
									<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="accounts" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										   <div class="col-lg-6 spacing-right">

										   </div>
										   <div class="col-lg-6 spacing-right">

										   </div>
									   </div>
									   </div> -->
									<!--rfq-pipelines-->
									<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="rfq-pipelines" role="tabpanel" aria-labelledby="nav-contact-tab">
									   </div>  -->
									<!--sales-pipeline-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-pipeline" role="tabpanel" aria-labelledby="nav-contact-tab">
									</div>
								 </div>
								 <!--Tabs end-->
                           </form>
                        </section>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-primary" >Save Changes</button>
                        <button type="button" class="btn btn-secondary" onclick="reset_data()">RESET</button>
                        <button type="button" class="btn btn-primary" >Submit</button>
                     </div>
                  </div>
               </div>
            </div>
            <!--Popup model for Daily Sales Visit-->
            <div class="modal fade" id="add_daily" >
               <div class="modal-dialog" role="document" style="max-width: 90%;">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> Daily Sales Visit </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <section>
                           <form action="" class="liscence_form m-5" style="width: 90%;">
                              <center>
                                 <h5>Employee Details</h5>
                              </center>
                              <div class="row mb-2">
                                 <div class="col-lg-4 mb-2 spacing-right">
                                    Name <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-4 mb-2 spacing-right spacing-left">
                                    Designation <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-2 mb-2 spacing-left ">
                                    Emp Number <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                 </div>
                              </div>
                              <!--Daily Sales Visit / Main Form-->
                              <div class="row" style="font-weight:600;">
                                 <div class="col-lg-12 spacing-right">
                                    <div class="row mb-2">
                                       <div class="col-lg-4">
                                          What We Offer  <br>
                                          <select id="hrm_type" class="input_field mt-1" name="hrmType" style="width: 100%;">
                                             <option value="Service 1">Men Guarding Services</option>
                                             <option value="Service 2">Escort Services</option>
                                             <option value="Service 3">Canine Services</option>
                                             <option value="Service 4">Facilitation Services</option>
                                             <option value="Service 5">Event Security</option>
                                             <option value="Service 6">Security Consultancy</option>
                                             <option value="Service 7">Fire Fighting Equipment</option>
                                             <option value="Service 8">Security Equipment</option>
                                             <option value="Service 9">CCTV</option>
                                             <option value="Service 10">Security Alarm System</option>
                                             <option value="Service 11">Web Surveillance Solutions</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row mb-2">
                                       <div class="col-lg-4 mt-1">
                                          Customer Name <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-4 ">
                                          Segment <br>
                                          <select id="hrm_type" class="input_field mt-1" name="hrmType" style="width: 100%;">
                                             <option value="segment 1">segment 1</option>
                                             <option value="segment 2">segment 2</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row mb-2">
                                       <div class="col-lg-3 mt-1 spacing-right">
                                          POC Name <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-3 mt-1 spacing-left spacing-right">
                                          POC Contact Number <br>  <input class="input_field " type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-3 mt-1 spacing-left spacing-right">
                                          Visiting Card <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-2 spacing-left mt-4">
                                          <button type="button" class="add-more-btn" onclick="poc_dailysales_add_fields()">Add More</button>
                                       </div>
                                       <div id="poc_dailysales_add_fields">
                                       </div>
                                    </div>
                                 </div>
                              </div>



							     <!--Tabs forDetails-->
								<nav>
									<div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
									   <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#address-info3" role="tab" aria-controls="nav-home" aria-selected="true">Address Info</a>
									   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#leads-info3" role="tab" aria-controls="nav-profile" aria-selected="false">Leads Info</a>
									   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#details-of-sales-agent3" role="tab" aria-controls="nav-profile" aria-selected="false">Details of Sales Agent</a>
									   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#sales-visit3" role="tab" aria-controls="nav-profile" aria-selected="false">Sales Visit</a>
									   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#comparative-analysis3" role="tab" aria-controls="nav-contact" aria-selected="false">Competitive Analysis</a>
									   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#rfq-documents3" role="tab" aria-controls="nav-contact" aria-selected="false">RFQ Documents</a>
									   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#attachements3" role="tab" aria-controls="nav-contact" aria-selected="false">Attachements</a>
									   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#revenue" role="tab" aria-controls="nav-profile" aria-selected="false">Revenue</a>
									   <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#basic-info" role="tab" aria-controls="nav-contact" aria-selected="false">Basic Info</a> -->
									   <!-- <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#summary" role="tab" aria-controls="nav-home" aria-selected="true">Summary</a> -->
									   <!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#site-id" role="tab" aria-controls="nav-profile" aria-selected="false">Site ID</a> -->
									   <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="nav-contact" aria-selected="false">Accounts</a> -->
									   <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#rfq-pipelines" role="tab" aria-controls="nav-contact" aria-selected="false">RFQ Pipeline</a>
										  <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#sales-pipeline" role="tab" aria-controls="nav-home" aria-selected="true">Sales Pipeline</a> -->
									</div>
								 </nav>
								 <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
									<!--address-info-->
									<div class="tab-pane fade show active m-3" style="opacity: 90%;" id="address-info3" role="tabpanel" aria-labelledby="nav-home-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-2 spacing-right">
												   Street  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-4  spacing-left spacing-right">
												   State  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-4 spacing-left spacing-right">
												   Country  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5 spacing-right">
												   Region  <br>
												   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													  <option value="hrm_guard">region1</option>
													  <option value="hrm_staff">region2</option>
												   </select>
												</div>
												<div class="col-lg-3  spacing-left spacing-right">
												   City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-2 spacing-left spacing-right">
												   Zip Code  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   <input class="input_field" type="text" placeholder="www.facebook.com/" style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   <input class="input_field" type="text" placeholder="www.skype.com/" style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   <input class="input_field" type="text" placeholder="www.twitter.com/" style="width: 100%;">
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-1">
												<div class="col-lg-10 spacing-right">
												   Company  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-1">
												<div class="col-lg-6 spacing-right">
												   Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-4 spacing-left spacing-right">
												   Fax  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-1">
												<div class="col-lg-10 spacing-right">
												   website  <br>  <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-1">
												<div class="col-lg-10 spacing-right">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea>
												</div>
											 </div>
										  </div>
										  <div class="row">
											 <div class="col-lg-3 mt-3" style="margin-left: 35%;">
												<button type="button" class="add-more-btn" style="width: 90%;" onclick="sales_address_add_fields()">Add Addresses</button>
											 </div>
										  </div>
									   </div>
									   <div id="sales_address_add_fields">
									   </div>
									</div>
									<!--leads-info-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="leads-info3" role="tabpanel" aria-labelledby="nav-profile-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   What We Offer  <br>
												   <select id="hrm_type" class="input_field mt-1" name="hrmType" style="width: 100%;">
													  <option value="Service 1">Men Guarding Services</option>
													  <option value="Service 2">Escort Services</option>
													  <option value="Service 3">Canine Services</option>
													  <option value="Service 4">Facilitation Services</option>
													  <option value="Service 5">Event Security</option>
													  <option value="Service 6">Security Consultancy</option>
													  <option value="Service 7">Fire Fighting Equipment</option>
													  <option value="Service 8">Security Equipment</option>
													  <option value="Service 9">CCTV</option>
													  <option value="Service 10">Security Alarm System</option>
													  <option value="Service 11">Web Surveillance Solutions</option>
												   </select>
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5 spacing-right">
												   Lead Generated By  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5  spacing-left spacing-right">
												   Lead Assigned To  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5  spacing-right">
												   Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5 spacing-left spacing-right">
												   Estimated Revenue  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-6 spacing-right">
												   Name  <br>  <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-4 spacing-left spacing-right">
												   Phone  <br>  <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   Date Initiated  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea>
												</div>
											 </div>
										  </div>
									   </div>
									   <div class="rfq-pipeline" style="display: none;">
										  <div class=" row">
											 <div class="col-lg-6 spacing-right">
												<div class="row mb-1">
												   <h6>Client Details</h6>
												   <div class="col-lg-6 spacing-right">
													  Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-4  spacing-left spacing-right">
													  Contact No  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-10  spacing-right">
													  Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5  spacing-right">
													  POC Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5  spacing-left spacing-right">
													  City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-3">
												   <div class="col-lg-10 spacing-right">
													  Address  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
											 </div>
											 <div class="col-lg-6 spacing-right">
												<div class="row" style="margin-top: 6%;">
												   <div class="col-lg-5 spacing-right">
													  Type <br>
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Public">Public</option>
														 <option value="Private">Private</option>
													  </select>
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Initiation Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5 spacing-right">
													  Submission Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Bid Security
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="No">No</option>
														 <option value="Yes">Yes</option>
													  </select>
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5 spacing-right">
													  Status
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Document-Collection">Document Collection</option>
														 <option value="WIP">WIP</option>
														 <option value="Submitted">Submitted</option>
														 <option value="Qualified">Qualified</option>
														 <option value="Disqualified">Disqualified</option>
													  </select>
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Region
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="No">Region 1</option>
														 <option value="Yes">Region 2</option>
													  </select>
												   </div>
												</div>
											 </div>
										  </div>
										  <div class="row">
											 <div class="col-lg-6">
												<div class="row mb-1" style="margin-top: 4%;">
												   <div class="col-lg-5 spacing-right">
													  Sales Person  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Operations POC <br>
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Operations1">Operations 1</option>
														 <option value="Operations2">Operations 2</option>
													  </select>
												   </div>
												</div>
												<div class="row mb-1" >
												   <div class="col-lg-5 spacing-right">
													  Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Estimated Revenue <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1" >
												   <div class="col-lg-10 spacing-right">
													  Summary  <br> <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												   </div>
												</div>
											 </div>
											 <div class="col-lg-6">
												<div class="row" style="margin-top: 4%;">
												   <div class="col-lg-12 spacing-right">
													  <div class="row mb-2">
														 <div class="col-lg-10">
															Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
														 </div>
													  </div>
													  <div class="row mb-2">
														 <div class="col-lg-10">
															Notes <br>
															<textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
														 </div>
													  </div>
												   </div>
												</div>
											 </div>
										  </div>
									   </div>
									   <div class="sales-pipeline" style="display: none;">
										  <div class="row">
											 <div class="col-lg-6 spacing-right">
												<div class="row mb-1">
												   <h6>Client Details</h6>
												   <div class="col-lg-6 spacing-right">
													  Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-4  spacing-left spacing-right">
													  Contact No  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-10  spacing-right">
													  Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5  spacing-right">
													  POC Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5  spacing-left spacing-right">
													  City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-3">
												   <div class="col-lg-10 spacing-right">
													  Address  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
											 </div>
											 <div class="col-lg-6 spacing-right">
												<div class="row" style="margin-top: 6%;">
												   <div class="col-lg-5 spacing-right">
													  Type <br>
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Public">Public</option>
														 <option value="Private">Private</option>
													  </select>
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Initiation Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5 spacing-right">
													  Submission Date  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Bid Security
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="No">No</option>
														 <option value="Yes">Yes</option>
													  </select>
												   </div>
												</div>
												<div class="row mb-1">
												   <div class="col-lg-5 spacing-right">
													  Status
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Document-Collection">Document Collection</option>
														 <option value="WIP">WIP</option>
														 <option value="Submitted">Submitted</option>
														 <option value="Qualified">Qualified</option>
														 <option value="Disqualified">Disqualified</option>
													  </select>
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Region
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="No">Region 1</option>
														 <option value="Yes">Region 2</option>
													  </select>
												   </div>
												</div>
											 </div>
										  </div>
										  <div class="row">
											 <div class="col-lg-6">
												<div class="row mb-1" style="margin-top: 4%;">
												   <div class="col-lg-5 spacing-right">
													  Sales Person  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Operations POC <br>
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Operations1">Operations 1</option>
														 <option value="Operations2">Operations 2</option>
													  </select>
												   </div>
												</div>
												<div class="row mb-1" >
												   <div class="col-lg-5 spacing-right">
													  Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Estimated Revenue <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												   </div>
												</div>
												<div class="row mb-1" >
												   <div class="col-lg-10 spacing-right">
													  Summary  <br> <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												   </div>
												</div>
											 </div>
											 <div class="col-lg-6">
												<div class="row mb-1" style="margin-top: 4%;">
												   <div class="col-lg-5 spacing-right">
													  Target Month/Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
												   </div>
												   <div class="col-lg-5 spacing-left spacing-right">
													  Status <br>
													  <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
														 <option value="Operations1">Iniatiation</option>
														 <option value="Operations2">Prospecting</option>
														 <option value="Operations1">Qualifying</option>
														 <option value="Operations2">Proposal Submission</option>
														 <option value="Operations1">Negotiation</option>
														 <option value="Operations2">Successful</option>
														 <option value="Operations1">Opportunity</option>
														 <option value="Operations2">Lead Generation</option>
													  </select>
												   </div>
												</div>
												<div class="row" >
												   <div class="col-lg-12 spacing-right">
													  <div class="row mb-1">
														 <div class="col-lg-5 ">
															Propability  <br>
															<select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
															   <option value="low">low</option>
															   <option value="medium">medium</option>
															   <option value="high">high</option>
															</select>
														 </div>
														 <div class="col-lg-5 spacing-left">
															Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
														 </div>
													  </div>
													  <div class="row mb-2">
														 <div class="col-lg-10">
															Notes <br>
															<textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
														 </div>
													  </div>
												   </div>
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									<!--Details of Sales Agent-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="details-of-sales-agent3" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-5 spacing-right">
												   Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5 spacing-right">
												   Employee Number  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5  spacing-right">
												   Designation  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5  spacing-right">
												   Percentage/Figure of Sales  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10  spacing-right">
												   Attachement of All Correspondance/Recording  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												</div>
												<div class="col-lg-10 ">
												   Other Attachement <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									<!--Sales Visit-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-visit3" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-5 spacing-right">
												   Name of Visitor  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5 spacing-right">
												   Date of Visit   <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5  spacing-right">
												   To whom He Met  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5  spacing-right">
												   Minutes of Meeting  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row" style="margin-top: 6%;">
												<div class="col-lg-5 spacing-right">
												   Type <br>
												   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													  <option value="Public">Public</option>
													  <option value="Private">Private</option>
												   </select>
												</div>
												<div class="col-lg-5 spacing-left spacing-right">
												   Initiation Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-1">
												<div class="col-lg-5 spacing-right">
												   Submission Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5 spacing-left spacing-right">
												   Bid Security
												   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													  <option value="No">No</option>
													  <option value="Yes">Yes</option>
												   </select>
												</div>
											 </div>
											 <div class="row mb-1">
												<div class="col-lg-5 spacing-right">
												   Status
												   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													  <option value="Document-Collection">Document Collection</option>
													  <option value="WIP">WIP</option>
													  <option value="Submitted">Submitted</option>
													  <option value="Qualified">Qualified</option>
													  <option value="Disqualified">Disqualified</option>
												   </select>
												</div>
												<div class="col-lg-5 spacing-left spacing-right">
												   Region
												   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
													  <option value="No">Region 1</option>
													  <option value="Yes">Region 2</option>
												   </select>
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												</div>
												<div class="col-lg-10 ">
												   Other Attachement <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5  spacing-right">
												   Name of Courier Service  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5 spacing-left">
												   Screen Shots (Delivery Status) <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row">
												<div class="col-lg-10 ">
												   TCS Slip  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									<!--attachements-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="attachements3" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row">
												<div class="col-lg-10">
												   Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-10">
												   Notes & Remarks  <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									<!--Comparative Analysis-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="comparative-analysis3" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10 spacing-right">
												   Compertitor's Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2">
												<div class="col-lg-5  spacing-right">
												   Competitors's Rate  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
												<div class="col-lg-5  spacing-right">
												   Number of Guards  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									<!--RFQ Documents-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="rfq-documents3" role="tabpane2" aria-labelledby="nav-contact-tab">
									   <div class="row">
										  <div class="col-lg-6 spacing-right">
											 <div class="row">
												<div class="col-lg-10">
												   Name of Document <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												</div>
											 </div>
											 <div class="row mb-2 mt-1">
												<div class="col-lg-10">
												   Worksheet <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
												</div>
											 </div>
										  </div>
										  <div class="col-lg-6 spacing-right">
											 <div class="row mb-2">
												<div class="col-lg-10">
												   Notes & Remarks <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												</div>
											 </div>
										  </div>
									   </div>
									</div>
									 <!--Revenue-->
									 <div class="tab-pane fade m-3" style="opacity: 90%;" id="revenue" role="tabpanel" aria-labelledby="nav-profile-tab">
										<div class="row">
										   <div class="col-lg-6 spacing-right">
											  <div class="row mb-2">
												 <div class="col-lg-5  spacing-right">
													Estimated Quantity  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												 </div>
												 <div class="col-lg-5 spacing-left spacing-right">
													Estimated Revenue  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
												 </div>
											  </div>
											  <div class="row mb-2">
												 <div class="col-lg-10 spacing-right">
													Next Meeting Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
												 </div>
											  </div>
										   </div>
										   <div class="col-lg-6 spacing-right">
											  <div class="row mb-2">
												 <div class="col-lg-10 spacing-right">
													Notes & Remarks <br>
													<textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea>
												 </div>
											  </div>
										   </div>
										</div>
									 </div>
									<!--basic-info-->
									<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="basic-info" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										   <div class="col-lg-6 spacing-right">
												   <div class="row mb-2">
													   <div class="col-lg-10 spacing-right">
														  Company  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
													   </div>
												   </div>
												   <div class="row mb-2">
													   <div class="col-lg-6 spacing-right">
														  Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
													   </div>
													   <div class="col-lg-4 spacing-left spacing-right">
														   Fax  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
														</div>
												   </div>
										   </div>
										   <div class="col-lg-6 spacing-right">
											   <div class="row mb-2">
												   <div class="col-lg-10">
													   Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
												   </div>
											   </div>
											   <div class="row mb-2">
												   <div class="col-lg-10">
													   Notes <br>
													   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
												   </div>
											   </div>
									   </div>
									   </div>
									   </div> -->
									<!--summary-->
									<!-- <div class="tab-pane fade show m-3" style="opacity: 90%;" id="summary" role="tabpanel" aria-labelledby="nav-home-tab"> -->
									<!-- <div class="row">
									   <div class="col-lg-6 spacing-right">
										   <div class="row mb-2">
											   <div class="col-lg-10">
												   Attachements  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
											   </div>
										   </div>
										   <div class="row mb-2">
											   <div class="col-lg-10">
												   Notes <br>
												   <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
											   </div>
										   </div>
									   </div>
									   </div> -->
									<!-- </div> -->
									<!--site-id-->
									<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="site-id" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row mb-1">
										   <div class="col-lg-5 spacing-left">
											   Customer Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
										   </div>
										   <div class="col-lg-5 ">
											   Parent Customer  <br>
											   <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
												   <option value="Customer 1">Customer 1</option>
												   <option value="Customer 2">Customer 2</option>
												   <option value="Customer 3">Customer 3</option>
											   </select>
										   </div>
									   </div>
									   </div> -->
									<!--accounts-->
									<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="accounts" role="tabpanel" aria-labelledby="nav-contact-tab">
									   <div class="row">
										   <div class="col-lg-6 spacing-right">

										   </div>
										   <div class="col-lg-6 spacing-right">

										   </div>
									   </div>
									   </div> -->
									<!--rfq-pipelines-->
									<!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="rfq-pipelines" role="tabpanel" aria-labelledby="nav-contact-tab">
									   </div>  -->
									<!--sales-pipeline-->
									<div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-pipeline" role="tabpanel" aria-labelledby="nav-contact-tab">
									</div>
								 </div>
								 <!--Tabs end-->
                           </form>
                        </section>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-primary" >Save Changes</button>
                        <button type="button" class="btn btn-secondary" onclick="reset_data()">RESET</button>
                        <button type="button" class="btn btn-primary" >Submit</button>
                     </div>
                  </div>
               </div>
            </div>
            <!--Popup model for Portfolio/Tagging-->
            <div class="modal fade" id="add_portfolio" >
               <div class="modal-dialog" role="document" style="max-width: 90%;">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> Portfolio/Tagging </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-primary" >Save Changes</button>
                        <button type="button" class="btn btn-secondary" onclick="reset_data()">RESET</button>
                        <button type="button" class="btn btn-primary" >Submit</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--Customer form ends here-->
      </div>
      </div>




      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
          $(document).ready(function() {
              $('#securityboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#securitybox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#securityboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#securityboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#riskboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#riskbox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#riskboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#riskboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#surveyboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#surveybox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#surveyboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#surveyboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#trainingboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#trainingbox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#trainingboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#trainingboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#metooboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#metoobox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#metooboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#metooboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#fireboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#firebox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#fireboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#fireboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#manageboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#managebox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#manageboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#manageboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#protectboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#protectbox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#protectboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#protectboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#standardboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#standardbox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#standardboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#standardboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#proofboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#proofbox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#proofboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#proofboxview').hide();
                  }
              });
          });
         </script>

        <script>
            $(document).ready(function() {
                $('#followboxview').hide();

                // Add an event listener to the Bid Money checkbox
                $('#followbox').change(function() {
                    if ($(this).is(':checked')) {
                        // If the Bid Money checkbox is checked, display the other checkboxes
                        $('#followboxview').show();
                    } else {
                        // If the Bid Money checkbox is unchecked, hide the other checkboxes
                        $('#followboxview').hide();
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#cameraboxview').hide();

                // Add an event listener to the Bid Money checkbox
                $('#cameras').change(function() {
                    if ($(this).is(':checked')) {
                        // If the Bid Money checkbox is checked, display the other checkboxes
                        $('#cameraboxview').show();
                    } else {
                        // If the Bid Money checkbox is unchecked, hide the other checkboxes
                        $('#cameraboxview').hide();
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#supportingboxview').hide();

                // Add an event listener to the Bid Money checkbox
                $('#supporting').change(function() {
                    if ($(this).is(':checked')) {
                        // If the Bid Money checkbox is checked, display the other checkboxes
                        $('#supportingboxview').show();
                    } else {
                        // If the Bid Money checkbox is unchecked, hide the other checkboxes
                        $('#supportingboxview').hide();
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#attendanceboxview').hide();

                // Add an event listener to the Bid Money checkbox
                $('#attendance').change(function() {
                    if ($(this).is(':checked')) {
                        // If the Bid Money checkbox is checked, display the other checkboxes
                        $('#attendanceboxview').show();
                    } else {
                        // If the Bid Money checkbox is unchecked, hide the other checkboxes
                        $('#attendanceboxview').hide();
                    }
                });
            });
        </script>

         <script>
          $(document).ready(function() {
              $('#airportboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#airportbox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#airportboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#airportboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#sojboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#sojbox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#sojboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#sojboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#sequipboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#sequipbox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#sequipboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#sequipboxview').hide();
                  }
              });
          });
         </script>

         <script>
          $(document).ready(function() {
              $('#sbarboxview').hide();

              // Add an event listener to the Bid Money checkbox
              $('#sbarbox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#sbarboxview').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#sbarboxview').hide();
                  }
              });
          });
         </script>
      
      <script>
        document.getElementById("submit-category1").addEventListener("click", function() {
        var customCategory = document.getElementById("custom-dropdown-category").value;
        var select = document.getElementById("staff_category");
        var option = document.createElement("option");
        option.text = customCategory;
        option.value = customCategory;
        select.add(option);
        });
    </script>

      <script>
        document.getElementById("submit-category2").addEventListener("click", function() {
        var customCategory = document.getElementById("custom-dropdown-category1").value;
        var select = document.getElementById("staff_category1");
        var option = document.createElement("option");
        option.text = customCategory;
        option.value = customCategory;
        select.add(option);
        });
      </script>

      <script>
        document.getElementById("submit-category3").addEventListener("click", function() {
        var customCategory = document.getElementById("custom-dropdown-category2").value;
        var select = document.getElementById("staff_category2");
        var option = document.createElement("option");
        option.text = customCategory;
        option.value = customCategory;
        select.add(option);
        });
      </script>

      <script>
        document.getElementById("submit-category5").addEventListener("click", function() {
        var customCategory = document.getElementById("custom-dropdown-category5").value;
        var select = document.getElementById("staff_category5");
        var option = document.createElement("option");
        option.text = customCategory;
        option.value = customCategory;
        select.add(option);
        });
      </script>

      <script>
        document.getElementById("submit-category6").addEventListener("click", function() {
        var customCategory = document.getElementById("custom-dropdown-category6").value;
        var select = document.getElementById("staff_category6");
        var option = document.createElement("option");
        option.text = customCategory;
        option.value = customCategory;
        select.add(option);
        });
      </script>

      <script>
        document.getElementById("submit-category7").addEventListener("click", function() {
        var customCategory = document.getElementById("custom-dropdown-category7").value;
        var select = document.getElementById("staff_category7");
        var option = document.createElement("option");
        option.text = customCategory;
        option.value = customCategory;
        select.add(option);
        });
      </script>

      <script>
        document.getElementById("submit-category8").addEventListener("click", function() {
        var customCategory = document.getElementById("custom-dropdown-category8").value;
        var select = document.getElementById("staff_category8");
        var option = document.createElement("option");
        option.text = customCategory;
        option.value = customCategory;
        select.add(option);
        });
      </script>

      <script>
        document.getElementById("submit-category9").addEventListener("click", function() {
        var customCategory = document.getElementById("custom-dropdown-category9").value;
        var select = document.getElementById("staff_category9");
        var option = document.createElement("option");
        option.text = customCategory;
        option.value = customCategory;
        select.add(option);
        });
      </script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var index = 0;

            $('#addMoreCheckbox').on('click', function() {
                index++;
                var inputHtml = '<input type="text" class="form-control currencyName" placeholder="New Activity ' + index + '">';
                var checkboxHtml = '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' + (index+5) + '">' + inputHtml + '</div>';
                $('#new-check').append(checkboxHtml);

                // Update the newly added input field to create a corresponding label for the checkbox
                $('.currencyName').last().on('blur', function() {
                var checkboxId = $(this).siblings('input[type="checkbox"]').attr('id');
                var labelHtml = '<label class="form-check-label" for="' + checkboxId + '">' + $(this).val() + '</label>';
                $(this).siblings('input[type="checkbox"]').after(labelHtml);
                $(this).hide(); // Hide the input field after the label is created
                });
            });
        });
    </script>

      <script>
        document.getElementById("men-guard").addEventListener("click", function(event) {
          event.preventDefault(); // prevent the default behavior of the link
          var div = document.getElementById("men");
          if (div.style.display === "none") {
            div.style.display = "block"; // show the div
          } else {
            div.style.display = "none"; // hide the div
          }
        });
       </script>

         <script>
            document.getElementById("escort1").addEventListener("click", function(event) {
               event.preventDefault(); // prevent the default behavior of the link
               var div = document.getElementById("escort");
               if (div.style.display === "none") {
                  div.style.display = "block"; // show the div
               } else {
                  div.style.display = "none"; // hide the div
               }
            });
        </script>

         <script>
            document.getElementById("canine1").addEventListener("click", function(event) {
               event.preventDefault(); // prevent the default behavior of the link
               var div = document.getElementById("canine");
               if (div.style.display === "none") {
                  div.style.display = "block"; // show the div
               } else {
                  div.style.display = "none"; // hide the div
               }
            });
         </script>

         <script>
            document.getElementById("facility1").addEventListener("click", function(event) {
               event.preventDefault(); // prevent the default behavior of the link
               var div = document.getElementById("facility");
               if (div.style.display === "none") {
                  div.style.display = "block"; // show the div
               } else {
                  div.style.display = "none"; // hide the div
               }
            });
         </script>

         <script>
            document.getElementById("event1").addEventListener("click", function(event) {
               event.preventDefault(); // prevent the default behavior of the link
               var div = document.getElementById("event");
               if (div.style.display === "none") {
                  div.style.display = "block"; // show the div
               } else {
                  div.style.display = "none"; // hide the div
               }
            });
         </script>

         <script>
            document.getElementById("consultancy1").addEventListener("click", function(event) {
               event.preventDefault(); // prevent the default behavior of the link
               var div = document.getElementById("consultancy");
               if (div.style.display === "none") {
                  div.style.display = "block"; // show the div
               } else {
                  div.style.display = "none"; // hide the div
               }
            });
         </script>

         <script>
            document.getElementById("fire1").addEventListener("click", function(event) {
               event.preventDefault(); // prevent the default behavior of the link
               var div = document.getElementById("fire");
               if (div.style.display === "none") {
                  div.style.display = "block"; // show the div
               } else {
                  div.style.display = "none"; // hide the div
               }
            });
         </script>

         <script>
            document.getElementById("equipments1").addEventListener("click", function(event) {
               event.preventDefault(); // prevent the default behavior of the link
               var div = document.getElementById("equipments");
               if (div.style.display === "none") {
                  div.style.display = "block"; // show the div
               } else {
                  div.style.display = "none"; // hide the div
               }
            });
         </script>

         <script>
            document.getElementById("cctv1").addEventListener("click", function(event) {
               event.preventDefault(); // prevent the default behavior of the link
               var div = document.getElementById("cctv");
               if (div.style.display === "none") {
                  div.style.display = "block"; // show the div
               } else {
                  div.style.display = "none"; // hide the div
               }
            });
         </script>

         <script>
            document.getElementById("alarm1").addEventListener("click", function(event) {
               event.preventDefault(); // prevent the default behavior of the link
               var div = document.getElementById("alarm");
               if (div.style.display === "none") {
                  div.style.display = "block"; // show the div
               } else {
                  div.style.display = "none"; // hide the div
               }
            });
         </script>

         <script>
            document.getElementById("web1").addEventListener("click", function(event) {
               event.preventDefault(); // prevent the default behavior of the link
               var div = document.getElementById("web");
               if (div.style.display === "none") {
                  div.style.display = "block"; // show the div
               } else {
                  div.style.display = "none"; // hide the div
               }
            });
         </script>


      <script>
            document.getElementById("submit-category").addEventListener("click", function() {
                var customCategory = document.getElementById("custom-category").value;
                var select = document.getElementById("category");
                var option = document.createElement("option");
                option.text = customCategory;
                option.value = customCategory;
                select.add(option);
            });
      </script>

      
      <script>
         document.getElementById("leadsubmit-category").addEventListener("click", function() {
               var customCategory = document.getElementById("leadcustom-category").value;
               var select = document.getElementById("leadcategory");
               var option = document.createElement("option");
               option.text = customCategory;
               option.value = customCategory;
               select.add(option);
         });
      </script>
      <!--End for the page content-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                    var index = 0;

                    $('#addMoreCheckbox').on('click', function() {
                        index++;
                        var checkboxHtml = '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' + (index+5) + '"><input type="text" class="form-control" name="currencyName" placeholder="Source RFQ ' + index + '"></div>';
                        $('#new-checkboxes').append(checkboxHtml);
                    });
                });
        </script>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
          $(document).ready(function() {
              $('#otherCheckboxesContainer').hide();

              // Add an event listener to the Bid Money checkbox
              $('#bidMoneyCheckbox').change(function() {
                  if ($(this).is(':checked')) {
                  // If the Bid Money checkbox is checked, display the other checkboxes
                  $('#otherCheckboxesContainer').show();
                  } else {
                  // If the Bid Money checkbox is unchecked, hide the other checkboxes
                  $('#otherCheckboxesContainer').hide();
                  }
              });
          });
      </script>

         <script>
            function toggleGrievanceDiv() {
               const grevCheckbox = document.getElementById("grev");
               const grevDiv = document.getElementById("grevCheckbox");

               if (grevCheckbox.checked) {
                     grevDiv.style.display = "block";
               } else {
                     grevDiv.style.display = "none";
               }
            }
         </script>

         <script>
            const checkbox = document.getElementById("crossedChequeCheckbox");
            const targetDiv = document.getElementById("targetDiv");

            checkbox.addEventListener("change", function() {
            if(this.checked) {
               targetDiv.style.display = "block";
            } else {
               targetDiv.style.display = "none";
            }
            });
         </script>

         <script>
            const checkbox1 = document.getElementById("payOrderCheckbox");
            const targetDiv1 = document.getElementById("targetDiv");

            checkbox1.addEventListener("change", function() {
            if(this.checked) {
               targetDiv1.style.display = "block";
            } else {
               targetDiv1.style.display = "none";
            }
            });
         </script>


         <script>
            const checkbox2 = document.getElementById("demandDraftCheckbox");
            const targetDiv2 = document.getElementById("targetDiv");

            checkbox2.addEventListener("change", function() {
            if(this.checked) {
               targetDiv2.style.display = "block";
            } else {
               targetDiv2.style.display = "none";
            }
            });
         </script>

         <script>
            const checkbox3 = document.getElementById("bankGuaranteeCheckbox");
            const targetDiv3 = document.getElementById("targetDiv");

            checkbox3.addEventListener("change", function() {
            if(this.checked) {
               targetDiv3.style.display = "block";
            } else {
               targetDiv3.style.display = "none";
            }
            });
         </script>

         <script>
            const checkbox4 = document.getElementById("insuranceGuaranteeCheckbox");
            const targetDiv4 = document.getElementById("targetDiv");

            checkbox4.addEventListener("change", function() {
            if(this.checked) {
               targetDiv4.style.display = "block";
            } else {
               targetDiv4.style.display = "none";
            }
            });
         </script>

         <script>
            const checkbox5 = document.getElementById("byHand");
            const handDiv = document.getElementById("handDiv");

            checkbox5.addEventListener("change", function() {
            if(this.checked) {
               handDiv.style.display = "block";
            } else {
               handDiv.style.display = "none";
            }
            });
         </script>



        <script>
            document.getElementById("submit-segment").addEventListener("click", function() {
            var customCategory = document.getElementById("custom-segment").value;
            var select = document.getElementById("segment");
            var option = document.createElement("option");
            option.text = customCategory;
            option.value = customCategory;
            select.add(option);
            });
        </script>



      <script>
         function reset_data(){
           document.getElementById("myForm").reset();
         }
      </script>

      <script>
         (function($bs) {
         const CLASS_NAME = 'has-child-dropdown-show';
         $bs.Dropdown.prototype.toggle = function(_orginal) {
         return function() {
         document.querySelectorAll('.' + CLASS_NAME).forEach(function(e) {
         e.classList.remove(CLASS_NAME);
         });
         let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
         for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
         dd.classList.add(CLASS_NAME);
         }
         return _orginal.call(this);
         }
         }($bs.Dropdown.prototype.toggle);

         document.querySelectorAll('.dropdown').forEach(function(dd) {
         dd.addEventListener('hide.bs.dropdown', function(e) {
         if (this.classList.contains(CLASS_NAME)) {
         this.classList.remove(CLASS_NAME);
         e.preventDefault();
         }
         if(e.clickEvent && e.clickEvent.composedPath().some(el=>el.classList && el.classList.contains('dropdown-toggle'))){
         e.preventDefault();
         }
         e.stopPropagation(); // do not need pop in multi level mode
         });
         });

         // for hover
         function getDropdown(element) {
         return $bs.Dropdown.getInstance(element) || new $bs.Dropdown(element);
         }

         document.querySelectorAll('.dropdown-hover, .dropdown-hover-all .dropdown').forEach(function(dd) {
         dd.addEventListener('mouseenter', function(e) {
         let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
         if (!toggle.classList.contains('show')) {
         getDropdown(toggle).toggle();
         }
         });
         dd.addEventListener('mouseleave', function(e) {
         let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
         if (toggle.classList.contains('show')) {
         getDropdown(toggle).toggle();
         }
         });
         });
         })(bootstrap);
      </script>
      <script>
         function openNav() {
           document.getElementById("mySidebar").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidebar").style.width = "0";
         }
      </script>
      <!--Field Addition-->
      <script>
         // POC Daily Sales Add Fields
         var room13 = 1;
         function poc_dailysales_add_fields() {

         room13++;
         var objTo = document.getElementById('poc_dailysales_add_fields')
         var divtest = document.createElement("div");
         divtest.setAttribute("class", "first-col removeclass"+room13);
         var rdiv = 'removeclass'+room13;
         divtest.innerHTML = '<div class="row"> <div class="col-lg-4"> POC Name <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4"> POC Contact Number <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left mt-4 mx-4"> <button type="button" class="remove-btn" onclick="poc_dailysales_remove_fields('+ room13 +')">remove</button> </div></div>';
         objTo.appendChild(divtest)
         }
         function poc_dailysales_remove_fields(rid) {
          $('.removeclass'+rid).remove();
         }

         // Planning POC Add Fields
         var room15 = 1;
         function planning_poc_add_fields() {

         room15++;
         var objTo = document.getElementById('planning_poc_add_fields')
         var divtest = document.createElement("div");
         divtest.setAttribute("class", "first-col removeclass"+room15);
         var rdiv = 'removeclass'+room15;
         divtest.innerHTML = '<div class="row"> <div class="col-lg-4"> POC Name <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4"> POC Contact Number <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left mt-4 mx-4"> <button type="button" class="remove-btn" onclick="planning_poc_remove_fields('+ room15 +')">remove</button> </div></div>';
         objTo.appendChild(divtest)
         }
         function planning_poc_remove_fields(rid) {
          $('.removeclass'+rid).remove();
         }

         //sales_address_add_fields
         var room12 = 1;
         function sales_address_add_fields() {

         room12++;
         var objTo = document.getElementById('sales_address_add_fields')
         var divtest = document.createElement("div");
         divtest.setAttribute("class", "first-col removeclass"+room12);
         var rdiv = 'removeclass'+room12;
         divtest.innerHTML = ' <div class="row"> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-2 spacing-right"> Street <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> State <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Country <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Region <br> <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;"> <option value="hrm_guard">region1</option> <option value="hrm_staff">region2</option> </select> </div> <div class="col-lg-3 spacing-left spacing-right"> City <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left spacing-right"> Zip Code <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="input_field" type="text" placeholder="www.facebook.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="input_field" type="text" placeholder="www.skype.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="input_field" type="text" placeholder="www.twitter.com/" style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Company <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-6 spacing-right"> Email <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Fax <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div>  <div class="row mb-1"> <div class="col-lg-10 spacing-right"> website <br> <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Notes <br> <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea> </div> </div> </div> <div class="row"> <div class="col-lg-3" style="margin-left: 35%;"> <button type="button" class="remove-btn" style="width: 90%;" onclick="sales_address_remove_fields('+ room12 +')">Remove Addresses</button> </div> </div> </div>';
         objTo.appendChild(divtest)
         }
         function sales_address_remove_fields(rid) {
          $('.removeclass'+rid).remove();
         }

         //dailysales_address_add_fields
         var room14 = 1;
         function dailysales_address_add_fields() {

         room14++;
         var objTo = document.getElementById('dailysales_address_add_fields')
         var divtest = document.createElement("div");
         divtest.setAttribute("class", "first-col removeclass"+room14);
         var rdiv = 'removeclass'+room14;
         divtest.innerHTML = ' <div class="row"> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-2 spacing-right"> Street <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> State <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Country <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Region <br> <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;"> <option value="hrm_guard">region1</option> <option value="hrm_staff">region2</option> </select> </div> <div class="col-lg-3 spacing-left spacing-right"> City <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left spacing-right"> Zip Code <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="input_field" type="text" placeholder="www.facebook.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="input_field" type="text" placeholder="www.skype.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="input_field" type="text" placeholder="www.twitter.com/" style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Company <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-6 spacing-right"> Email <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Fax <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div>  <div class="row mb-1"> <div class="col-lg-10 spacing-right"> website <br> <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Notes <br> <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea> </div> </div> </div> <div class="row"> <div class="col-lg-3" style="margin-left: 35%;"> <button type="button" class="remove-btn" style="width: 90%;" onclick="dailysales_address_remove_fields('+ room14 +')">Remove Addresses</button> </div> </div> </div>';
         objTo.appendChild(divtest)
         }
         function dailysales_address_remove_fields(rid) {
          $('.removeclass'+rid).remove();
         }

         // POC Lead Generation Details Add Fields
         var room11 = 1;
         function poc_add_fields() {

         room11++;
         var objTo = document.getElementById('poc_add_fields')
         var divtest = document.createElement("div");
         divtest.setAttribute("class", "first-col removeclass"+room11);
         var rdiv = 'removeclass'+room11;
         divtest.innerHTML = '<div class="row"> <div class="col-lg-3"> POC Name '+ room11 +' <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-3"> POC Contact Number '+ room11 +' <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div>  <div class="col-lg-3"> Visiting Card '+ room11 +' <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left mt-4 mx-4"> <button type="button" class="remove-btn" onclick="poc_remove_fields('+ room11 +')">remove</button> </div></div>';
         objTo.appendChild(divtest)
         }
         function poc_remove_fields(rid) {
          $('.removeclass'+rid).remove();
         }

      </script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script>
         $("#rfq-form").submit(function(e) {
         e.preventDefault();
         });
      </script>

<script>




   let input = document.querySelector(".input");
   let button = document.querySelector(".input_fieldd");
   button.disabled = true;
   input.addEventListener("change", stateHandle);

   function stateHandle() {
       if(document.querySelector(".input").value === "") {
           button.disabled = true;
       } else {
           button.disabled = false;
       }
   }
   </script>
 <!--End for the page content-->
   <script>
       (function($bs) {
     const CLASS_NAME = 'has-child-dropdown-show';
        $bs.Dropdown.prototype.toggle = function(_orginal) {
           return function() {
              document.querySelectorAll('.' + CLASS_NAME).forEach(function(e) {
                 e.classList.remove(CLASS_NAME);
              });
              let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
              for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
                 dd.classList.add(CLASS_NAME);
              }
              return _orginal.call(this);
           }
        }($bs.Dropdown.prototype.toggle);

        document.querySelectorAll('.dropdown').forEach(function(dd) {
           dd.addEventListener('hide.bs.dropdown', function(e) {
              if (this.classList.contains(CLASS_NAME)) {
                 this.classList.remove(CLASS_NAME);
                 e.preventDefault();
              }
              if(e.clickEvent && e.clickEvent.composedPath().some(el=>el.classList && el.classList.contains('dropdown-toggle'))){
                 e.preventDefault();
              }
              e.stopPropagation(); // do not need pop in multi level mode
           });
        });

        // for hover
        function getDropdown(element) {
           return $bs.Dropdown.getInstance(element) || new $bs.Dropdown(element);
        }

        document.querySelectorAll('.dropdown-hover, .dropdown-hover-all .dropdown').forEach(function(dd) {
           dd.addEventListener('mouseenter', function(e) {
              let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
              if (!toggle.classList.contains('show')) {
                 getDropdown(toggle).toggle();
              }
           });
           dd.addEventListener('mouseleave', function(e) {
              let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
              if (toggle.classList.contains('show')) {
                 getDropdown(toggle).toggle();
              }
           });
        });
     })(bootstrap);
   </script>

<script>
 function openNav() {
   document.getElementById("mySidebar").style.width = "250px";
 }

 function closeNav() {
   document.getElementById("mySidebar").style.width = "0";
 }
</script>
<!--Field Addition-->
<script>

 // give a ways Add Fields
    var room1 = 1;
    function give_a_ways() {

    room1++;
    var objTo = document.getElementById('give_a_ways')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "first-col removeclass"+room1);
    var rdiv = 'removeclass'+room1;
    divtest.innerHTML = '   <div class="row"><div class="col-lg-6 spacing-right"><div class="row mb-2"> <div class="col-lg-6 spacing-left spacing-right"> Category <br><select id="catagory" class="input_field mt-1" name="catagory[]" style="width: 100%;"><option value="Dropdown1">Category1</option><option value="Dropdown2">Category2</option> <option value="Dropdown3">Category3</option> </select></div><div class="form-type col-lg-5 spacing-right"> Quantity  <br>  <input class="input_field" type="text" id="Serial" name="quantity[]" placeholder="..." style="width: 100%;"></div> </div> </div> <div class="col-lg-6 spacing-left"><div class="row mb-3"><div class="form-type col-lg-6 spacing-right">Estimated price<br>  <input class="input_field" id="shift_start_date" name=" estimated_price[]" type="text" placeholder="..." style="width: 100%;"></div> <div class="form-type col-lg-5 spacing-right">Date <br>  <input class="input_field" id="shift_end_date" name="date[]" type="date" placeholder="..." style="width: 100%;"></div> </div></div><div class="col-lg-2 spacing-left my-5"> <button type="button" class="remove-btn" onclick="education_remove_fields('+ room1 +')">Remove</button> </div></div>';
    objTo.appendChild(divtest)
    }
    function give_a_ways_remove_fields(rid) {
       $('.removeclass'+rid).remove();
    }

   //Work Experience Add Fields
    var room2 = 1;
    function work_add_fields() {

    room2++;
    var objTo = document.getElementById('work_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "second-col removeclass"+room2);
    var rdiv = 'removeclass'+room2;
    divtest.innerHTML = '<div class="row"><div class="col-lg-6">  <div class="row mb-2"> <div class="col-lg-6 spacing-right"> Date  <br>  <input class="input_field" id="date" name="date[]" type="date" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right"> Printing Date <br>  <input class="input_field" id="printing_date" name="printing_date[]" type="date" placeholder="..." style="width: 100%;"></div>  </div> <div class="row mb-2"> <div class="col-lg-6 spacing-right"> Start Date <br>  <input class="input_field" id="start_date" name="end_date[]" type="date" placeholder="..." style="width: 100%;"></div> <div class="col-lg-5 spacing-left spacing-right"> End Date <br>  <input class="input_field" id="end_date" name="end_date[]" type="date" placeholder="..." style="width: 100%;"> </div> </div></div> <div class="col-lg-5 spacing-left"><div class="row mb-2"><div class="col-lg-6 spacing-right"> Renewal Date <br>  <input class="input_field" id="renewal_date" name="renewal_date[]" type="date" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left"> Attachement <br>  <input class="input_field" id="image" name="image[]" type="file" placeholder="..." style="width: 100%;" multiple></div> </div> <div class="row mb-2"> <div class="col-lg-12 spacing-right"> Compliances<br><div class="form-check form-check-inline"> <label class="form-check-label" for="inlineCheckbox1">Group EoBI</label> </div> <div class="form-check form-check-inline"> <label class="form-check-label" for="inlineCheckbox2">Social Security</label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" id="compliances" name="compliances[]" type="checkbox" id="inlineCheckbox2" value="option2"> <label class="form-check-label" for="inlineCheckbox2">Group Life Insurance</label> </div><div class="form-check form-check-inline"><input class="form-check-input" id="compliances" name="compliances[]" type="checkbox" id="inlineCheckbox2" value="option2"><label class="form-check-label" for="inlineCheckbox2">Any Other</label></div></div> </div></div><div class="col-lg-2 spacing-left my-5"><button type="button" class="remove-btn" onclick="work_remove_fields('+ room2 +');">Remove</button></div> </div>';
    objTo.appendChild(divtest)
    }
    function work_remove_fields(rid) {
       $('.removeclass'+rid).remove();
    }

    //Compliance Add Fields
    var room3 = 1;
    function compliance_add_fields() {

    room3++;
    var objTo = document.getElementById('compliance_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "Third-col removeclass"+room3);
    var rdiv = 'removeclass'+room2;
    divtest.innerHTML = '<div class="row"><div class="col-lg-10 mt-2"><div class="row mb-2"><div class="col-lg-5 spacing-right">CNIC <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Name <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-5 spacing-right">Father Name <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Relationship <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-2 mt-5"><button type="button" class="remove-btn" onclick="compliance_remove_fields('+ room3 +')">Remove</button></div></div>';
    objTo.appendChild(divtest)
    }
    function compliance_remove_fields(rid) {
       $('.removeclass'+rid).remove();
    }

    guarantor = 1;
    //Guarantor Add Fields
    var room4 = 1;
    function guarantor_add_fields() {

    room4++;
    var objTo = document.getElementById('guarantor_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "Fourth-col removeclass"+room4);
    var rdiv = 'removeclass'+room4;

    guarantor +=1;
    divtest.innerHTML = '<div class="row"><div class=" row main-content div"><h5>Site Address</h5> <div class="col-lg-6"><div class="row mb-2"><div class="col-lg-6 spacing-right"> Name  <br>  <input class="input_field" id="site_name" name="site_name[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right"> Email <br>  <input class="input_field" id="site_email" name="site_email[]" type="text" placeholder="..." style="width: 100%;"></div> </div> </div> <div class="col-lg-6 spacing-left"><div class="row mb-2"><div class="col-lg-5 spacing-right">Cell No  <br>  <input class="input_field" id="site_cell_no" name="site_cell_no" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left"> Designation <br>  <select id="site_designation" class="input_field mt-1" name="site_designation[]" style="width: 100%;"><option value="Dropdown1">Designation1</option> <option value="Dropdown2">Designation2</option> <option value="Dropdown3">Designation3</option> </select> </div></div><div class="row mb-2"> <div class="col-lg-10"> Location <br>  <input class="input_field" id="site_location" name="site_location[]" type="text" placeholder="..." style="width: 100%;"></div></div> </div> </div> <div class=" row main-content div"> <h5>Head Office Address</h5><div class="col-lg-6"><div class="row mb-2"> <div class="col-lg-6 spacing-right">Name  <br>  <input class="input_field" id="head_office_name" name="head_office_name[]" type="text" placeholder="..." style="width: 100%;"></div> <div class="col-lg-5 spacing-left spacing-right">Email <br>  <input class="input_field" id="head_office_email" name="head_office_email[]" type="text" placeholder="..." style="width: 100%;"></div> </div></div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right">Cell No  <br>  <input class="input_field" id="head_office_cell_no" name="head_office_cell_no[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left"> Designation <br>  <select id="head_office_designation" class="input_field mt-1" name="head_office_designation[]" style="width: 100%;"><option value="Dropdown1">Designation1</option> <option value="Dropdown2">Designation2</option><option value="Dropdown3">Designation3</option> </select> </div> </div> <div class="row mb-2"><div class="col-lg-10"> Location <br>  <input class="input_field" id="head_office_location" name="head_office_location[]" type="text" placeholder="..." style="width: 100%;"></div> </div></div> </div> <div class=" row main-content div"> <h5>Billing Address</h5> <div class="col-lg-6"><div class="row mb-2"> <div class="col-lg-6 spacing-right"> Name  <br>  <input class="input_field" id="billing_name" name="billing_name[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Email <br>  <input class="input_field" id="billing_email" name="billing_email[]" type="text" placeholder="..." style="width: 100%;"></div></div></div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Cell No  <br>  <input class="input_field" id="billing_cell_no" name="billing_cell_no[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left">  Designation <br>  <select id="billing_designation" class="input_field mt-1" name="billing_designation[]" style="width: 100%;"><option value="Dropdown1">Designation1</option> <option value="Dropdown2">Designation2</option> <option value="Dropdown3">Designation3</option></select> </div> </div> <div class="row mb-2"> <div class="col-lg-10">Location <br>  <input class="input_field" id="billing_location" name="billing_location[]" type="text" placeholder="..." style="width: 100%;"></div> </div> </div> </div><div class=" row main-content div"> <h5>POC Address</h5><div class="col-lg-6"><div class="row mb-2"> <div class="col-lg-6 spacing-right">Name  <br>  <input class="input_field" id="poc_name" name="poc_name[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Email <br>  <input class="input_field" id="poc_email" name="poc_email[]" type="text" placeholder="..." style="width: 100%;"></div> </div> </div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Cell No  <br>  <input class="input_field" id="poc_cell_no" name="poc_cell_no[]" type="text" placeholder="..." style="width: 100%;"></div> <div class="col-lg-5 spacing-left"> Designation <br>  <select id="poc_designation" class="input_field mt-1" name="poc_designation[]" style="width: 100%;"><option value="Dropdown1">Designation1</option><option value="Dropdown2">Designation2</option> <option value="Dropdown3">Designation3</option></select> </div></div><div class="row mb-2"> <div class="col-lg-10">Location <br>  <input class="input_field" id="poc_location" name="poc_location[]" type="text" placeholder="..." style="width: 100%;"></div></div> </div>  </div> <center> <button type="button" class="remove-btn" onclick="guarantor_remove_fields('+ room4 +')"> Remove </button> </center> </div>';
    objTo.appendChild(divtest)
    }
    function guarantor_remove_fields(rid) {
       $('.removeclass'+rid).remove();
       --guarantor;
    }

</script>


<!--Field Addition-->
<script>

   // Education Add Fields
      var room1 = 1;
      function education_add_fields() {

      room1++;
      var objTo = document.getElementById('education_add_fields')
      var divtest = document.createElement("div");
      divtest.setAttribute("class", "first-col removeclass"+room1);
      var rdiv = 'removeclass'+room1;
      divtest.innerHTML = ' <div class="row"> <div class="col-lg-6 spacing-right"><div class="row mb-2"> <div class="form-type col-lg-6 spacing-right">Serial #  <br>  <input class="input_field" type="text" id="Serial" name="Serial[]" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Category <br>  <select id="catagory" class="input_field mt-1" name="catagory[]" style="width: 100%;"><option value="Dropdown1">Category1</option><option value="Dropdown2">Category2</option><option value="Dropdown3">Category3</option></select></div></div><div class="row mb-2"><div class="form-type col-lg-6 spacing-right"> Quantity   <br>  <input class="input_field" type="text" id="Quantity" name="Quantity[]" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Duty Hours  <br>  <input class="input_field" type="text" id="Duty_Hours" name="Duty_Hours[]" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-4 spacing-left"><div class="row mb-3"><div class="form-type col-lg-6 spacing-right">Shift Start Date. <br>  <input class="input_field" id="shift_start_date" name="shift_start_date[]" type="date" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-right">Shift End Date. <br>  <input class="input_field" id="shift_end_date" name="shift_end_date[]" type="date" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="form-type col-lg-6 spacing-right">Any Spicial Extraction <br>  <input class="input_field" type="text" id="Extraction" name="Extraction[]" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-left spacing-right">Salary <br>  <input class="input_field" type="text" id="Salary" name="Salary[]" placeholder="..." style="width: 100%;"></div></div></div> <div class="col-lg-2 spacing-left my-5"> <button type="button" class="remove-btn" onclick="education_remove_fields('+ room1 +')">Remove</button> </div></div>';
      objTo.appendChild(divtest)
      }
      function education_remove_fields(rid) {
         $('.removeclass'+rid).remove();
      }

     //Work Experience Add Fields
      var room2 = 1;
      function work_add_fields() {

      room2++;
      var objTo = document.getElementById('work_add_fields')
      var divtest = document.createElement("div");
      divtest.setAttribute("class", "second-col removeclass"+room2);
      var rdiv = 'removeclass'+room2;
      divtest.innerHTML = '<div class="row"><div class="col-lg-6">  <div class="row mb-2"> <div class="col-lg-6 spacing-right"> Date  <br>  <input class="input_field" id="date" name="date[]" type="date" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right"> Printing Date <br>  <input class="input_field" id="printing_date" name="printing_date[]" type="date" placeholder="..." style="width: 100%;"></div>  </div> <div class="row mb-2"> <div class="col-lg-6 spacing-right"> Start Date <br>  <input class="input_field" id="start_date" name="end_date[]" type="date" placeholder="..." style="width: 100%;"></div> <div class="col-lg-5 spacing-left spacing-right"> End Date <br>  <input class="input_field" id="end_date" name="end_date[]" type="date" placeholder="..." style="width: 100%;"> </div> </div></div> <div class="col-lg-5 spacing-left"><div class="row mb-2"><div class="col-lg-6 spacing-right"> Renewal Date <br>  <input class="input_field" id="renewal_date" name="renewal_date[]" type="date" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left"> Attachement <br>  <input class="input_field" id="image" name="image[]" type="file" placeholder="..." style="width: 100%;" multiple></div> </div> <div class="row mb-2"> <div class="col-lg-12 spacing-right"> Compliances<br><div class="form-check form-check-inline"> <label class="form-check-label" for="inlineCheckbox1">Group EoBI</label> </div> <div class="form-check form-check-inline"> <label class="form-check-label" for="inlineCheckbox2">Social Security</label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" id="compliances" name="compliances[]" type="checkbox" id="inlineCheckbox2" value="option2"> <label class="form-check-label" for="inlineCheckbox2">Group Life Insurance</label> </div><div class="form-check form-check-inline"><input class="form-check-input" id="compliances" name="compliances[]" type="checkbox" id="inlineCheckbox2" value="option2"><label class="form-check-label" for="inlineCheckbox2">Any Other</label></div></div> </div></div><div class="col-lg-2 spacing-left my-5"><button type="button" class="remove-btn" onclick="work_remove_fields('+ room2 +');">Remove</button></div> </div>';
      objTo.appendChild(divtest)
      }
      function work_remove_fields(rid) {
         $('.removeclass'+rid).remove();
      }

      //Compliance Add Fields
      var room3 = 1;
      function compliance_add_fields() {

      room3++;
      var objTo = document.getElementById('compliance_add_fields')
      var divtest = document.createElement("div");
      divtest.setAttribute("class", "Third-col removeclass"+room3);
      var rdiv = 'removeclass'+room2;
      divtest.innerHTML = '<div class="row"><div class="col-lg-10 mt-2"><div class="row mb-2"><div class="col-lg-5 spacing-right">CNIC <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Name <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-5 spacing-right">Father Name <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Relationship <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-2 mt-5"><button type="button" class="remove-btn" onclick="compliance_remove_fields('+ room3 +')">Remove</button></div></div>';
      objTo.appendChild(divtest)
      }
      function compliance_remove_fields(rid) {
         $('.removeclass'+rid).remove();
      }

      guarantor = 1;
      //Guarantor Add Fields
      var room4 = 1;
      function guarantor_add_fields() {

      room4++;
      var objTo = document.getElementById('guarantor_add_fields')
      var divtest = document.createElement("div");
      divtest.setAttribute("class", "Fourth-col removeclass"+room4);
      var rdiv = 'removeclass'+room4;

      guarantor +=1;
      divtest.innerHTML = '<div class="row"><div class=" row main-content div"><h5>Site Address</h5> <div class="col-lg-6"><div class="row mb-2"><div class="col-lg-6 spacing-right"> Name  <br>  <input class="input_field" id="site_name" name="site_name[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right"> Email <br>  <input class="input_field" id="site_email" name="site_email[]" type="text" placeholder="..." style="width: 100%;"></div> </div> </div> <div class="col-lg-6 spacing-left"><div class="row mb-2"><div class="col-lg-5 spacing-right">Cell No  <br>  <input class="input_field" id="site_cell_no" name="site_cell_no" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left"> Designation <br>  <select id="site_designation" class="input_field mt-1" name="site_designation[]" style="width: 100%;"><option value="Dropdown1">Designation1</option> <option value="Dropdown2">Designation2</option> <option value="Dropdown3">Designation3</option> </select> </div></div><div class="row mb-2"> <div class="col-lg-10"> Location <br>  <input class="input_field" id="site_location" name="site_location[]" type="text" placeholder="..." style="width: 100%;"></div></div> </div> </div> <div class=" row main-content div"> <h5>Head Office Address</h5><div class="col-lg-6"><div class="row mb-2"> <div class="col-lg-6 spacing-right">Name  <br>  <input class="input_field" id="head_office_name" name="head_office_name[]" type="text" placeholder="..." style="width: 100%;"></div> <div class="col-lg-5 spacing-left spacing-right">Email <br>  <input class="input_field" id="head_office_email" name="head_office_email[]" type="text" placeholder="..." style="width: 100%;"></div> </div></div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right">Cell No  <br>  <input class="input_field" id="head_office_cell_no" name="head_office_cell_no[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left"> Designation <br>  <select id="head_office_designation" class="input_field mt-1" name="head_office_designation[]" style="width: 100%;"><option value="Dropdown1">Designation1</option> <option value="Dropdown2">Designation2</option><option value="Dropdown3">Designation3</option> </select> </div> </div> <div class="row mb-2"><div class="col-lg-10"> Location <br>  <input class="input_field" id="head_office_location" name="head_office_location[]" type="text" placeholder="..." style="width: 100%;"></div> </div></div> </div> <div class=" row main-content div"> <h5>Billing Address</h5> <div class="col-lg-6"><div class="row mb-2"> <div class="col-lg-6 spacing-right"> Name  <br>  <input class="input_field" id="billing_name" name="billing_name[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Email <br>  <input class="input_field" id="billing_email" name="billing_email[]" type="text" placeholder="..." style="width: 100%;"></div></div></div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Cell No  <br>  <input class="input_field" id="billing_cell_no" name="billing_cell_no[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left">  Designation <br>  <select id="billing_designation" class="input_field mt-1" name="billing_designation[]" style="width: 100%;"><option value="Dropdown1">Designation1</option> <option value="Dropdown2">Designation2</option> <option value="Dropdown3">Designation3</option></select> </div> </div> <div class="row mb-2"> <div class="col-lg-10">Location <br>  <input class="input_field" id="billing_location" name="billing_location[]" type="text" placeholder="..." style="width: 100%;"></div> </div> </div> </div><div class=" row main-content div"> <h5>POC Address</h5><div class="col-lg-6"><div class="row mb-2"> <div class="col-lg-6 spacing-right">Name  <br>  <input class="input_field" id="poc_name" name="poc_name[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Email <br>  <input class="input_field" id="poc_email" name="poc_email[]" type="text" placeholder="..." style="width: 100%;"></div> </div> </div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Cell No  <br>  <input class="input_field" id="poc_cell_no" name="poc_cell_no[]" type="text" placeholder="..." style="width: 100%;"></div> <div class="col-lg-5 spacing-left"> Designation <br>  <select id="poc_designation" class="input_field mt-1" name="poc_designation[]" style="width: 100%;"><option value="Dropdown1">Designation1</option><option value="Dropdown2">Designation2</option> <option value="Dropdown3">Designation3</option></select> </div></div><div class="row mb-2"> <div class="col-lg-10">Location <br>  <input class="input_field" id="poc_location" name="poc_location[]" type="text" placeholder="..." style="width: 100%;"></div></div> </div>  </div> <center> <button type="button" class="remove-btn" onclick="guarantor_remove_fields('+ room4 +')"> Remove </button> </center> </div>';
      objTo.appendChild(divtest)
      }
      function guarantor_remove_fields(rid) {
         $('.removeclass'+rid).remove();
         --guarantor;
      }

  </script>

  <!--Image Preview Basic Info-->
  <script>
              const inpFile = document.getElementById("inpFile");
              const previewContainer = document.getElementById("imagePreview");
              const previewImage = previewContainer.querySelector(".image-preview__image");
              const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

              inpFile.addEventListener("change", function(){
                  const file = this.files[0];

                  if(file){
                      const reader = new FileReader();

                      previewDefaultText.style.display = "none";
                      previewImage.style.display = "block";

                      reader.addEventListener("load", function(){
                          previewImage.setAttribute("src", this.result);
                      });

                      reader.readAsDataURL(file);
                  }
                  else{
                      previewDefaultText.style.display = "null";
                      previewImage.style.display = "null";
                      previewImage.setAttribute("src", "");
                  }


              });
  </script>

  <!--Image Preview Education-->
  <script>
      const inpFile3 = document.getElementById("inpFile3");
      const previewContainer3 = document.getElementById("imagePreview3");
      const previewImage3 = previewContainer3.querySelector(".image-preview__image3");
      const previewDefaultText3 = previewContainer3.querySelector(".image-preview__default-text3");

      inpFile3.addEventListener("change", function(){
          const file = this.files[0];

          if(file){
              const reader = new FileReader();

              previewDefaultText3.style.display = "none";
              previewImage3.style.display = "block";

              reader.addEventListener("load", function(){
                  previewImage3.setAttribute("src", this.result);
              });

              reader.readAsDataURL(file);
          }
          else{
              previewDefaultText3.style.display = "null";
              previewImage3.style.display = "null";
              previewImage3.setAttribute("src", "");
          }


      });
  </script>

  <!--Image Preview Compliance-->
  <script>
      const inpFile4 = document.getElementById("inpFile4");
      const previewContainer4 = document.getElementById("imagePreview4");
      const previewImage4 = previewContainer4.querySelector(".image-preview__image4");
      const previewDefaultText4 = previewContainer4.querySelector(".image-preview__default-text4");

      inpFile4.addEventListener("change", function(){
          const file = this.files[0];

          if(file){
              const reader = new FileReader();

              previewDefaultText4.style.display = "none";
              previewImage4.style.display = "block";

              reader.addEventListener("load", function(){
                  previewImage4.setAttribute("src", this.result);
              });

              reader.readAsDataURL(file);
          }
          else{
              previewDefaultText4.style.display = "null";
              previewImage4.style.display = "null";
              previewImage4.setAttribute("src", "");
          }


      });
  </script>

  <!--Image Preview Health Status-->
  <script>
      const inpFile5 = document.getElementById("inpFile5");
      const previewContainer5 = document.getElementById("imagePreview5");
      const previewImage5 = previewContainer5.querySelector(".image-preview__image5");
      const previewDefaultText5 = previewContainer5.querySelector(".image-preview__default-text5");

      inpFile5.addEventListener("change", function(){
          const file = this.files[0];

          if(file){
              const reader = new FileReader();

              previewDefaultText5.style.display = "none";
              previewImage5.style.display = "block";

              reader.addEventListener("load", function(){
                  previewImage5.setAttribute("src", this.result);
              });

              reader.readAsDataURL(file);
          }
          else{
              previewDefaultText5.style.display = "null";
              previewImage5.style.display = "null";
              previewImage5.setAttribute("src", "");
          }


      });
  </script>

  <!--Image Preview Biometric-->
  <script>
      const inpFile6 = document.getElementById("inpFile6");
      const previewContainer6 = document.getElementById("imagePreview6");
      const previewImage6 = previewContainer6.querySelector(".image-preview__image6");
      const previewDefaultText6 = previewContainer6.querySelector(".image-preview__default-text6");

      inpFile6.addEventListener("change", function(){
          const file = this.files[0];

          if(file){
              const reader = new FileReader();

              previewDefaultText6.style.display = "none";
              previewImage6.style.display = "block";

              reader.addEventListener("load", function(){
                  previewImage6.setAttribute("src", this.result);
              });

              reader.readAsDataURL(file);
          }
          else{
              previewDefaultText6.style.display = "null";
              previewImage6.style.display = "null";
              previewImage6.setAttribute("src", "");
          }


      });
  </script>

  <script>
      const inpFile7 = document.getElementById("inpFile7");
      const previewContainer7 = document.getElementById("imagePreview7");
      const previewImage7 = previewContainer7.querySelector(".image-preview__image7");
      const previewDefaultText7 = previewContainer7.querySelector(".image-preview__default-text7");

      inpFile7.addEventListener("change", function(){
          const file = this.files[0];

          if(file){
              const reader = new FileReader();

              previewDefaultText7.style.display = "none";
              previewImage7.style.display = "block";

              reader.addEventListener("load", function(){
                  previewImage7.setAttribute("src", this.result);
              });

              reader.readAsDataURL(file);
          }
          else{
              previewDefaultText7.style.display = "null";
              previewImage7.style.display = "null";
              previewImage7.setAttribute("src", "");
          }


      });
  </script>

  <script>
      const inpFile8 = document.getElementById("inpFile8");
      const previewContainer8 = document.getElementById("imagePreview8");
      const previewImage8 = previewContainer8.querySelector(".image-preview__image8");
      const previewDefaultText8 = previewContainer8.querySelector(".image-preview__default-text8");

      inpFile8.addEventListener("change", function(){
          const file = this.files[0];

          if(file){
              const reader = new FileReader();

              previewDefaultText8.style.display = "none";
              previewImage8.style.display = "block";

              reader.addEventListener("load", function(){
                  previewImage8.setAttribute("src", this.result);
              });

              reader.readAsDataURL(file);
          }
          else{
              previewDefaultText8.style.display = "null";
              previewImage8.style.display = "null";
              previewImage8.setAttribute("src", "");
          }


      });
  </script>

  <script>
      const inpFile9 = document.getElementById("inpFile9");
      const previewContainer9 = document.getElementById("imagePreview9");
      const previewImage9 = previewContainer9.querySelector(".image-preview__image9");
      const previewDefaultText9 = previewContainer9.querySelector(".image-preview__default-text9");

      inpFile9.addEventListener("change", function(){
          const file = this.files[0];

          if(file){
              const reader = new FileReader();

              previewDefaultText9.style.display = "none";
              previewImage9.style.display = "block";

              reader.addEventListener("load", function(){
                  previewImage9.setAttribute("src", this.result);
              });

              reader.readAsDataURL(file);
          }
          else{
              previewDefaultText9.style.display = "null";
              previewImage9.style.display = "null";
              previewImage9.setAttribute("src", "");
          }


      });
  </script>

  <script>
      const inpFile10 = document.getElementById("inpFile10");
      const previewContainer10 = document.getElementById("imagePreview10");
      const previewImage10 = previewContainer10.querySelector(".image-preview__image10");
      const previewDefaultText10 = previewContainer10.querySelector(".image-preview__default-text10");

      inpFile10.addEventListener("change", function(){
          const file = this.files[0];

          if(file){
              const reader = new FileReader();

              previewDefaultText10.style.display = "none";
              previewImage10.style.display = "block";

              reader.addEventListener("load", function(){
                  previewImage10.setAttribute("src", this.result);
              });

              reader.readAsDataURL(file);
          }
          else{
              previewDefaultText10.style.display = "null";
              previewImage10.style.display = "null";
              previewImage10.setAttribute("src", "");
          }


      });
  </script>

  <script>
      const inpFile11 = document.getElementById("inpFile11");
      const previewContainer11 = document.getElementById("imagePreview11");
      const previewImage11 = previewContainer11.querySelector(".image-preview__image11");
      const previewDefaultText11 = previewContainer11.querySelector(".image-preview__default-text11");

      inpFile11.addEventListener("change", function(){
          const file = this.files[0];

          if(file){
              const reader = new FileReader();

              previewDefaultText11.style.display = "none";
              previewImage11.style.display = "block";

              reader.addEventListener("load", function(){
                  previewImage11.setAttribute("src", this.result);
              });

              reader.readAsDataURL(file);
          }
          else{
              previewDefaultText11.style.display = "null";
              previewImage11.style.display = "null";
              previewImage11.setAttribute("src", "");
          }


      });
  </script>




      <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
      <!-- JavaScript Bundle with Popper -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </body>
</html>



<!--Popup model for User new entry-->
<div class="modal fade" id="add_user" >
  <div class="modal-dialog" role="document" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> Customer Form </h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <section>

            <form action="" class="liscence_form m-5" style="width: 90%;">

                <!--HRM System / Main Form-->
                <div class="row" style="font-weight:600;">
                  <h5> Basic Information </h5>
                  <div class="row mb-2">

                    </div>
                    <div class="col-lg-6 spacing-right">
                        <div class="row mb-2 mt-1">
                            <div class="col-lg-6">
                             Cusromer ID <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-right">
                                Site ID <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                      <div class="row mb-2 mt-3">

                          <div class="col-lg-6 spacing-left">
                              Company Name <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left spacing-right">
                                Type of Company <br>
                                <select id="catagory" class="input_field mt-1" name="catagory" style="width: 100%;">
                                 <option value="Dropdown1">Type1</option>
                                 <option value="Dropdown2">Type2</option>
                                 <option value="Dropdown3">Type3</option>
                               </select>
                             </div>
                      </div>

                    </div>


                    <div class="col-lg-6 spacing-left">
                      <div class="row mb-2">
                          <div class="col-lg-6 pt-1 spacing-right">
                              Nature of Business  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 pt-1 spacing-right">
                            Website  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                        </div>

                      </div>
                      <div class="row mb-2">


                    </div>

                      <div class="row">
                          <div class="col-lg-11 spacing-right">
                            <div class="form-group form-check">
                              <input type="checkbox" class="form-check-input input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Sub-customer</label>


                              <input class="input_fieldd" type="text" placeholder="..." style="width: 100%;">
                            </div>
                          </div>
                      </div>
                    </div>
                </div>

                <!--Tabs forDetails-->

                <nav>
                  <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                    <!-- <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#basic-info" role="tab" aria-controls="nav-home" aria-selected="true">Basic Info</a> -->
                    <!-- <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#basic-info" role="tab" aria-controls="nav-home" aria-selected="true">Basic Info</a> -->
                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#education" role="tab" aria-controls="nav-profile" aria-selected="false">Deployment details </a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#guaranter-details" role="tab" aria-controls="nav-contact" aria-selected="false">Address</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#work-experience" role="tab" aria-controls="nav-contact" aria-selected="false">Contract Management</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#verifications" role="tab" aria-controls="nav-contact" aria-selected="false">Feedback</a>

                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#address-details" role="tab" aria-controls="nav-profile" aria-selected="false">Monthly
                      Performance Review Report</a>

                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#biometric-record" role="tab" aria-controls="nav-profile" aria-selected="false">Give a ways</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#health-status" role="tab" aria-controls="nav-profile" aria-selected="false">Sale Planning</a>
                    <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#training-details" role="tab" aria-controls="nav-contact" aria-selected="false">Training Details</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#inventory-bin-card" role="tab" aria-controls="nav-profile" aria-selected="false">Inventory Bin Card</a> -->
                  </div>
                </nav>


                  <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">

                  <!--Basic Info-->

                  <!--deployment details-->
                  <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="education" role="tabpanel" aria-labelledby="nav-profile-tab">

                      <div class="row">
                          <div class="col-lg-6 spacing-right">
                              <div class="row mb-2">
                                  <div class="form-type col-lg-6 spacing-right">
                                    Serial #  <br>  <input class="input_field" type="text" id="Serial" name="Serial[]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left spacing-right">
                                    Category <br>
                                    <select id="catagory" class="input_field mt-1" name="catagory[]" style="width: 100%;">
                                     <option value="Dropdown1">Category1</option>
                                     <option value="Dropdown2">Category2</option>
                                     <option value="Dropdown3">Category3</option>
                                   </select>
                                 </div>

                              </div>
                              <div class="row mb-2">
                                <div class="form-type col-lg-6 spacing-right">
                                    Quantity   <br>  <input class="input_field" type="text" id="Quantity" name="Quantity[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Duty Hours  <br>
                                  <input class="input_field" type="text" id="Duty_Hours" name="Duty_Hours[]" placeholder="..." style="width: 100%;">
                               </div>

                            </div>


                          </div>
                          <div class="col-lg-4 spacing-left">
                              <div class="row mb-3">
                                  <div class="form-type col-lg-6 spacing-right">
                                      Shift Start Date. <br>  <input class="input_field" id="shift_start_date" name="shift_start_date[]" type="date" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="form-type col-lg-5 spacing-right">
                                    Shift End Date. <br>  <input class="input_field" id="shift_end_date" name="shift_end_date[]" type="date" placeholder="..." style="width: 100%;">
                                </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="form-type col-lg-6 spacing-right">
                                     Any Spicial Extraction <br>  <input class="input_field" type="text" id="Extraction" name="Extraction[]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="form-type col-lg-5 spacing-left spacing-right">
                                     Salary <br>  <input class="input_field" type="text" id="Salary" name="Salary[]" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-2 spacing-left my-5">
                              <button type="button" class="add-more-btn" onclick="education_add_fields()">Add More</button>
                          </div>

                          <div id="education_add_fields">

                          </div>


                      </div>

                  </div>
                   <!--Address-->
                   <div class="tab-pane fade m-3" style="opacity: 90%;" id="guaranter-details" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class=" row main-content div">
                        <h5>Site Address</h5>
                        <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                        Name  <br>  <input class="input_field" id="site_name" name="site_name[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                       Email <br>  <input class="input_field" id="site_email" name="site_email[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>

                        </div>
                        <div class="col-lg-6 spacing-left">
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Cell No  <br>  <input class="input_field" id="site_cell_no" name="site_cell_no" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Designation <br>  <select id="site_designation" class="input_field mt-1" name="site_designation[]" style="width: 100%;">
                                        <option value="Dropdown1">Designation1</option>
                                        <option value="Dropdown2">Designation2</option>
                                        <option value="Dropdown3">Designation3</option>
                                      </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-10">
                                    Location <br>  <input class="input_field" id="site_location" name="site_location[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                            </div>
                        </div>
                        </div>
                        <div class=" row main-content div">
                            <h5>Head Office Address</h5>
                            <div class="col-lg-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-right">
                                            Name  <br>  <input class="input_field" id="head_office_name" name="head_office_name[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right">
                                           Email <br>  <input class="input_field" id="head_office_email" name="head_office_email[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>

                            </div>
                            <div class="col-lg-6 spacing-left">
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Cell No  <br>  <input class="input_field" id="head_office_cell_no" name="head_office_cell_no[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Designation <br>  <select id="head_office_designation" class="input_field mt-1" name="head_office_designation[]" style="width: 100%;">
                                            <option value="Dropdown1">Designation1</option>
                                            <option value="Dropdown2">Designation2</option>
                                            <option value="Dropdown3">Designation3</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-10">
                                        Location <br>  <input class="input_field" id="head_office_location" name="head_office_location[]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row main-content div">
                            <h5>Billing Address</h5>
                            <div class="col-lg-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-right">
                                            Name  <br>  <input class="input_field" id="billing_name" name="billing_name[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right">
                                           Email <br>  <input class="input_field" id="billing_email" name="billing_email[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>

                            </div>
                            <div class="col-lg-6 spacing-left">
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Cell No  <br>  <input class="input_field" id="billing_cell_no" name="billing_cell_no[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Designation <br>  <select id="billing_designation" class="input_field mt-1" name="billing_designation[]" style="width: 100%;">
                                            <option value="Dropdown1">Designation1</option>
                                            <option value="Dropdown2">Designation2</option>
                                            <option value="Dropdown3">Designation3</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-10">
                                        Location <br>  <input class="input_field" id="billing_location" name="billing_location[]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row main-content div">
                            <h5>POC Address</h5>
                            <div class="col-lg-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-right">
                                            Name  <br>  <input class="input_field" id="poc_name" name="poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right">
                                           Email <br>  <input class="input_field" id="poc_email" name="poc_email[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>

                            </div>
                            <div class="col-lg-6 spacing-left">
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Cell No  <br>  <input class="input_field" id="poc_cell_no" name="poc_cell_no[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Designation <br>  <select id="poc_designation" class="input_field mt-1" name="poc_designation[]" style="width: 100%;">
                                            <option value="Dropdown1">Designation1</option>
                                            <option value="Dropdown2">Designation2</option>
                                            <option value="Dropdown3">Designation3</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-10">
                                        Location <br>  <input class="input_field" id="poc_location" name="poc_location[]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                </div>
                            </div>
                        </div>




                    <center>
                        <button type="button" class="add-more-btn" onclick="guarantor_add_fields()">
                            Add More
                        </button>
                    </center>



                    <div id="guarantor_add_fields"></div>

                    </div>
                </div>

                  <!--contract management-->
                  <div class="tab-pane fade m-3" style="opacity: 90%;" id="work-experience" role="tabpanel" aria-labelledby="nav-contact-tab">


                    <div class="row">
                          <div class="col-lg-6">
                              <div class="row mb-2">
                                  <div class="col-lg-6 spacing-right">
                                      Date  <br>  <input class="input_field" id="date" name="date[]" type="date" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left spacing-right">
                                      Printing Date <br>  <input class="input_field" id="printing_date" name="printing_date[]" type="date" placeholder="..." style="width: 100%;">
                                   </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-6 spacing-right">
                                      Start Date <br>  <input class="input_field" id="start_date" name="end_date[]" type="date" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left spacing-right">
                                      End Date <br>  <input class="input_field" id="end_date" name="end_date[]" type="date" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>


                          </div>
                          <div class="col-lg-5 spacing-left">
                              <div class="row mb-2">
                                  <div class="col-lg-6 spacing-right">
                                      Renewal Date <br>  <input class="input_field" id="renewal_date" name="renewal_date[]" type="date" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-right spacing-left">
                                    Attachement <br>  <input class="input_field" id="image" name="image[]" type="file" placeholder="..." style="width: 100%;" multiple>
                                  </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-12 spacing-right">
                                    Compliances<br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="compliances" name="compliances[]" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Group EoBI</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="compliances" name="compliances[]" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Social Security</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="compliances" name="compliances[]" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Group Life Insurance</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="compliances" name="compliances[]" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Any Other</label>
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <div class="col-lg-2 spacing-left my-5">
                              <button type="button" class="add-more-btn" onclick="work_add_fields()">Add More</button>
                          </div>

                          <div id="work_add_fields">

                          </div>

                          <div class="row mb-2">
                          </div>

                      </div>

                  </div>

                   <!--Feedback-->
                   <div class="tab-pane fade m-3" style="opacity: 90%;" id="verifications" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                       <div class="col-lg-7">
                          <div class="row mb-2">
                             <div class="col-lg-11 spacing-right">
                                Client Name:  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                             </div>
                             <div class="col-lg-11 spacing-right">
                                Client POC Name: <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                             </div>
                             <div class="col-lg-11 spacing-right">
                                Email:  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
                             </div>

                          </div>

                       </div>

                       <div class="col-lg-5">
                          <div class="row mb-2">
                             <div class="col-lg-6 spacing-left spacing-right">
                                Client ID: <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                             </div>
                             <div class="col-lg-5 spacing-right">
                                Site ID: <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                             </div>
                          </div>
                          <div class="row mb-5">
                             <div class="col-lg-11 spacing-left spacing-right">
                                Designation:  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                             </div>
                             <div class="col-lg-11 spacing-left spacing-right">
                                Cell:  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                             </div>

                          </div>

                       </div>

                       <div class="col-lg-11">
                          <table class="table table-bordered">
                             <thead>
								  <div class="row mb-5">
                             <div class="col-lg-4 spacing-left spacing-right">
								 <h5>Feedback for the month:</h5>
                             </div>
                             <div class="col-lg-4 spacing-left spacing-right">
                               <input class="input_field" type="month" placeholder="..." style="width: 100%;">
                             </div>
								 <div class="col-lg-4 spacing-left spacing-right">
									 <button type="button" style="width:100%;" class="btn btn-primary">Submit</button>

                             </div>

                          </div>


                                <tr width="100%">
                                   <th width="75%">
                                      <p><b>A: Please Rate the following (Encircle from 1 to 5):-
                                         (1 = Entirely Satisfied , 2 = Satisfied, 3 = Neutral, 4 = Unsatisfied, 5 = Entirely Unsatisfied)</b>
                                      </p>
                                   </th >
                                   <th width="5%">Entirely Satisfied</th>
                                   <th width="5%"> Satisfied</th>
                                   <th width="5%">Neutral</th>
                                   <th width="5%">Unsatisfied</th>
                                   <th width="5%">Entirely Unsatisfied</th>
                                </tr>
                             </thead>
                             <tbody>
                                <tr width="100%">
                                   <td width="75%">1. Punctuality and Attendance of Guards</td>
                                   <td width="5%"><input type="radio" name="q1" value="1"></td>
                                   <td width="5%"><input type="radio" name="q1" value="2"></td>
                                   <td width="5%"><input type="radio" name="q1" value="3"></td>
                                   <td width="5%"><input type="radio" name="q1" value="4"></td>
                                   <td width="5%"><input type="radio" name="q1" value="5"></td>
                                </tr>
                                <tr width="100%">
                                   <td width="75%">2.Discipline, Behavior & Character of Guards</td>
                                   <td width="5%"><input type="radio" name="q2" value="1"></td>
                                   <td width="5%"><input type="radio" name="q2" value="2"></td>
                                   <td width="5%"><input type="radio" name="q2" value="3"></td>
                                   <td width="5%"><input type="radio" name="q2" value="4"></td>
                                   <td width="5%"><input type="radio" name="q2" value="5"></td>
                                </tr>
                                <tr width="100%">
                                   <td width="75%">3. Smart Turnout of the Guards (Uniform)</td>
                                   <td width="5%"><input type="radio" name="q3" value="1"></td>
                                   <td width="5%"><input type="radio" name="q3" value="2"></td>
                                   <td width="5%"><input type="radio" name="q3" value="3"></td>
                                   <td width="5%"><input type="radio" name="q3" value="4"></td>
                                   <td width="5%"><input type="radio" name="q3" value="5"></td>
                                </tr>
                                <tr width="100%">
                                   <td width="75%">4.Working Condition of Weapons & Security Equipments</td>
                                   <td width="5%"><input type="radio" name="q4" value="1"></td>
                                   <td width="5%"><input type="radio" name="q4" value="2"></td>
                                   <td width="5%"><input type="radio" name="q4" value="3"></td>
                                   <td width="5%"><input type="radio" name="q4" value="4"></td>
                                   <td width="5%"><input type="radio" name="q4" value="5"></td>
                                </tr>
                                <tr width="100%">
                                   <td width="75%">5. Our Abidance regarding Taxes (Income Tax & Sales Tax)</td>
                                   <td width="5%"><input type="radio" name="q5" value="1"></td>
                                   <td width="5%"><input type="radio" name="q5" value="2"></td>
                                   <td width="5%"><input type="radio" name="q5" value="3"></td>
                                   <td width="5%"><input type="radio" name="q5" value="4"></td>
                                   <td width="5%"><input type="radio" name="q5" value="5"></td>
                                </tr>
                                <tr width="100%">
                                   <td width="75%">6. Our Compliance wrt EOBI, Social Security & GLI of Guards</td>
                                   <td width="5%"><input type="radio" name="q6" value="1"></td>
                                   <td width="5%"><input type="radio" name="q6" value="2"></td>
                                   <td width="5%"><input type="radio" name="q6" value="3"></td>
                                   <td width="5%"><input type="radio" name="q6" value="4"></td>
                                   <td width="5%"><input type="radio" name="q6" value="5"></td>
                                </tr>
                                <tr width="100%">
                                   <td width="75%">7. Timely Provision of Invoices & Guards Payroll Management</td>
                                   <td width="5%"><input type="radio" name="q7" value="1"></td>
                                   <td width="5%"><input type="radio" name="q7" value="2"></td>
                                   <td width="5%"><input type="radio" name="q7" value="3"></td>
                                   <td width="5%"><input type="radio" name="q7" value="4"></td>
                                   <td width="5%"><input type="radio" name="q7" value="5"></td>
                                </tr>
                                <tr width="100%">
                                   <td width="75%">8. Level of Training of Guards</td>
                                   <td width="5%"><input type="radio" name="q8" value="1"></td>
                                   <td width="5%"><input type="radio" name="q8" value="2"></td>
                                   <td width="5%"><input type="radio" name="q8" value="3"></td>
                                   <td width="5%"><input type="radio" name="q8" value="4"></td>
                                   <td width="5%"><input type="radio" name="q8" value="5"></td>
                                </tr>
                                <tr width="100%">
                                   <td width="75%">9. Level of Supervisory Staff Visiting the Guards</td>
                                   <td width="5%"><input type="radio" name="q9" value="1"></td>
                                   <td width="5%"><input type="radio" name="q9" value="2"></td>
                                   <td width="5%"><input type="radio" name="q9" value="3"></td>
                                   <td width="5%"><input type="radio" name="q9" value="4"></td>
                                   <td width="5%"><input type="radio" name="q9" value="5"></td>
                                </tr>
                                <tr width="100%">
                                   <td width="75%">10. PIFFERS Mgmt Approach & Behavior towards Customer Service</td>
                                   <td width="5%"><input type="radio" name="q10" value="1"></td>
                                   <td width="5%"><input type="radio" name="q10" value="2"></td>
                                   <td width="5%"><input type="radio" name="q10" value="3"></td>
                                   <td width="5%"><input type="radio" name="q10" value="4"></td>
                                   <td width="5%"><input type="radio" name="q10" value="5"></td>
                                </tr>
                             </tbody>
                          </table>
                       </div>

                      </div>

                       <div class="row">
                          <p><b></b>B: Would you please, like to refer us any other Company / Organization?</b></p>
                          <div class="col-lg-7">
                             <div class="row mb-2">
                                <div class="col-lg-11 spacing-right">
                                   Company Name:  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-11 spacing-right">
                                   POC Name: <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-11 spacing-right">
                                   Suggestions / Comments:<br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-11 spacing-right">
                                   Feedback Form Filled By:<br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>

                             </div>
                          </div>

                          <div class="col-lg-5">
                             <div class="row mb-2">

                                <div class="col-lg-11 spacing-left spacing-right">
                                   Email: <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-11 spacing-left spacing-right">
                                   Telephone:  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-11 spacing-left spacing-right">
                                   Signature & Date:  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>

                             </div>

                          </div>
                          </div>





                       <div class="row">
                          <p>To Be Filled by PIFFERS SECURITY SERVICES (PVT) LTD</p>
                                <div class="col-lg-11 spacing-right">
                                   Feedback Form Received By:  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-11 spacing-right">
                                   Remarks: <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>

                             </div>


                       <div class="row">
                                <div class="col-lg-11 spacing-right">
                                   Attachments:  <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-11 spacing-right">
                                   <div class="image-preview7" id="imagePreview7">
                                      <img src="" alt="Image Preview7" class="image-preview__image7">
                                      <span class="image-preview__default-text7"> Image Preview </span>
                                   </div>
                                </div>

                       </div>

                    </div>




                  <!--monthly performance-->
                  <div class="tab-pane fade m-3" style="opacity: 90%;" id="address-details" role="tabpanel" aria-labelledby="nav-profile-tab">
                 <!--Tabs forDetails-->
               <div class="row">
              <nav>
                <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#address-info" role="tab" aria-controls="nav-home" aria-selected="true">Customer
                    Care</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#leads-info" role="tab" aria-controls="nav-profile" aria-selected="false">Hedonistic
                    Approach</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#attachements" role="tab" aria-controls="nav-contact" aria-selected="false">Screening
                    &
                    Hiring
                    Protocols</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#basic-info" role="tab" aria-controls="nav-contact" aria-selected="false">Smart
                  Turnout</a>
                  <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#summary" role="tab" aria-controls="nav-home" aria-selected="true">State of the
                    Art
                    Weapons</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#site-id" role="tab" aria-controls="nav-profile" aria-selected="false">Periodical
                    Trainings</a>
                   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="nav-contact" aria-selected="false">Operational
                    Excellence</a>
                  <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#rfq-pipelines" role="tab" aria-controls="nav-contact" aria-selected="false">RFQ Pipeline</a>
                  <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#sales-pipeline" role="tab" aria-controls="nav-home" aria-selected="true">Sales Pipeline</a> -->
                </div>
              </nav>
                <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">

                <!--Customer Care-->
                <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="address-info" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-lg-6 spacing-right">

                              <div class="row mb-2">
                                    <div class="col-lg-11 spacing-right">
                                      Feedback Form  <br>
                                       <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                        <option value="hrm_guard">Soft via Email</option>
                                        <option value="hrm_staff">Hard - Sent with
                                          Invoices</option>
                                      </select>
                                    </div>

                          </div>
                         </div>
                        <div class="col-lg-6 spacing-right">
                            <div class="row mb-1">
                                <div class="col-lg-10 spacing-right">
                                  Visits of PIFFERS Officials  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>

                    </div>


                  </div>


                </div>

                <!--Hedonistic Approach-->
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="leads-info" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <div class="row">
                        <div class="col-lg- spacing-right">
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                      Incidents at Site  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5  spacing-left spacing-right">
                                      Incidents at Surroundings  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-11  spacing-right">
                                      LEAS at Surroundings  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>


                        </div>

                    </div>


                </div>

                <!--Screening & Hiring Protocols-->
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="attachements" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="row">
                                <div class="col-lg-10">
                                  Hiring Form  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-10">
                                  NADRA & DPO Verification  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-10">
                                  Reference Verification  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>

                    </div>
                    <div class="col-lg-6 spacing-right">
                      <div class="row">
                          <div class="col-lg-10">
                            Discharge Book  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-10">
                            Experience Certificate  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-10">
                            COVID-19 Vaccination  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                          </div>
                      </div>

              </div>
                </div>
                </div>

                 <!--Smart Turnout-->
              <div class="tab-pane fade m-3" style="opacity: 90%;" id="basic-info" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-lg-10 spacing-right">
                                <div class="row mb-2">
                                    <div class="col-lg-10 spacing-right">
                                      Weekly Surprise
                                      Checks  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>

                        </div>

                    </div>
                </div>

                <!--State of the Art Weapons-->
                <div class="tab-pane fade show m-3" style="opacity: 90%;" id="summary" role="tabpanel" aria-labelledby="nav-home-tab">
                     <div class="row">
                        <div class="col-lg-11 spacing-right">
                            <div class="row mb-2">
                                <div class="col-lg-10">
                                  Weapon Functioning Details  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>

                    </div>
                    </div>
                </div>

                 <!--Periodical Trainings-->
                  <div class="tab-pane fade m-3" style="opacity: 90%;" id="site-id" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row mb-1">
                        <div class="col-lg-5 spacing-left">
                          Live Fire Arm <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                          Refresher Courses <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <!-- <div class="col-lg-5 ">
                            Parent Customer  <br>
                            <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                                <option value="Customer 1">Customer 1</option>
                                <option value="Customer 2">Customer 2</option>
                                <option value="Customer 3">Customer 3</option>
                            </select>
                        </div> -->
                    </div>
                </div>
                  <!--Operational Excellence-->
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="accounts" role="tabpanel" aria-labelledby="nav-contact-tab">
                  <div class="row mb-1">
                      <div class="col-lg-5 spacing-left">
                        Operations (Client's Site Wise Details) <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                      </div>

                       <div class="col-lg-5 ">
                        Finance  <br>
                          <select id="hrm_type" class="input_field" name="hrmType" style="width: 100%;">
                              <option value=Invoices">Invoices</option>
                              <option value="Payroll">Payroll</option>
                              <option value="Social Security">Social Security</option>
                              <option value="Sales Tax">Sales Tax</option>
                              <option value="Recovery Ledger">Recovery Ledger</option>
                          </select>
                      </div>
                  </div>
              </div>

                 <!--Operational Excellence-->
                 <!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="accounts" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-lg-6 spacing-right">

                        </div>
                        <div class="col-lg-6 spacing-right">

                        </div>
                    </div>
                </div> -->

                 <!--rfq-pipelines-->
                 <!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="rfq-pipelines" role="tabpanel" aria-labelledby="nav-contact-tab">

                </div>  -->

                 <!--sales-pipeline-->
                  <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-pipeline" role="tabpanel" aria-labelledby="nav-contact-tab">


                </div>

            </div>
            </div>
                  </div>



                   <!--give a ways-->
                   <div class="tab-pane fade m-3" style="opacity: 90%;" id="biometric-record" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                      <div class="col-lg-6 spacing-right">
                          <div class="row mb-2">
                              <div class="col-lg-6 spacing-left spacing-right">
                                Category <br>
                                <select id="catagory" class="input_field mt-1" name="catagory[]" style="width: 100%;">
                                 <option value="Dropdown1">Category1</option>
                                 <option value="Dropdown2">Category2</option>
                                 <option value="Dropdown3">Category3</option>
                               </select>
                             </div>
                             <div class="form-type col-lg-5 spacing-right">
                              Quantity  <br>  <input class="input_field" type="text" id="Serial" name="quantity[]" placeholder="..." style="width: 100%;">
                            </div>

                          </div>



                      </div>
                      <div class="col-lg-6 spacing-left">
                          <div class="row mb-3">
                              <div class="form-type col-lg-6 spacing-right">
                                Estimated price<br>  <input class="input_field" id="shift_start_date" name=" estimated_price[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="form-type col-lg-5 spacing-right">
                                Date <br>  <input class="input_field" id="shift_end_date" name="date[]" type="date" placeholder="..." style="width: 100%;">
                            </div>
                          </div>

                      </div>
                      <div class="col-lg-2 spacing-left my-5">
                          <button type="button" class="add-more-btn" onclick="give_a_ways()">Add More</button>
                      </div>

                      <div id="give_a_ways">

                      </div>


                  </div>
                  </div>

                   <!--sale planning-->
                   <div class="tab-pane fade m-3" style="opacity: 90%;" id="health-status" role="tabpanel" aria-labelledby="nav-contact-tab">


                     <div class="row">
              <nav>
                <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#sales-letters" role="tab" aria-controls="nav-home" aria-selected="true">Sales Letters</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#sales-calls" role="tab" aria-controls="nav-profile" aria-selected="false">Sales Calls</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#sales-email" role="tab" aria-controls="nav-contact" aria-selected="false">Sales Emails</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#sales-message" role="tab" aria-controls="nav-contact" aria-selected="false">Sales Messages</a>
                  <!-- <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#summary" role="tab" aria-controls="nav-home" aria-selected="true">State of the
                    Art
                    Weapons</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#site-id" role="tab" aria-controls="nav-profile" aria-selected="false">Periodical
                    Trainings</a>
                   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="nav-contact" aria-selected="false">Operational
                    Excellence</a>  -->
                  <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#rfq-pipelines" role="tab" aria-controls="nav-contact" aria-selected="false">RFQ Pipeline</a>
                  <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#sales-pipeline" role="tab" aria-controls="nav-home" aria-selected="true">Sales Pipeline</a> -->
                </div>
              </nav>
                <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">

                <!--Sales letters-->
                <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="sales-letters" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-lg-6 spacing-right">

                              <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                  Activity#  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                  Activity Date  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
                                </div>

                          </div>
                         </div>
                        <div class="col-lg-6 spacing-right">
                            <div class="row mb-1">
                              <div class="col-lg-6 spacing-right">
                                Employee Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-right">
                               Cell  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-11 spacing-right">
                               Email  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                               </div>
                            </div>

                    </div>


                  </div>
                  <div class="row">
                    <nav>
                      <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#sales-letter1" role="tab" aria-controls="nav-home" aria-selected="true">Date Sales Letters</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#sales-letter2" role="tab" aria-controls="nav-profile" aria-selected="false">Promotional Material</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#sales-letter3" role="tab" aria-controls="nav-contact" aria-selected="false">Follow Up</a>
                      <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#sales-letter4" role="tab" aria-controls="nav-contact" aria-selected="false">Sales Messages</a>  -->
                        <!-- <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#summary" role="tab" aria-controls="nav-home" aria-selected="true">State of the
                          Art
                          Weapons</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#site-id" role="tab" aria-controls="nav-profile" aria-selected="false">Periodical
                          Trainings</a>
                         <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="nav-contact" aria-selected="false">Operational
                          Excellence</a>  -->
                        <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#rfq-pipelines" role="tab" aria-controls="nav-contact" aria-selected="false">RFQ Pipeline</a>
                        <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#sales-pipeline" role="tab" aria-controls="nav-home" aria-selected="true">Sales Pipeline</a> -->
                      </div>
                    </nav>
                      <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">

                      <!--date of Sales letters-->
                      <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="sales-letter1" role="tabpanel" aria-labelledby="nav-home-tab">
                          <div class="row">
                              <div class="col-lg-6 spacing-right">

                                    <div class="row mb-2">
                                      <div class="col-lg-6 spacing-right">
                                        Serial #  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-5 spacing-right">
                                       Name  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                      </div>

                                </div>
                               </div>
                              <div class="col-lg-6 spacing-right">
                                  <div class="row mb-1">
                                    <div class="col-lg-11 spacing-right">
                                      Area/City  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                    </div>

                                  </div>

                          </div>


                        </div>


                      </div>

                      <!--promotinal metiral -->
                      <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-letter2" role="tabpanel" aria-labelledby="nav-profile-tab">



                          <div class="row">
                            <div class="col-lg-6 spacing-right">

                                  <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                    profiles  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                      Training  Book  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                    </div>

                              </div>
                             </div>
                            <div class="col-lg-6 spacing-right">
                                <div class="row mb-1">
                                  <div class="col-lg-11 spacing-right">
                                    Guard Hiring File  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                </div>

                        </div>


                      </div>


                      </div>

                      <!--follow up-->
                      <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-letter3" role="tabpanel" aria-labelledby="nav-contact-tab">
                          <!-- <div class="row">
                              <div class="col-lg-6 spacing-right">
                                  <div class="row">
                                      <div class="col-lg-10">
                                        Hiring Form  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-10">
                                        NADRA & DPO Verification  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-10">
                                        Reference Verification  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>

                          </div>
                          <div class="col-lg-6 spacing-right">
                            <div class="row">
                                <div class="col-lg-10">
                                  Discharge Book  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-10">
                                  Experience Certificate  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-10">
                                  COVID-19 Vaccination  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>

                    </div>
                      </div> -->
                      </div>

                       <!--sales mesage-->
                    <!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-letter4" role="tabpanel" aria-labelledby="nav-contact-tab"> -->
                          <!-- <div class="row">
                              <div class="col-lg-10 spacing-right">
                                      <div class="row mb-2">
                                          <div class="col-lg-10 spacing-right">
                                            Weekly Surprise
                                            Checks  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                          </div>
                                      </div>

                              </div>

                          </div> -->
                      <!-- </div>  -->







                  </div>
                  </div>


                </div>

                <!--Sales calls-->
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-calls" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <!-- <div class="row">
                        <div class="col-lg- spacing-right">
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                      Incidents at Site  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5  spacing-left spacing-right">
                                      Incidents at Surroundings  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-11  spacing-right">
                                      LEAS at Surroundings  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>


                        </div>

                    </div> -->


                </div>

                <!--salls email-->
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-email" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <!-- <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="row">
                                <div class="col-lg-10">
                                  Hiring Form  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-10">
                                  NADRA & DPO Verification  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-10">
                                  Reference Verification  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>

                    </div>
                    <div class="col-lg-6 spacing-right">
                      <div class="row">
                          <div class="col-lg-10">
                            Discharge Book  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-10">
                            Experience Certificate  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-10">
                            COVID-19 Vaccination  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                          </div>
                      </div>

              </div>
                </div> -->
                </div>

                 <!--sales mesage-->
              <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-message" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <!-- <div class="row">
                        <div class="col-lg-10 spacing-right">
                                <div class="row mb-2">
                                    <div class="col-lg-10 spacing-right">
                                      Weekly Surprise
                                      Checks  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>

                        </div>

                    </div> -->
                </div>







            </div>
            </div>



                  </div>

                   <!--training-details-->
                   <div class="tab-pane fade m-3" style="opacity: 90%;" id="training-details" role="tabpanel" aria-labelledby="nav-contact-tab">
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="row mb-2">
                                  <div class="col-lg-5 spacing-right">
                                     Date of Training  <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-6 spacing-left spacing-right">
                                      Type of Training <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-11 spacing-right">
                                      Place of Training <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="row mb-2">
                                  <div class="col-lg-5 spacing-left spacing-right">
                                      Organised by  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left spacing-right">
                                      Participated In <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Attachements <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;" multiple>
                                  </div>
                                  <div class="col-lg-5 spacing-left spacing-right">
                                      Notes <br> <textarea id="w3review" class="input_field" name="w3review" rows="4" cols="38">
                                    </textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                   <!--Inventory Bin Card-->
                   <div class="tab-pane fade m-3" style="opacity: 90%;" id="inventory-bin-card" role="tabpanel" aria-labelledby="nav-contact-tab">
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="row mb-2">
                                  <div class="col-lg-11 spacing-right">
                                      Employee Name <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-3 spacing-right">
                                      Bin Card No.  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 spacing-left spacing-right">
                                       Employee No. <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-5 spacing-left spacing-right">
                                      Title/Designation <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="row mb-2">
                                  <div class="col-lg-5 spacing-left spacing-right">
                                      Stock Register No.  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left spacing-right">
                                      Stock Register Page No. <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-5 spacing-left spacing-right">
                                      Others <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;" multiple>
                                  </div>
                                  <div class="col-lg-5 spacing-left spacing-right">
                                      Attachements <br>  <input class="input_field" type="file" placeholder="..." style="width: 100%;" multiple>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-10 spacing-left spacing-right">
                                    Notes <br> <textarea id="w3review" class="input_field" name="w3review" rows="4" cols="56">
                                    </textarea>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>

                </div>

            </form>

      </section>

    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary">RESET</button>
        <button type="button" class="btn btn-primary">Save Changes</button>
      </div>
    </div>
  </div>
</div>




    <script>
        const inpFile1 = document.getElementById("inpFile1");
        const previewContainer1 = document.getElementById("imagePreview1");
        const previewImage1 = previewContainer1.querySelector(".image-preview__image1");
        const previewDefaultText1 = previewContainer1.querySelector(".image-preview__default-text1");

        inpFile1.addEventListener("change", function(){
            const file = this.files[0];

            if(file){
                const reader = new FileReader();

                previewDefaultText1.style.display = "none";
                previewImage1.style.display = "block";

                reader.addEventListener("load", function(){
                    previewImage1.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            }
            else{
                previewDefaultText1.style.display = "null";
                previewImage1.style.display = "null";
                previewImage1.setAttribute("src", "");
            }


        });
    </script>

   <script>
       const inpFile2 = document.getElementById("inpFile2");
       const previewContainer2 = document.getElementById("imagePreview2");
       const previewImage2 = previewContainer2.querySelector(".image-preview__image2");
       const previewDefaultText2 = previewContainer2.querySelector(".image-preview__default-text2");

       inpFile2.addEventListener("change", function(){
           const file = this.files[0];

           if(file){
               const reader = new FileReader();

               previewDefaultText2.style.display = "none";
               previewImage2.style.display = "block";

               reader.addEventListener("load", function(){
                   previewImage2.setAttribute("src", this.result);
               });

               reader.readAsDataURL(file);
           }
           else{
               previewDefaultText2.style.display = "null";
               previewImage2.style.display = "null";
               previewImage2.setAttribute("src", "");
           }


       });
   </script>

<script>
        const inpFile3 = document.getElementById("inpFile3");
        const previewContainer3 = document.getElementById("imagePreview3");
        const previewImage3 = previewContainer3.querySelector(".image-preview__image3");
        const previewDefaultText3 = previewContainer3.querySelector(".image-preview__default-text3");

        inpFile3.addEventListener("change", function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                previewDefaultText3.style.display = "none";
                previewImage3.style.display = "block";

                reader.addEventListener("load", function() {
                    previewImage3.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            } else {
                previewDefaultText3.style.display = "null";
                previewImage3.style.display = "null";
                previewImage3.setAttribute("src", "");
            }


        });
    </script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
