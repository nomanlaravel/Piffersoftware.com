<div class="tab-pane fade m-3" style="opacity: 90%;" id="rfq-documents" role="tabpanel"
aria-labelledby="nav-contact-tab">
<nav>
   <div class="nav nav-tabs mt-3" id="nav-tab-RFQ" role="tablist">
      <a class="nav-item nav-link active" id="nav-source-rfq-tab" data-toggle="tab" href="#source-rfq"
         role="tab" aria-controls="nav-source-rfq" aria-selected="true">Source RFQ</a>
      <a class="nav-item nav-link" id="nav-bid-security-tab" data-toggle="tab" href="#bid-security"
         role="tab" aria-controls="nav-bid-security" aria-selected="true">Bid Security Record</a>
      <a class="nav-item nav-link" id="nav-survey-checklist-tab" data-toggle="tab"
         href="#survey-checklist" role="tab" aria-controls="nav-survey-checklist"
         aria-selected="true">Survey Checklist</a>
      <a class="nav-item nav-link" id="nav-SOPs-tenders-tab" data-toggle="tab" href="#SOPs-tenders"
         role="tab" aria-controls="nav-SOPs-tenders" aria-selected="true">SOPs For Tendors</a>
      <a class="nav-item nav-link" id="nav-daily-report-tab" data-toggle="tab" href="#daily-report"
         role="tab" aria-controls="nav-daily-report" aria-selected="true">Daily RFQ Report Region
      Wise</a>
   </div>
