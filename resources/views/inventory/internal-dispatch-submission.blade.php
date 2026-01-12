@include('layouts.header')

@yield('main')

<div class="customer_form ">
    <div id="header-container " class="mt-4 p-2" style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: purple; width:115%; margin-left: -78px; margin-top: -13px;">
        <div id="left-header">
            <h5 style="font-family: 'Poppins', sans-serif; color: white;"><b><i>PIFFERS INVENTORY MANAGEMENT SYSTEM</i></b></h5>
        </div>
        <div id="right-header" class="d-flex">
            <button type="button" class="btn btn-success btn-sm" onclick="document.getElementById('create-lot').click()">Create Lot</button>

               <button class="openbtn" onclick="openNav()">☰</button>
        </div>
    </div>

    <div id="mySidebar" class="sidebar admin-setting">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="{{ route('logout') }}"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>
    <div class="d-flex align-items-center mt-4">
          <button type="button" class="btn btn-link" onclick="history.back()"><i class="bi bi-arrow-left"></i></button>
          <h5 class="mt-3" style="font-weight: 700;">
            Internal Dispatch
            </h5>
        </div>

    <div class="right_portion row col-lg-12 d-flex flex-row position-relative" style="padding: 20px; right: 10%;">
        <!-- Categories -->
        <div class="image-list-left col-lg-3" id="image-list-left">
            @foreach ($categories as $category)
                <div class="uniform-store position-relative category" data-category-id="{{ $category->id }}" style="margin-bottom: 20px;">
                    <img src="{{ asset($category->category_image) }}" alt="Image 1" style="width: 200px; height: 150px; margin-bottom: 20px;">
                    <div class="img-text text-align-center position-absolute" style="top: 45%; left: 14%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <p><a href="#" class="category-link" data-category-id="{{ $category->id }}" style="text-decoration: none; color: black; line-height: 1px;"><b>
                            {{ explode(' ', $category->category_name)[0]??"" }}<br>{{ explode(' ', $category->category_name)[1]??"" }}
                        </b></a></p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Subcategories and Articles -->
        <div class="thumbnail col-lg-2" id="subcategories-container" style="overflow: auto; overflow-x: hidden; height: 493px;">
            <!-- Subcategories will be loaded here -->
        </div>

        <!-- Article Form Container -->
    <div class="col-lg-7" id="article-form-container" style="padding-left: 20px; display: none;">
    <form action="{{route('save_entries')}}" method="POST" enctype="multipart/form-data" id="lot-form">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" class="form-control" id="category" name="category">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Sub Category</label>
                    <input type="text" class="form-control" id="sub_category" name="sub_category">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Article Name</label>
                    <input type="text" class="form-control" id="article_name" name="article_name">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Lot Number</label>
                    <input type="text" class="form-control" id="lot_number" name="lot_number">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Condition</label>
                    <select id="condition" class="form-control mt-1" name="condition">
                        <option value=""></option>
                        <option value="New">New</option>
                        <option value="Used">Used</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" class="form-control" name="date" id="date" >
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                   <label>Recieved Vendor:</label>
                        <select name="lot_id" id="lot_id" class="form-control" >
                            <option value="">Select Recieved Vendor Name</option>
                            @foreach($latestLot as $lot)
                                <option value="{{ $lot->id }}">{{ $lot->article_name }}</option>
                            @endforeach
                        </select>
                </div>
            </div>
                <div class="col-lg-4">
            <div class="form-group">
                <label for="cro_id">Cro</label>
                <select class="form-control" id="cro_id" name="cro_id" >
                    <option value="">-- Select Cro --</option>
                    @foreach($cros as $cro)
                        <option value="{{ $cro->id }}">{{ $cro->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Item Name</label>
                    <input type="text" class="form-control" name="item_name" id="item_name">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Item Code</label>
                    <input type="text" class="form-control" name="item_code" id="item_code">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description"></textarea>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Size</label>
                    <input type="text" class="form-control" id="size" name="size">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Article Number</label>
                    <input type="text" class="form-control" id="article_number" name="article_number">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Price Per Unit</label>
                    <input type="text" class="form-control" id="price_per_unit" name="price_per_unit">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Total Price</label>
                    <input type="text" class="form-control" id="total_price" name="total_price">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Dispatched Through</label>
                    <input type="text" class="form-control" id="dispatch_through" name="dispatch_through">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Tracking ID</label>
                    <input type="text" class="form-control" id="tracking_id" name="tracking_id">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Tracking slip attachment</label>
                    <input type="file" class="form-control" id="tracking_slip_attach" name="tracking_slip_attach">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Dispatcher Name</label>
                    <input type="text" class="form-control" id="dispatcher_name" name="dispatcher_name">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Dispatcher Employee ID</label>
                    <input type="text" class="form-control" id="dispatcher_employee_id" name="dispatcher_employee_id">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Dispatcher Cell No.</label>
                    <input type="text" class="form-control" id="dispatcher_cell_no" name="dispatcher_cell_no">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Receiver Name</label>
                    <input type="text" class="form-control" id="receiver_name" name="receiver_name">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Receiver Employee ID</label>
                    <input type="text" class="form-control" id="receiver_employee_id" name="receiver_employee_id">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Receiver Cell No.</label>
                    <input type="text" class="form-control" id="receiver_cell_no" name="receiver_cell_no">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Notes</label>
                    <textarea type="text" class="form-control" id="notes" name="notes"></textarea>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Attachment</label>
                    <input type="file" class="form-control" id="attachment" name="attachment">
                </div>
            </div>
            <div class="col-lg-12">
                <button type="button" class="btn btn-success btn-sm" id="add-lot-to-summary">Add Lot</button>
                <button type="submit"  class="btn btn-success btn-sm" id="create-lot" style="display:none">Create Lot</button>
            </div>
        </div>

        <input type="hidden" name="summarized_lots" id="summarized-lots-input">
    </form>
</div>


</div>
<div class="container">
    <div class="col-lg-12" id="summary-table-container" style="padding: 20px; display: none;">
    <h5><b><i>All lots   :</i></b> </h5>
    <div class="table-responsive">
        <table class="table table-bordered" id="summary-table">
            <thead>
                <tr>
                    <th>Lot Id</th>
                    <th>Cro ID</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Article Name</th>
                    <th>Lot Number</th>
                    <th>Condition</th>
                    <th>Date</th>
                    <th>Issued To</th>
                    <th>Item Name</th>
                    <th>Item Code</th>
                    <th>Description</th>
                    <th>Size</th>
                    <th>Article Number</th>
                    <th>Quantity</th>
                    <th>Price Per Unit</th>
                    <th>Total Price</th>
                    <th>Dispatched Through</th>
                    <th>Tracking ID</th>
                    <th>Tracking Slip</th>
                    <th>Dispatcher Name</th>
                    <th>Dispatcher Employee ID</th>
                    <th>Dispatcher Cell Number</th>
                    <th>Receiver Name</th>
                    <th>Receiver Employee ID</th>
                    <th>Receiver Cell Number</th>
                    <th>Notes</th>
                    <th>Attachment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                </tbody>
        </table>
    </div>
    <P class="text-danger">First add Lot Then Create Lot. Lot Summery is Just like  Cart Items </P>
</div>
</div>




<script>
    let searchInput = document.getElementById("searchInput");
    let optionsList = document.getElementById("optionsList");
    let hrmSelect = document.getElementById("hrmSelect");

    // Show dropdown when clicking the search box
    searchInput.addEventListener("focus", function() {
        optionsList.style.display = "block";
    });

    // Hide dropdown when clicking outside
    document.addEventListener("click", function(event) {
        if (!searchInput.contains(event.target) && !optionsList.contains(event.target)) {
            optionsList.style.display = "none";
        }
    });

    // Filter options based on input
    function filterOptions() {
        let filter = searchInput.value.toLowerCase();
        let options = optionsList.getElementsByClassName("option-item");

        for (let i = 0; i < options.length; i++) {
            let text = options[i].textContent.toLowerCase();
            options[i].style.display = text.includes(filter) ? "block" : "none";
        }
    }

    // Select an option
    function selectOption(value) {
        searchInput.value = value;
        optionsList.style.display = "none";

        // Set the selected option in the hidden select
        for (let i = 0; i < hrmSelect.options.length; i++) {
            if (hrmSelect.options[i].value === value) {
                hrmSelect.options[i].selected = true;
                break;
            }
        }
    }
</script>

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', async function() {
    try {
        const response = await fetch('/internal-dispatch/latest-lot-number');
        const data = await response.json();

        // Log the entire response data for debugging
        console.log('Response data:', data);

        if (data.lastLotNumber) {
            const lastLotNumber = data.lastLotNumber;
            const newLotNumber = incrementLotNumber(lastLotNumber);
            document.getElementById('lot_number').value = newLotNumber;
        } else {
            console.error('Invalid lot number received from the server');
        }
    } catch (error) {
        console.error('Error fetching lot number:', error);
    }
});

