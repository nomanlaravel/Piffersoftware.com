<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Slip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>
  
<body class="bg-dark text-white">
   
    <div class="container-fluid mt-5" id="payroll-slip">
         <div class="modal-header border-0">
                <div style="display:flex; column-gap:10px; align-items:center">
                    <!--<button type="button" class="btn btn-light"  >-->
                    <!-- <i style="color:red !important;" class="bi bi-arrow-left"></i>-->
                    <!--</button>-->
                    <h5 class="mt-3" style="font-weight: 700;" onclick="history.back()"> Payroll Slip </h5>
                </div>
              </div>
        <div class="card bg-secondary p-4">
           <div class="row mb-2">
               <div class="col-md-4">
                <div>
                <img src="https://software.piffers.net/logo.png" alt="Company Logo" width="100">
                 </div>
               </div>
                 <div class="col-md-4">
                <div>
                    <div  class="card bg-dark">
                       <div class="card-body text-center text-white">
                                <strong>Fiscal Year:</strong> <span id="fiscalYear">{{ \Carbon\Carbon::parse($payroll->created_at)->format('Y') }}</span>
                                <br>
                                <strong>Pay Slip Report:</strong> <span id="currentDate">{{ \Carbon\Carbon::parse($payroll->created_at)->format('d M, Y') }}</span>
                            </div>
                    </div>
                     <h3 class="text-center">
                        Payroll Slip for {{ \Carbon\Carbon::parse($payroll->created_at)->format('M-Y') }}
                    </h3>

                 </div>
               </div>
                 <div class="col-md-4  ">
                <div class="float-end">
                      <div class="image-preview42" id="imagePreview42">
                       @if($payroll->hrm->photo??"")
                          <img src="{{ asset($payroll->hrm->photo??"") }}" alt="Image Preview42" class="image-preview__image42" style="height:200px; width:200px; margin-left:-13px;">
                            @else
                            <span class="image-preview__default-text42">Image Preview</span>
                            @endif
                     </div>
                 </div>
               </div>
           </div>
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-dark table-bordered">
                <tr>
                    <td><strong>Name:</strong></td>
                    <td>{{$payroll->hrm->name??""}}</td>
                    <td><strong>Designation:</strong></td>
                    <td>{{$payroll->hrm->designation??""}}</td>
                    <td><strong>Annual Leaves:</strong></td>
                      <td>
                        @php
                          $pendingLeavesCount = $payroll->where('p_leave_records', '>', 0)->count();
                       @endphp
                    <strong>{{ $pendingLeavesCount > 0 ? $pendingLeavesCount : 'N/A' }}</strong>
                </td>
                </tr>
                   <tr>
                    <td><strong>FatherName:</strong></td>
                    <td>{{$payroll->hrm->fname??""}}</td>
                    <td><strong>D.O.J / D.O.B:</strong></td>
                    <td>{{$payroll->hrm->dob??"1/1/2002"}}</td>
                    <td><strong>Availed Leaves:</strong></td>
                  <td>
                        @php
                          $pendingLeavesCount = $payroll->where('p_leave_records', '>', 0)->count();
                       @endphp
                    <strong>{{ $pendingLeavesCount > 0 ? $pendingLeavesCount : 'N/A' }}</strong>
                </td>
                </tr>
                   <tr>
                    <td><strong>CNIC No:</strong></td>
                    <td>{{$payroll->hrm->cnic??"" }}</td>
                    <td><strong>Contact No.:</strong></td>
                    <td>{{$payroll->hrm->cell??"" }}</td>
                    <td><strong>Pending Leaves</strong></td>   
                  <td>
                        @php
                          $pendingLeavesCount = $payroll->where('p_leave_records', '>', 0)->count();
                       @endphp
                    <strong>{{ $pendingLeavesCount > 0 ? $pendingLeavesCount : 'N/A' }}</strong>
                </td>
                </tr>
                   <tr>
                    <td><strong>Placed at:</strong></td>
                    <td>{{$payroll->hrm->hired_at??"N/A"}}</td> 
                    <td><strong>EOBI Reg #:</strong></td>
                    <td> {{$payroll->hrm->c_eobi??"N/A" }}</td>
                    <td><strong>EOBI Reg City:</strong></td>
                    <td>{{$payroll->hrm->sub_eobi??"N/A"}}</td>
                </tr>
                   <tr>
                    <td><strong>SS Reg #:   </strong></td>
                    <td>{{$payroll->hrm->ss_staff??"N/A"}}</td>
                    <td><strong>SS Reg City:</strong></td> 
                    <td>{{$payroll->hrm->sub_ss??"N/A"}}</td>
                    <td><strong></strong></td>
                    <td></td>
                </tr>
                   <tr>
                    <td><strong>GLI Policy #:</strong></td>
                    <td>{{$payroll->hrm->gli_policy??"N/A"}}</td>
                    <td><strong>GLI Company:</strong></td>
                    <td>{{$payroll->hrm->gli_name??"N/A"}}</td>
                    <td><strong>Sum Assured:</strong></td>
                    <td>{{$payroll->hrm->sum_gli??"N/A"}}</td>
                </tr>
                  <tr>
                    <td><strong>Observation letter:</strong></td>
           <td>
                    @php
                        $observCount = 0;
                
                        if ($payroll->hrm && method_exists($payroll->hrm, 'where')) {
                            $observCount = $payroll->hrm->where('observ_type', 'Observations')->count();
                        }
                    @endphp
                
                    <strong>{{ $observCount > 0 ? $observCount : 'N/A' }}</strong>
                </td>

                
                    <td><strong>Explanation Letter:</strong></td>
                   <td>
                    @php
                        $explanCount = 0;
                
                        if ($payroll->hrm && $payroll->hrm instanceof \Illuminate\Support\Collection) {
                            $explanCount = $payroll->hrm->where('observ_type', 'Explanations')->count();
                        }
                    @endphp
                
                    <strong>{{ $explanCount > 0 ? $explanCount : 'N/A' }}</strong>
                </td>

                
                    <td><strong>Warning letter:</strong></td>
                  @php
                    function getObservCount($hrm, $type) {
                        return ($hrm instanceof \Illuminate\Support\Collection)
                            ? $hrm->where('observ_type', $type)->count()
                            : 0;
                    }
                
                    $warnCount = getObservCount($payroll->hrm ?? null, 'Warnings');
                @endphp
                
                <td>
                    <strong>{{ $warnCount > 0 ? $warnCount : 'N/A' }}</strong>
                </td>

                </tr>

            </table>
                </div>
                <div class="col-md-4 d-flex align-items-end justify-content-center">
                    <h3 style="text-decoration:underline">Details	of	Item</h3>
                </div>
            </div>
             <div class="row">
                  <h5>Bank Details</h5>
                <div class="col-md-8">
                    <table class="table table-dark table-bordered">
                         <tr>
                   <th>Bank Name</th>
                   <th>Account Title</th>
                   <th>Account   Number</th>
                </tr>
                <tr>
                    <td>{{$payroll->hrm->bank?? "Blank" }} </td>
                    <td>{{$payroll->hrm->account_title?? "Blank" }}</td>
                    <td>{{$payroll->hrm->bank_account ?? "Blank"}} </td>
                </tr>
            </table>
                </div>
                <div class="col-md-4 d-flex align-items-end justify-content-center">
                
                </div>
            </div>
            <h5>Earnings & Deductions</h5>
            <div class="row">
                
                <div class="col-md-8">
                    <table class="table table-light table-bordered">
                         <tr>
                   <th>EARNINGS</th>
                   <th>DEDUCTIONS</th>
                </tr>
            </table>
                </div>
                <div class="col-md-4 d-flex align-items-end justify-content-center">
                
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-dark table-bordered">
                <tr>
                    <th>DESCRIPTION</th>
                   <th>AMOUNT</th>
                    <th>DESCRIPTION</th>
                   <th>AMOUNT</th>
                </tr>
                   <tr>
                    <td>Basic Salary:</td>
                    <td>{{$payroll->p_gross_salary??"N/A"}}</td>
                    <td><strong>Advances:</strong></td>
                    <td>{{$payroll->p_advance ?? "Blank"}}</td>
                </tr>
                   <tr>
                    <td><strong>Lunch Allowance:</strong></td>
                    <td>{{$payroll->lunch_allowlance??"N/A"}}</td>
                    <td>Income Tax</td>
                    <td>{{$payroll->income_tax ?? "Blank"}}</td>
                </tr>
                   <tr>
                    <td>EOBI</td>
                    <td> {{$payroll->peobi??"N/A"}}</td>
                    <td>EOBI</td>
                    <td>{{$payroll->peobi??"N/A" }}</td>
                </tr>
                   <tr>
                    <td>Social Security</td>
                    <td>{{$payroll->hrm->ss_staff ?? "Blank"}}</td>
                   
                    <td>.</td>
                    <td></td>
                </tr>
                   <tr>
                    <td>GLI</td>
                    <td>{{$payroll->hrm->gli_name??"N/A"}}</td>
                    <td>Other / Misc</td>
                    <td>{{$payroll->p_misc ?? "Blank"}}</td>
                </tr>
                   <tr>
                    <td>Arrears</td>
                    <td>{{$payroll->hrm->t_area ?? "Blank"}}</td>
                    <td></td>
                    <td></td>
                </tr>
                 <tr>
                    <td>Others</td>
                    <td>{{$payroll->p_others ?? "Blank"}}</td>
               
                    <td></td>
                 
                    <td></td>
                </tr>
                 <tr>
                    <td>Total Earnings</td>
                    <td>{{$payroll->total_earning ?? "Blank"}}</td>
                
                    <td>Total Deductions</td>
                  
                    <td>{{$payroll->p_total_deductions ?? "Blank"}}</td>
                </tr>
                    <tr>
                    <td colspan="3" class="text-end">Net Salary Payable:</td>
                    <td class="bg-white text-dark"><span class="float-end">{{$payroll->p_net_salary??"N/A"}}</span></td>
                </tr>
            </table>
                </div>
                <div class="col-md-4 ">
              <table class="table table-dark table-bordered">
    <thead>
        <tr style="background:white; color:#000">
            <th>SN</th>
            <th>ITEM</th>
            <th>DESCRIPTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach($payroll->items as $index => $item)
        <tr>
            <td>{{ $index + 1 }}.</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->item_dis == 1 ? 'YES' : '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

 </div>
</div>
</div>
    </div>
     <div class="container-fluid mt-2 mb-4 "> 
      <button class="btn  float-end mb-3 "  onclick="printPDF()" id="print-btn">
          <img style="border-radius:10px;" src="https://static.vecteezy.com/system/resources/previews/014/682/957/non_2x/printer-icon-flat-style-vector.jpg" width="50" height="50"> 
      </button>
    </div>
    
    <script>
        function printPDF() {
            document.getElementById("print-btn").style.display = "none";
            html2canvas(document.querySelector("#payroll-slip")).then(canvas => {
                const imgData = canvas.toDataURL("https://software.piffers.net/logo.png");
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF({ orientation: "portrait", unit: "mm", format: "a4" });
                doc.addImage(imgData, "PNG", 10, 10, 190, 0);
                doc.save("payroll-slip.pdf");
                alert('Detail Print successfully')
                document.getElementById("print-btn").style.display = "block";
            });
        }
    </script>
</body>
</html>