</nav>
<div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent-rfq">
   <!-- Source RFQ Content -->
   <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="source-rfq" role="tabpanel"
      aria-labelledby="nav-source-rfq-tab">
      <div class="row">
         <div class="col-lg-12 spacing-right">
            <div class="row mb-2">
               <div class="col-lg-4">
                  Source of RFQ:<br>
                  <div class="input-group" style="width: 100%;">
                     <select id="" class="form-control mt-1"  name="srcOfRfq" style="width: 70%; border-radius: 4px 0 0 4px; ">
                        <option value=""></option>
                     </select>
                     <div class="input-group-append" style="width: 30%;">
                        <a>
                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 spacing-right">
                  Supporting of Source of RFQ <br> <input class="form-control" name="supportingRfqAttach" type="file"
                     placeholder="..." style="width: 100%;">
               </div>
               <div class="col-lg-4 spacing-right">
                  RFQ Document <br> <input class="form-control" type="file" name="rfqDocAttach" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class="col-lg-4 spacing-right">
                  Common Services Required <br> <input class="form-control" name="commonSerReq" type="text"
                     placeholder="..." style="width: 100%;">
               </div>
            </div>
            <div class="row mb-2">
               <h5>Fees of Tender Document :</h5>
               <div class="col-lg-4 spacing-right">
                  Amount <br> <input class="form-control" name="amount" type="text" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class="col-lg-4 spacing-right">
                  Instrument No <br> <input class="form-control" name="insNo" type="text" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class="col-lg-4 spacing-right">
                  Name of Bank <br> <input class="form-control" name="bankName" type="text" placeholder="..."
                     style="width: 100%;">
               </div>
            </div>
            <div class="row mb-2">
               <div class="col-lg-3 spacing-right">
                  Screenshot of Documents shared by Prospect <br> <input class="form-control"
                     type="text" name="screenshotDoc" placeholder="..." style="width: 100%;">
               </div>
               <div class="col-lg-3 spacing-right">
                  Date of Publication <br> <input class="form-control" name="pubDate" type="date" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class="col-lg-3 spacing-right">
                  Submission Date <br> <input class="form-control" name="subDate" type="date" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class="col-lg-3 spacing-right">
                  Internal Deadline <br> <input class="form-control" name="internalDeadline" type="date" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class=" mb-2 mt-2 d-flex align-items-center">
                  <div class="form-check form-check-inline spacing-left">
                     <input class="form-check-input" type="checkbox" name="bidMoney" id="bidMoneyCheckbox"
                        value="negative">
                     <label class="form-check-label" for="bidMoneyCheckbox">Bid Money</label>
                  </div>
                  <div class="col-lg-4 spacing-right">
                     Decision <br> <input class="form-control" name="decision" type="text" placeholder="..."
                        style="width: 100%;">
                  </div>
               </div>
               <div id="otherCheckboxesContainer" style="display: none">
                  <div class="mb-2 mt-2 d-flex align-items-center">
                     <div id="crossed">
                        <div class="form-check form-check-inline spacing-left">
                           <input class="form-check-input" name="cheque" type="checkbox"
                              id="crossedChequeCheckbox" value="">
                           <label class="form-check-label" for="crossedChequeCheckbox">Crossed
                           Cheque</label>
                        </div>
                     </div>
                     <div id="pay">
                        <div class="form-check form-check-inline spacing-left">
                           <input class="form-check-input" name="payOrder" type="checkbox" id="payOrderCheckbox"
                              value="">
                           <label class="form-check-label" for="payOrderCheckbox">Pay Order</label>
                        </div>
                     </div>
                     <div id="demand">
                        <div class="form-check form-check-inline spacing-left">
                           <input class="form-check-input" name="demand" type="checkbox" id="demandDraftCheckbox"
                              value="">
                           <label class="form-check-label" for="demandDraftCheckbox">Demand
                           Draft</label>
                        </div>
                     </div>
                     <div id="bank">
                        <div class="form-check form-check-inline spacing-left">
                           <input class="form-check-input" name="guarantee" type="checkbox"
                              id="bankGuaranteeCheckbox" value="">
                           <label class="form-check-label" for="bankGuaranteeCheckbox">Bank
                           Guarantee</label>
                        </div>
                     </div>
                     <div id="insurrance">
                        <div class="form-check form-check-inline spacing-left">
                           <input class="form-check-input" name="insGuan" type="checkbox"
                              id="insuranceGuaranteeCheckbox" value="">
                           <label class="form-check-label"
                              for="insuranceGuaranteeCheckbox">Insurance
                           Guarantee</label>
                        </div>
                     </div>
                     <div id="online">
                        <div class="form-check form-check-inline spacing-left">
                           <input class="form-check-input" name="transfer" type="checkbox"
                              id="insuranceGuaranteeCheckbox" value="">
                           <label class="form-check-label" for="insuranceGuaranteeCheckbox">Online
                           Transfer</label>
                        </div>
                     </div>
                     <div class="col-lg-3 spacing-right">
                        Submission Proof <input class="form-control" name="subProfAttach" type="file" placeholder="..."
                           style="width: 100%;">
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mb-2">
               <h5>Submission Details :</h5>
               <div class="col-lg-4 spacing-right">
                  RFQ submitted By : <br> <input class="form-control" name="rfqSubBy" type="text" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class="col-lg-4 spacing-right">
                  RFQ submitted on : <br> <input class="form-control" name="rfqSubOn" type="date" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class="col-lg-4 spacing-right">
                  RFQ submitted Via : <br> <input class="form-control" name="rfqSubVia" type="text" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class="col-lg-4 spacing-right">
                  Technical Proposal : <br> <input class="form-control" name="tecPro" type="text" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class="col-lg-4 spacing-right">
                  Financial Proposal : <br> <input class="form-control" name="finPro" type="file" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class="col-lg-4 spacing-right">
                  Tender Opening Date : <br> <input class="form-control" name="tenOpn" type="date" placeholder="..."
                     style="width: 100%;">
               </div>
               <div class="col-lg-6 spacing-right">
                  List of Participating Companies with Financials <br> <input class="form-control"
                     type="file" name="listComAttach" placeholder="..." style="width: 100%;">
               </div>
               <div class="mb-2 mt-2 d-flex align-items-center">
                  <div class="form-check form-check-inline spacing-left">
                     <input class="form-check-input" name="byHand" id="byHandSubmittionCheckBox" type="checkbox"
                        value="negative">
                     <label class="form-check-label" for="inlineCheckbox1">By Hand</label>
                  </div>
                  <div class="row" id="byHandSubmittion_form" style="display: none;">
                     <div class="col-lg-4 spacing-right">
                        Time of Submission : <br> <input class="form-control" name="timeSub" type="time"
                           placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-4 spacing-right">
                        Submitted to : <br> <input class="form-control" name="subTo" type="text"
                           placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-4 spacing-right">
                        Scanned Receving Of Submission <input class="form-control" name="scanRecAttach" type="file"
                           placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class=" mb-2 mt-2 d-flex align-items-center">
                  <div class="form-check form-check-inline spacing-left">
                     <input class="form-check-input" id="viaCourierSubmittion_checkBox"
                        type="checkbox" id="inlineCheckbox1" name="viaCourier" value="negative">
                     <label class="form-check-label" for="inlineCheckbox1">Via Courier</label>
                  </div>
                  <div class="row" id="viaCourierSubmittion_form" style="display: none;">
                     <div class="col-lg-6 spacing-right">
                        Name of Courier : <br> <input class="form-control" name="nameOfCourier" type="text"
                           placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right">
                        Time of Dispatching : <br> <input class="form-control" name="timeOfDispatching" type="time"
                           placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class=" mb-2 mt-2 d-flex align-items-center">
                  <div class="form-check form-check-inline spacing-left">
                     <input class="form-check-input" name="viaEmail" id="viaEmailSubmittion_checkBox" type="checkbox"
                        id="inlineCheckbox1" value="negative">
                     <label class="form-check-label" for="inlineCheckbox1">Via Email</label>
                  </div>
                  <div class="col-lg-4 spacing-right" id="viaEmailSubmittion_form"
                     style="display: none;">
                     Time of Submission : <br> <input class="form-control" name="emailtimeSub" type="time"
                        placeholder="..." style="width: 100%;">
                  </div>
               </div>
            </div>
            <div id="targetDiv" style="display: none;">
               <div class="row mb-2">
                  <div class="col-lg-4 spacing-right">
                     Amount <br> <input class="form-control" type="text" placeholder="..."
                        style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-right">
                     Instrument No. <br> <input class="form-control" id="inpFile3" type="text"
                        placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-right">
                     Name of Bank <br> <input class="form-control" id="inpFile4" type="text"
                        placeholder="..." style="width: 100%;">
                  </div>
               </div>
               <div class="row mb-2">
                  <div class="form-check form-check-inline spacing-left">
                     <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                        value="negative">
                     <label class="form-check-label" for="inlineCheckbox1"
                        style="margin-right: 20px;">Draft Contract Agreement</label>
                     Attachments <input class="form-control" type="file" placeholder="..."
                        style="width: 30%;">
                  </div>
               </div>
            </div>
            <div class=" mb-2 mt-2 d-flex align-items-center">
               <div class="form-check form-check-inline spacing-left">
                  <input class="form-check-input" type="checkbox" id="grev"
                     onclick="toggleGrievanceDiv()" name="anyGrev" value="negative">
                  <label class="form-check-label" for="grevCheckbox">Any Greviances</label>
               </div>
            </div>
            <div id="grevCheckbox" style="display:none">
               <div class="row">
                  <div class="col-lg-4 spacing-right">
                     Greviance Related to : <br> <input class="form-control" name="grevRelated" type="text"
                        placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-right">
                     Greviance Attachment: <br> <input class="form-control" name="grevAttach" type="file"
                        placeholder="..." style="width: 100%;">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Source RFQ End -->
   <!-- Bid Security Record -->
   <div class="tab-pane fade show  m-3" style="opacity: 90%;" id="bid-security" role="tabpanel"
      aria-labelledby="nav-bid-security-tab">
      <div class="row">
         <div class="col-lg-4 spacing-right">
            Date: <br> <input class="form-control" type="date" name="bidDate" placeholder="..." style="width: 100%;">
         </div>
         <div class="col-lg-4 spacing-right">
            Company Name: <br> <input class="form-control" name="companyName" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-4 spacing-right">
            In Favor of: <br> <input class="form-control" name="inFavourOf" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-4 spacing-right mt-1">
            Bid Security Amount: <br> <input class="form-control" name="bidAmount" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-4 spacing-right mt-1">
            Type: <br> <input class="form-control" type="text" name="bidType" placeholder="..." style="width: 100%;">
         </div>
         <div class="col-lg-4 spacing-right mt-1">
            Bank Name: <br> <input class="form-control" name="bidBankName" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-4 spacing-right mt-1">
            Instrument No: <br> <input class="form-control" name="bidInsNo" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-4 spacing-right mt-1">
            Received: <br> <input class="form-control" name="bidReceived" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-4 spacing-right mt-1">
            Remarks: <br> <input class="form-control" name="bidRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-4 spacing-right mt-1">
            Notes <br>
            <textarea style="width: 100%;" name="bidNotes" id="" cols="15" rows="4"></textarea>
         </div>
         <div class="col-lg-4 spacing-right mt-1">
            Attachments: <br> <input class="form-control" name="bidAttach" type="file" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
   </div>
   <!--  Bid Security Record End -->
   <!--  Bid Survey Checklist  -->
   <div class="tab-pane fade show  m-3" style="opacity: 90%;" id="survey-checklist" role="tabpanel"
      aria-labelledby="nav-survey-checklist-tab">
      <div class="col-lg-4 spacing-right">
         Location/Client Name: <br> <input class="form-control" name="location" type="text" placeholder="..."
            style="width: 100%;">
      </div>
      <h5 class="mt-2">1. Security Company deployed?</h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            Response: <br> <input class="form-control" name="scdResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right">
            Remarks: <br> <input class="form-control" name="scdRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">2. Duty Hours?</h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            Response: <br> <input class="form-control" name="dhResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right">
            Remarks: <br> <input class="form-control" name="dhRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">3. Security Incharge Details?</h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6>a) Rank?</h6>
            </div>
            Response: <br> <input class="form-control" name="sidRankResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="sidRankRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <!-- <div class="row">
         <div class="col-lg-6  spacing-right">
         <div class="row row-cols-2 m-0">
         <div class="col pr-50" style="max-width:max-content;">
         a) Rank?
         Response:
         </div>
         <div class="col p-0">  <input class="form-control" type="text" placeholder="..."  >
         </div>
         </div>
         </div>
         <div class="col-lg-6 p-0 spacing-right">
         <div class="row row-cols-2">
         <div class="col" style="max-width:max-content;">
         Remarks:
         </div>
         <div class="col p-0">  <input class="form-control" type="text" placeholder="..."  >
         </div>
         </div>
         </div>
         </div> -->
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6>b) Salary?</h6>
            </div>
            Response: <br> <input class="form-control" name="sidSalaryResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="sidSalaryRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6>c) Monthly Leaves?</h6>
            </div>
            Response: <br> <input class="form-control" name="sidMonthlyResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="sidMonthlyRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6>d) EOBI & Social Security?</h6>
            </div>
            Response: <br> <input class="form-control" name="sidEOBIResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="sidEOBIRankRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6>d) Social Security Card?</h6>
            </div>
            Response: <br> <input class="form-control" name="sidSocialResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="sidSocialRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">4. Number of Security in charge deployed?</h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            Response: <br> <input class="form-control" name="securityinChargeResponse"  type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right">
            Remarks: <br> <input class="form-control" name="securityinChargeRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">5. Security Supervisor Details?</h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div>
               <h6>a) Rank? </h6>
            </div>
            Response: <br> <input class="form-control" name="ssdRankResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:18px;">
            Remarks: <br> <input class="form-control" name="ssdRankRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> b) Salary?</h6>
            </div>
            Response: <br> <input class="form-control" name="ssdSalaryResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="ssdSalaryRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6>c) Monthly Leaves?</h6>
            </div>
            Response: <br> <input class="form-control" name="ssdMonthlyResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="ssdMonthlyRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> d) EOBI & Social Security?</h6>
            </div>
            Response: <br> <input class="form-control" name="ssdEOBIResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="ssdEOBIRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6>e) Social Security Card?</h6>
            </div>
            Response: <br> <input class="form-control" name="ssdSocialResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="ssdSocialRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">6. Number of Security Supervoisers deployed?</h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            Response: <br> <input class="form-control" name="nssdResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right">
            Remarks: <br> <input class="form-control" name="nssdRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">7. Security Guard Civil Details?</h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> a) Salary?</h6>
            </div>
            Response: <br> <input class="form-control" name="sgcdSalaryResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="sgcdSalaryRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6>b) Monthly Leaves?</h6>
            </div>
            Response: <br> <input class="form-control" name="sgcdMonthlyResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="sgcdMonthlyRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> c) EOBI & Social Security?</h6>
            </div>
            Response: <br> <input class="form-control" name="sgcdEOBIResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="sgcdEOBIRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> d) Social Security Card?</h6>
            </div>
            Response: <br> <input class="form-control" name="sgcdSocialResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="sgcdSocialRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">8. Number of Civil Guards?</h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            Response: <br> <input class="form-control" name="nocgResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right">
            Remarks: <br> <input class="form-control" name="nocgRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">9. Number of Ex-Army Guards?</h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            Response: <br> <input class="form-control" name="noegResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right">
            Remarks: <br> <input class="form-control" name="noegRemarks"  type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">10. Food for security staff?</h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> a) Free of cost by client?</h6>
            </div>
            Response: <br> <input class="form-control" name="ffssFreeResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="ffssFreeRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6>b) Or any charges per month?</h6>
            </div>
            Response: <br> <input class="form-control" name="ffssCostResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="ffssCostRemarks"  type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> c) All time food avaliable
                  or duty time only?
               </h6>
            </div>
            Response: <br> <input class="form-control" name="ffssFoodResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="ffssFoodRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">11. Accomodation by client or Security
         Company?
      </h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> a) If by Security Company,
                  what is the rent?
               </h6>
            </div>
            Response: <br> <input class="form-control" name="abcResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="abcRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">12. Patrolling Vehicle</h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> a) Bike?</h6>
            </div>
            Response: <br> <input class="form-control" name="abcBikeResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="abcBikeRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6>b) Or 4x wheeler?</h6>
            </div>
            Response: <br> <input class="form-control" name="abcFourResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="abcFourRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> c) Which Vehicle?</h6>
            </div>
            Response: <br> <input class="form-control" name="abcVehicleResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="abcVehicleRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> d) How many rounds per day?</h6>
            </div>
            Response: <br> <input class="form-control" name="abcRoundsResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="abcRoundsRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> e) Fuel by client/company?</h6>
            </div>
            Response: <br> <input class="form-control" name="abcFuelResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="abcFuelRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> f) Fuel Consumption?</h6>
            </div>
            Response: <br> <input class="form-control" name="abcConsumptionResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right" style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="abcConsumptionRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
      </div>
      <h5 class="mt-2">13. Wireless Equipment if any?
         Quantity? Model?
      </h5>
      <div class="row">
         <div class="col-lg-6 spacing-right">
            <div class="mt-2">
               <h6> a) Visit Conducted by?</h6>
            </div>
            Response: <br> <input class="form-control" name="weResponse" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="col-lg-6 spacing-right " style="margin-top:35px;">
            Remarks: <br> <input class="form-control" name="weRemarks" type="text" placeholder="..."
               style="width: 100%;">
         </div>
         <div class="row">
            <div class="col-lg-6 spacing-right mt-2">
               Notes: <br> <textarea class="form-control" name="checklistNotes" style="width: 100%;" name="" id="" cols="15"
                  rows="4"></textarea>
            </div>
            <div class="col-lg-6 spacing-right" style="margin-top:26px;">
               Attachements: <br> <input class="form-control" name="checklistAttach" type="text" placeholder="..."
                  style="width: 100%;">
            </div>
         </div>
      </div>
      <!--  Bid Survey Checklist End -->
   </div>
   <!-- SOPs for tenders -->
   <div class="tab-pane fade show  m-3" style="opacity: 90%;" id="SOPs-tenders" role="tabpanel"
      aria-labelledby="nav-SOPs-tenders-tab">
      <div class="col-lg-12">
         <table class="table table-bordered">
            <thead>
               <tr width="100%" class="text-center">
                  <th width="5%">Sr</th>
                  <th width="45%">Task</th>
                  <th width="25%">Timeline</th>
                  <th width="25%">Remarks</th>
               </tr>
            </thead>
            <tbody>
               <tr width="100%">
                  <td width="5%">1</td>
                  <td width="45%">Maintain Log Book with following details <br>
                     - Document purchase Fee <br>
                     - Pre-bid Meeting <br>
                     - Bid security <br>
                     - Number of guards <br>
                     - Region <br>
                     - Submission deadline <br>
                     - Opening date <br>
                  </td>
                  <td width="25%">Same day of receiving ad</td>
                  <td width="25%"><input name="rem" /></td>
               </tr>
               <tr width="100%">
                  <td width="5%">2</td>
                  <td width="45%">Collect documents</td>
                  <td width="25%">Within 2 days of ad</td>
                  <td width="25%"><input name="rem1" /></td>
               </tr>
               <tr width="100%">
                  <td width="5%">3</td>
                  <td width="45%">Send email for Bid Security to finance</td>
                  <td width="45%">Same day of receiving documents</td>
                  <td width="25%"><input name="rem2"  /></td>
               </tr>
               <tr width="100%">
                  <td width="5%">4</td>
                  <td width="45%">Pre-bid Meeting <br>
                     - Inform concerned person to visit <br>
                     - Share and brief tender docs to discuss points
                  </td>
                  <td width="25%">01 day before pre-bid</td>
                  <td width="25%"><input  name="rem3" /></td>
               </tr>
               <tr width="100%">
                  <td width="5%">5</td>
                  <td width="45%">Site survey </td>
                  <td width="25%">Atleast 4x days before submission</td>
                  <td width="25%"><input name="rem4" /></td>
               </tr>
               <tr width="100%">
                  <td width="5%">6</td>
                  <td width="45%">Tender Working <br>
                     - Technical proposal completion
                  </td>
                  <td width="25%">4x days before tender deadline</td>
                  <td width="25%"><input name="rem5" /></td>
               </tr>
               <tr width="100%">
                  <td width="5%">7</td>
                  <td width="45%">Financial proposal and submission </td>
                  <td width="25%">3x days before deadline</td>
                  <td width="25%"><input name="rem6" /></td>
               </tr>
               <tr width="100%">
                  <td width="5%">8</td>
                  <td width="45%">Bid security log </td>
                  <td width="25%">Record the same day of preparation <br>
                     Update Finance team two a week
                  </td>
                  <td width="25%"><input name="rem7" /></td>
               </tr>
               <tr width="100%">
                  <td width="5%">9</td>
                  <td width="45%">Opening Report <br>
                     - Make comparison sheet and share in group
                  </td>
                  <td width="25%">Same day of opening</td>
                  <td width="25%"><input name="rem8" /></td>
               </tr>
               <tr width="100%">
                  <td width="5%">10</td>
                  <td width="45%">Grievance letter </td>
                  <td width="25%">As per direction from management</td>
                  <td width="25%"><input name="rem9" /></td>
               </tr>
               <tr width="100%">
                  <td width="5%">11</td>
                  <td width="45%">Return of bid security</td>
                  <td width="25%">Max after 10 days of opening/ 7 days after evaluation report</td>
                  <td width="25%"><input name="rem10" /></td>
               </tr>
            </tbody>
         </table>
         <div class="container mt-3">
            <div class="row">
               <div class="col-md-12 text-right">
                  <label for="excelFile" class="btn btn-success">Upload Excel Sheet</label>
                  <input type="file" id="excelFile" accept=".xls, .xlsx" style="display: none;" />
               </div>
            </div>
         </div>
         <div id="excelDataTableContent" class="table-responsive">
            <table id="excelDataTable" class="table table-bordered border-primary table-hover">
               <!-- Table content will be dynamically inserted here -->
            </table>
         </div>
      </div>
   </div>
   <!-- SOPs for tenders end -->
   <!-- Daily RFQ Reports -->
   <div class="tab-pane fade show  m-3" style="opacity: 90%;" id="daily-report" role="tabpanel"
      aria-labelledby="daily-report-tab">
      <div class="row">
         <div class="container  my-1" id="armourContainer" >
            <div class="accordion" id="armourAccordion" >
               <!-- Initial Accordion Item -->
               <div class="accordion-item armouraccordion-item" id="armourEntry1">
                  <h2 class="accordion-header" id="armourHeading1" style="color: white">
                     <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#armourCollapse1" aria-expanded="false" aria-controls="armourCollapse1">
                     RFQ Report 1
                     </button>
                  </h2>
                  <div id="armourCollapse1" class="collapse" aria-labelledby="armourHeading1">
                     <div class="accordion-body">
                        <div id="cleaningInfo" class="row">
                           <div class="col-lg-4 spacing-right">
                              Date: <br> <input class="form-control" type="date" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right">
                              Report Uploaded By (Name): <br> <input class="form-control" type="text" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right">
                              Report Uploaded By (Number): <br> <input class="form-control" type="text" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Report Uploaded By (Email): <br> <input class="form-control" type="email" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Office ID: <br> <input class="form-control" type="text" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Department ID: <br> <input class="form-control" type="text" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Reporting Person Name: <br> <input class="form-control" type="text" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Reporting Person Number: <br> <input class="form-control" type="text" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Reporting Person Email: <br> <input class="form-control" type="email" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Region Name: <br> <input class="form-control" type="text" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Region Code: <br> <input class="form-control" type="text" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              GM: <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              DGM: <br> <input class="form-control" type="email" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              CRO: <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Client/ Location Visited: <br> <input class="form-control" type="text" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Response By: <br> <input class="form-control" type="text" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Opening Date: <br> <input class="form-control" type="date" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Status: <br> <input class="form-control" type="email" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Remarks: <br> <input class="form-control" type="email" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Notes <br>
                              <textarea class="form-control" style="width: 100%;"  id="" cols="15"
                                 rows="4"></textarea>
                           </div>
                           <div class="col-lg-4 spacing-right mt-2">
                              Attachements: <br> <input class="form-control" type="file" placeholder="..."
                                 style="width: 100%;">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Add More and Remove Buttons -->
            <div class="row my-3">
               <div class="col">
                  <button type="button" class="btn btn-primary" id="addArmour" style="height:30px; width:150px;">Add More RFQ</button>
               </div>
               <button type="button" class="btn btn-primary" id="updateArmourTable" style="height:30px; width:150px;">Save</button>
            </div>
         </div>
         <table class="table table-bordered mt-3" id="armourSummaryTable">
            <thead>
               <tr>
                  <th>Entry</th>
                  <th>Branch Name</th>
                  <th>Branch ID</th>
                  <th>Client Name</th>
                  <th>Sign of Customer</th>
                  <th>View</th>
                  <!-- Add more columns as needed -->
               </tr>
            </thead>
            <tbody>
               <!-- Summary data will be added here dynamically -->
            </tbody>
         </table>
      </div>
      <!-- Daily RFQ Reports End -->
   </div>
   <!--sales-pipeline-->
   <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-pipeline" role="tabpanel"
      aria-labelledby="nav-contact-tab">
   </div>
</div>
</div>
