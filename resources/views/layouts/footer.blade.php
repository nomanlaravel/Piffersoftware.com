<!--End for the page content-->
<script>
    (function ($bs) {
        const CLASS_NAME = 'has-child-dropdown-show';
        $bs.Dropdown.prototype.toggle = function (_orginal) {
            return function () {
                document.querySelectorAll('.' + CLASS_NAME).forEach(function (e) {
                    e.classList.remove(CLASS_NAME);
                });
                let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
                for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
                    dd.classList.add(CLASS_NAME);
                }
                return _orginal.call(this);
            }
        }($bs.Dropdown.prototype.toggle);

        document.querySelectorAll('.dropdown').forEach(function (dd) {
            dd.addEventListener('hide.bs.dropdown', function (e) {
                if (this.classList.contains(CLASS_NAME)) {
                    this.classList.remove(CLASS_NAME);
                    e.preventDefault();
                }
                if (e.clickEvent && e.clickEvent.composedPath().some(el => el.classList && el.classList.contains('dropdown-toggle'))) {
                    e.preventDefault();
                }
                e.stopPropagation(); // do not need pop in multi level mode
            });
        });

        // for hover
        function getDropdown(element) {
            return $bs.Dropdown.getInstance(element) || new $bs.Dropdown(element);
        }

        document.querySelectorAll('.dropdown-hover, .dropdown-hover-all .dropdown').forEach(function (dd) {
            dd.addEventListener('mouseenter', function (e) {
                let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
                if (!toggle.classList.contains('show')) {
                    getDropdown(toggle).toggle();
                }
            });
            dd.addEventListener('mouseleave', function (e) {
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

    // Education Add Fields
    var room1 = 1;
    function education_add_fields() {

        room1++;
        var objTo = document.getElementById('education_add_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "first-col removeclass" + room1);
        var rdiv = 'removeclass' + room1;
        divtest.innerHTML = '<div class="row"> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="form-type col-lg-3 spacing-right"> Name of Degree <br> <input class="input_field" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;"> </div> <div class="form-type col-lg-3 spacing-left spacing-right"> Date <br> <input class="input_field" type="date" id="date" name="Date[]" placeholder="..." style="width: 100%;"> </div> <div class="form-type col-lg-5 spacing-left spacing-right"> Picture <br> <input class="input_field" type="file" id="picture" name="Picture[]" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 form-type spacing-right"> Institute Name <br> <input class="input_field" id="institute" name="Institute[]" type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-4 spacing-left"> <div class="row mb-3"> <div class="form-type col-lg-10 spacing-right"> Degree No. <br> <input class="input_field" id="degree" name="Degree[]" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="form-type col-lg-5 spacing-right"> Marks <br> <input class="input_field" type="text" id="marks" name="Marks[]" placeholder="..." style="width: 100%;"> </div> <div class="form-type col-lg-5 spacing-left spacing-right"> Grade <br> <input class="input_field" type="text" id="grade" name="Grade[]" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-2 spacing-left my-5"> <button type="button" class="remove-btn" onclick="education_remove_fields(' + room1 + ')">Remove</button> </div></div>';
        objTo.appendChild(divtest)
    }
    function education_remove_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    //Work Experience Add Fields
    var room2 = 1;
    function work_add_fields() {

        room2++;
        var objTo = document.getElementById('work_add_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "second-col removeclass" + room2);
        var rdiv = 'removeclass' + room2;
        divtest.innerHTML = '<div class="row"> <div class="col-lg-6"><div class="row mb-2"><div class="col-lg-3 spacing-right">Force No  <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-8 spacing-left spacing-right">Force Name <br>  <input class="input_field" type="date" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Joining Rank <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Joining Unit <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right"> Retirement Rank <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Retirement Unit <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-4 spacing-left"><div class="row mb-2"><div class="col-lg-6 spacing-right">Service Tenure <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left"> Others <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right"> Inservice Awards <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left">Attachement <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-2 spacing-left my-5"><button type="button" class="remove-btn" onclick="work_remove_fields(' + room2 + ');">Remove</button></div> </div>';
        objTo.appendChild(divtest)
    }
    function work_remove_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    //Compliance Add Fields
    var room3 = 1;
    function compliance_add_fields() {

        room3++;
        var objTo = document.getElementById('compliance_add_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "Third-col removeclass" + room3);
        var rdiv = 'removeclass' + room2;
        divtest.innerHTML = '<div class="row"><div class="col-lg-10 mt-2"><div class="row mb-2"><div class="col-lg-5 spacing-right">CNIC <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Name <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-5 spacing-right">Father Name <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Relationship <br>  <input class="input_field" type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-2 mt-5"><button type="button" class="remove-btn" onclick="compliance_remove_fields(' + room3 + ')">Remove</button></div></div>';
        objTo.appendChild(divtest)
    }
    function compliance_remove_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    guarantor = 1;
    //Guarantor Add Fields
    var room4 = 1;
    function guarantor_add_fields() {

        room4++;
        var objTo = document.getElementById('guarantor_add_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "Fourth-col removeclass" + room4);
        var rdiv = 'removeclass' + room4;

        guarantor += 1;
        divtest.innerHTML = '<div class="row"> <h5> Guarantor No (' + guarantor + ') </h5> <div class="col-lg-6"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Name <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-6 spacing-left spacing-right"> Father Name <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-4 spacing-right"> Relationship <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-7 spacing-left spacing-right"> CNIC <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 colspan-2 spacing-right"> Address <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Landline <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-5 spacing-left"> Cell No <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10"> Email ID <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-6"> <div class="row mb-2"> <div class="col-lg-4 spacing-right"> Verified by Police <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-7 spacing-left spacing-right"> Name of Police Station <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 spacing-right"> Name of SHO <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 spacing-right"> Address of Police Station <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Verified by VC/UC <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-5 spacing-left"> Name of VC/UC <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10"> Name of Chairman <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10"> Address of VC/UC Office <br> <input class="input_field" type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <center> <button type="button" class="remove-btn" onclick="guarantor_remove_fields(' + room4 + ')"> Remove </button> </center> </div>';
        objTo.appendChild(divtest)
    }
    function guarantor_remove_fields(rid) {
        $('.removeclass' + rid).remove();
        --guarantor;
    }

</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

@stack('js')
@yield('js')
@stack('scripts')
@stack('extended-js')
@stack('extended-css')

</body>

</html>