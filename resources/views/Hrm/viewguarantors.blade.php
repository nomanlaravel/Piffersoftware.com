<div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
    <h5>CNIC Front:</h5>
    @if($rental && $rental->plaza_cnic)
    <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
            @if($rental->plaza_cnic)
                @php
                    $attachments = explode(',', $rental->plaza_cnic);
                @endphp
                @foreach ($attachments as $attachment)
                    <div style="padding: 10px;">
                        @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
                            <!-- Display Image -->
                            <img src="{{ asset($attachment) }}" alt="Image Preview"  onclick="showPopup(this)" class="cnicimgs imgclickable" >
                            
                            <div class="popup" style=" display: none;
                                  position: fixed;
                                  top: 50%;
                                  left: 60%;
                                  transform: translate(-50%, -50%);
                                  background-color: white;
                                 
                                  border: 0px solid #E7E7E7;
                                  border-radius:15px;
                                  z-index: 9999;
                                  width: 800px;
                                  background:none !important;
                                  ">
                               <div style="position: relative; display: inline-block;">
                                <img src="{{asset($attachment)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                            </div>
                                <span class="close-btn" style="position: absolute;
                                  top:5px;
                                  right:15px;
                                  cursor: pointer;
                                  font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                        @elseif (Str::endsWith($attachment, ['.pdf']))
                            <!-- Display PDF -->
                            <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach"  />
                            <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download PDF</a>
                        @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
                            <!-- Display Excel Sheet -->
                            <div class="preview-excel" style="text-align: center;">
                                <p>Excel Sheet Name: {{ pathinfo($attachment)['basename'] }}</p>
                                <a href="{{ asset($attachment) }}">Download Excel Sheet</a>
                            </div>
                        @else
                            <span class="preview-default-text">Preview</span>
                        @endif
                    </div>
                @endforeach
            @else
                <span class="preview-default-text">No attachments found</span>
            @endif
        </div>
    </div>
    @else
        <p class="text-center text-secondary">No image available</p>
        @endif
 </div>
</div>



<div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
    <h5>Attachment:</h5>
    @if($rental && $rental->plaza_attach)
    <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
            @if($rental->plaza_attach)
                @php
                    $attachments = explode(',', $rental->plaza_attach);
                @endphp
                @foreach ($attachments as $attachment)
                    <div style="padding: 10px;">
                        @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
                            <!-- Display Image -->
                            <img src="{{ asset($attachment) }}" alt="Image Preview"  onclick="showPopup(this)" class="cnicimgs imgclickable" >
                            
                            <div class="popup" style=" display: none;
                                  position: fixed;
                                  top: 50%;
                                  left: 60%;
                                  transform: translate(-50%, -50%);
                                  background-color: white;
                                 
                                  border: 0px solid #E7E7E7;
                                  border-radius:15px;
                                  z-index: 9999;
                                  width: 800px;
                                  background:none !important;
                                  ">
                               </div>   
                               <div style="position: relative; display: inline-block;">
                                <img src="{{asset($attachment)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                            </div>
                                <span class="close-btn" style="position: absolute;
                                  top:5px;
                                  right:15px;
                                  cursor: pointer;
                                  font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                        @elseif (Str::endsWith($attachment, ['.pdf']))
                            <!-- Display PDF -->
                            <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach"  />
                            <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download PDF</a>
                        @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
                            <!-- Display Excel Sheet -->
                            <div class="preview-excel" style="text-align: center;">
                                <p>Excel Sheet Name: {{ pathinfo($attachment)['basename'] }}</p>
                                <a href="{{ asset($attachment) }}">Download Excel Sheet</a>
                            </div>
                        @else
                            <span class="preview-default-text">Preview</span>
                        @endif              
                    </div>
                 @endforeach         
            @else
                <span class="preview-default-text">No attachments found</span>
            @endif
        </div>  
    </div>
    @else
    <p class="text-center text-secondary">No image available</p>
    @endif
</div>