function incrementLotNumber(lotNumber) {
    // Ensure the prefix and numeric part are correctly handled
    const prefix = lotNumber.substring(0, 1); // 'D'
    const numberPart = parseInt(lotNumber.substring(1)) || 0;
    const newNumberPart = numberPart + 1;
    const newLotNumber = prefix + String(newNumberPart).padStart(3, '0'); // e.g., 'D001'
    return newLotNumber;
}


</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let selectedCategoryName = '';
        let selectedSubcategoryName = '';
        let selectedArticleName = '';
        let summarizedLotsData = []; // Array to store summarized lot data

        // Event listener for category clicks
        document.querySelectorAll('.category-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const categoryId = this.dataset.categoryId;
                selectedCategoryName = this.innerText;

                // Fetch and display subcategories
                fetch(`/inventory/subcategories/${categoryId}`)
                    .then(response => response.json())
                    .then(subcategories => {
                        const subcategoriesContainer = document.getElementById('subcategories-container');
                        subcategoriesContainer.innerHTML = '';
                        subcategories.forEach(subcategory => {
                            subcategoriesContainer.innerHTML += `
                                <div class="thumbnail-uniform-images col-lg-12" style="margin-bottom: 20px;">
                                    <div>
                                        <img src="${subcategory.subcategory_image}" alt=""
                                            style="height: 100px; width: 100px; border: 1px solid #dee2e6; border-radius: 50%; padding: 0.25rem;">
                                        <p style="text-align: center;">
                                            <a href="#" class="subcategory-link" data-subcategory-id="${subcategory.id}">${subcategory.subcategory_name}</a>
                                        </p>
                                    </div>
                                    <div class="articles-container" id="articles-container-${subcategory.id}" style="display: none; margin-left: -20px;">
                                    </div>
                                </div>
                            `;
                        });
                    });
            });
        });

        // Event listener for subcategory clicks
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('subcategory-link')) {
                event.preventDefault();
                const subcategoryId = event.target.dataset.subcategoryId;
                selectedSubcategoryName = event.target.innerText;
                const articlesContainer = document.getElementById(`articles-container-${subcategoryId}`);

                // Fetch and display articles
                fetch(`/inventory/articles/${subcategoryId}`)
                    .then(response => response.json())
                    .then(articles => {
                        articlesContainer.innerHTML = '';
                        articles.forEach(article => {
                            articlesContainer.innerHTML += `
                                <div class="uniform-types col-lg-12" style="border-bottom: 1px solid black; margin-bottom: 20px;">
                                    <div>
                                        <img src="${article.article_image}" alt=""
                                            style="height: 80px; width: 80px; border: 1px solid #dee2e6; border-radius: 50%; padding: 0.25rem; margin-left: 12px;">
                                        <p style="text-align: center; font-size: 10px;">
                                            <a href="#" class="article-link" data-article-id="${article.id}" style="margin-left : 22px;">${article.article_name}</a>
                                        </p>
                                    </div>
                                </div>
                            `;
                        });
                        articlesContainer.style.display = 'block';
                    });
            }
        });

        // Show the form when an article is clicked
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('article-link')) {
                event.preventDefault();
                selectedArticleName = event.target.innerText;
                document.getElementById('article-form-container').style.display = 'block';
                document.getElementById('category').value = selectedCategoryName;
                document.getElementById('sub_category').value = selectedSubcategoryName;
                document.getElementById('article_name').value = selectedArticleName;
                // Show the summary table container as well
                document.getElementById('summary-table-container').style.display = 'block';
            }
        });

        // Event listener for "Add Lot" button click
        document.getElementById('add-lot-to-summary').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            const form = document.getElementById('lot-form');
            const formData = new FormData(form);
            const lotEntry = {};

            // Collect all form data into a JavaScript object
            for (let [key, value] of formData.entries()) {
                lotEntry[key] = value;
            }

            // Handle file input separately if you want to display it
            const trackingSlipFile = document.getElementById('tracking_slip_attach').files[0];
            if (trackingSlipFile) {
                lotEntry['tracking_slip_attach_name'] = trackingSlipFile.name; // Store just the name for display
                // You cannot store the file object directly for re-submission in a simple way.
                // For actual file upload with multiple entries, you'd need a more complex strategy
                // like uploading each file individually via AJAX, or modifying your backend
                // to handle an array of files linked to an array of data.
                // For this example, we'll just display the name.
            } else {
                lotEntry['tracking_slip_attach_name'] = '';
            }

            const attachmentFile = document.getElementById('attachment').files[0];
            if (attachmentFile) {
                lotEntry['attachment_name'] = attachmentFile.name;
            } else {
                lotEntry['attachment_name'] = '';
            }


            // Add the current form data to the summarizedLotsData array
            summarizedLotsData.push(lotEntry);
            updateSummaryTable();
            clearForm(); // Clear the form after adding to summary
        });

        // Event listener for "Create Lot" button click
        document.getElementById('create-lot').addEventListener('click', function(event) {
            // Before submitting, populate the hidden input with the JSON string of summarized data
            document.getElementById('summarized-lots-input').value = JSON.stringify(summarizedLotsData);
            // The form will now submit with this hidden input, and your Laravel backend can decode it.
        });

        function updateSummaryTable() {
            const summaryTableBody = document.querySelector('#summary-table tbody');
            summaryTableBody.innerHTML = ''; // Clear existing rows

            summarizedLotsData.forEach((entry, index) => {
                const newRow = summaryTableBody.insertRow();
                newRow.innerHTML = `
                    <td>${entry.lot_id || ''}</td>
                    <td>${entry.cro_id || ''}</td>
                    <td>${entry.category || ''}</td>
                    <td>${entry.sub_category || ''}</td>
                    <td>${entry.article_name || ''}</td>
                    <td>${entry.lot_number || ''}</td>
                    <td>${entry.condition || ''}</td>
                    <td>${entry.date || ''}</td>
                    <td>${entry.issued_to || ''}</td>
                    <td>${entry.item_name || ''}</td>
                    <td>${entry.item_code || ''}</td>
                    <td>${entry.description || ''}</td>
                    <td>${entry.size || ''}</td>
                    <td>${entry.article_number || ''}</td>
                    <td>${entry.quantity || ''}</td>
                    <td>${entry.price_per_unit || ''}</td>
                    <td>${entry.total_price || ''}</td>
                    <td>${entry.dispatch_through || ''}</td>
                    <td>${entry.tracking_id || ''}</td>
                    <td>${entry.tracking_slip_attach_name || ''}</td>
                    <td>${entry.dispatcher_name || ''}</td>
                    <td>${entry.dispatcher_employee_id || ''}</td>
                    <td>${entry.dispatcher_cell_no || ''}</td>
                    <td>${entry.receiver_name || ''}</td>
                    <td>${entry.receiver_employee_id || ''}</td>
                    <td>${entry.receiver_cell_no || ''}</td>
                    <td>${entry.notes || ''}</td>
                    <td>${entry.attachment_name || ''}</td>
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="removeLotEntry(${index})">Remove</button></td>
                `;
            });
        }

        // Function to remove an entry from the summary table and data array
        window.removeLotEntry = function(index) {
            summarizedLotsData.splice(index, 1); // Remove from array
            updateSummaryTable(); // Re-render the table
        };


        function clearForm() {
            document.getElementById('lot_id').value = '';
            document.getElementById('cro_id').value = '';
            document.getElementById('lot_number').value = '';
            document.getElementById('condition').value = '';
            document.getElementById('date').value = '';
            document.getElementById('searchInput').value = ''; // Clear search input for Issued To
            document.getElementById('hrmSelect').value = ''; // Clear hidden select for Issued To
            document.getElementById('item_name').value = '';
            document.getElementById('item_code').value = '';
            document.getElementById('description').value = '';
            document.getElementById('size').value = '';
            document.getElementById('article_number').value = '';
            document.getElementById('quantity').value = '';
            document.getElementById('price_per_unit').value = '';
            document.getElementById('total_price').value = '';
            document.getElementById('dispatch_through').value = '';
            document.getElementById('tracking_id').value = '';
            document.getElementById('tracking_slip_attach').value = ''; // Clear file input
            document.getElementById('dispatcher_name').value = '';
            document.getElementById('dispatcher_employee_id').value = '';
            document.getElementById('dispatcher_cell_no').value = '';
            document.getElementById('receiver_name').value = '';
            document.getElementById('receiver_employee_id').value = '';
            document.getElementById('receiver_cell_no').value = '';
            document.getElementById('notes').value = '';
            document.getElementById('attachment').value = ''; // Clear file input
        }

        // --- Searchable Dropdown for Issued To ---
        window.filterOptions = function() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const optionsList = document.getElementById('optionsList');
            const options = optionsList.getElementsByClassName('option-item');

            optionsList.style.display = 'block'; // Show list when typing

            for (let i = 0; i < options.length; i++) {
                const optionText = options[i].textContent || options[i].innerText;
                if (optionText.toLowerCase().indexOf(filter) > -1) {
                    options[i].style.display = '';
                } else {
                    options[i].style.display = 'none';
                }
            }
        };

        window.selectOption = function(name) {
            document.getElementById('searchInput').value = name;
            document.getElementById('hrmSelect').value = name; // Set the value of the hidden select
            document.getElementById('optionsList').style.display = 'none';
        };

        // Close dropdown if clicked outside
        document.addEventListener('click', function(event) {
            const customDropdown = document.querySelector('.custom-dropdown');
            if (!customDropdown.contains(event.target)) {
                document.getElementById('optionsList').style.display = 'none';
            }
        });

        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    });
</script>

<script>
    document.getElementById('quantity').addEventListener('input', calculateTotal);
    document.getElementById('price_per_unit').addEventListener('input', calculateTotal);

    function calculateTotal() {
        let quantity = parseFloat(document.getElementById('quantity').value) || 0;
        let pricePerUnit = parseFloat(document.getElementById('price_per_unit').value) || 0;
        let totalPrice = quantity * pricePerUnit;
        document.getElementById('total_price').value = totalPrice.toFixed(2);
    }
</script>

@include('layouts.footer')
