@include('layouts.header')

@yield('main')
<div class="customer_form">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Weapon Record</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Uniform Record</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container mt-4">
      <div class="d-flex gap-2 align-items-center mb-3 mt-3">
       <button type="button" class="btn btn-link" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>
        </button>
        <h4 class=""> Weapon Record Entry</h4>
      </div>
        <form method="POST" action="{{ route('store.weakly.recordes') }}">
            @csrf

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="branch_id">Branch ID</label>
                    <select name="branch_id" id="branch_id" class="form-control">
                        <option value="">Select Branch</option>
                        @foreach ($admins as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->branch_office_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="weapon_type">Weapon Type</label>
                    <select name="weapon_type" id="weapon_type" class="form-control">
                        <option value="">Select Type</option>
                        <option value="all">All</option>
                        <option value="12_bore">12 Bore</option>
                        <option value="30_bore">30 Bore</option>
                        <option value="9mm_pistol">9 MM Pistol</option>
                        <option value="7mm_rifle">7MM Rifles</option>
                        <option value="222_bore_rifle">222 Bore Rifles</option>
                        <option value="44_bore_rifle">44 Bore Rifles</option>
                        <option value="223_bore_rifle">223 Bore Rifles</option>
                        <option value="223_m4_rifle">223 M4 Rifles</option>
                    </select>
                </div>
            </div>



            {{-- 12 Bore Inputs --}}
            <div id="form_12_bore" class="weapon-section d-none">
                <h5>12 Bore Details</h5>
                <div class="row">
                    @foreach (['repeater', 'body_guard', 'wooden_body', 'g3_style', 'bore12_total_bullets', 'bore12_total'] as $field)
                        <div class="col-md-4 mb-2">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <input type="number" name="{{ $field }}" class="form-control">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- 30 Bore Inputs --}}
            <div id="form_30_bore" class="weapon-section d-none">
                <h5>30 Bore Details</h5>
                <div class="row">
                    @foreach (['seven_shots', 'fourteen_shots', 'mp5', 'kalakov', 'bore30_total_bullets', 'bore30_total'] as $field)
                        <div class="col-md-4 mb-2">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <input type="number" name="{{ $field }}" class="form-control">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- 9 MM Pistol Inputs --}}
            <div id="form_9mm_pistol" class="weapon-section d-none">
                <h5>9 MM Pistol Details</h5>
                <div class="row">
                    @foreach (['mp_5', 'zagana', 'breta', 'glock', 'mm9_total_bullets', 'mm9_total'] as $field)
                        <div class="col-md-4 mb-2">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <input type="number" name="{{ $field }}" class="form-control">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Rifles Inputs --}}
            <div id="7mmm_rifle" class="weapon-section d-none">
                <h5>7MM Rifle</h5>
                <div class="row">
                    @foreach (['mm7_standard', 'mm7_total_bullets'] as $field)
                        <div class="col-md-6 mb-2">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <input type="number" name="{{ $field }}" class="form-control">
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="222bore_rifle" class="weapon-section d-none">
                <h5>222 Bore Rifle </h5>
                <div class="row">
                    @foreach (['rifle_222', 'rifle_222_bullets'] as $field)
                        <div class="col-md-6 mb-2">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <input type="number" name="{{ $field }}" class="form-control">
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="44bore_rifle" class="weapon-section d-none">
                <h5>44 Bore Rifle </h5>
                <div class="row">
                    @foreach (['rifle_44', 'rifle_44_bullets'] as $field)
                        <div class="col-md-6 mb-2">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <input type="number" name="{{ $field }}" class="form-control">
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="223bore_rifle" class="weapon-section d-none">
                <h5>223 Bore Rifle </h5>
                <div class="row">
                    @foreach (['rifle_223', 'rifle_223_bullets'] as $field)
                        <div class="col-md-6 mb-2">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <input type="number" name="{{ $field }}" class="form-control">
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="223m4_rifle" class="weapon-section d-none">
                <h5>223 M4 Rifle </h5>
                <div class="row">
                    @foreach (['rifle_223_m4', 'rifle_223_m4_bullets'] as $field)
                        <div class="col-md-6 mb-2">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <input type="number" name="{{ $field }}" class="form-control">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary">Save </button>
            </div>
        </form>
    </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="container mt-4">
        <h4 class="mb-4">Uniform Record Entry</h4>
        <form method="POST" action="{{ route('store.uniform.weakly.recordes') }}">
            @csrf
                <div id="uniforminputs" class="uniform-section">
                {{-- <h5>Uniform Section</h5> --}}
                <div class="row">
                    <div class="col-md-4  mb-2 mt-3">
                    <label for="uni_date">Date</label>
                    <input type="date" id="uni_date" name="uni_date" class="form-control" required>
                </div>
                <div class="col-md-4  mb-2 mt-3">
                    <label for="branch_id">Branch ID</label>
                    <select name="branch_id" id="branch_id" class="form-control">
                        <option value="">Select Branch</option>
                        @foreach ($admins as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->branch_office_name }}</option>
                        @endforeach
                    </select>
                </div>
                    @foreach (['stand_uniform', 'white_sleeves','ssg_uniform','t_shirt','lady_gown','suit','dms','standard_shows','beige_color_shoes','whistile_n_dory','employee_card','p_gap','barret_cap','white_belt','black_belt','sash','qamar_barand','white_gloves','white_arm_sleves','arm_band','scarf','winter_jacket','high_visibility_jacket','jarsee','rain_coat','umbrella','torch','others','supervisor_signature','manager_operation_signature','gm_signature'] as $field)
                        <div class="col-md-4 mb-2 mt-3">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <input type="text" name="{{ $field }}" class="form-control">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-primary">Save Uniform Record</button>
            </div>
        </form>
    </div>
  </div>
</div>

</div>
{{-- Script to handle weapon type selection --}}
<script>
    document.getElementById('weapon_type').addEventListener('change', function() {
        const selected = this.value;

        document.querySelectorAll('.weapon-section').forEach(section => section.classList.add('d-none'));

        if (selected === '12_bore') {
            document.getElementById('form_12_bore').classList.remove('d-none');
        } else if (selected === '30_bore') {
            document.getElementById('form_30_bore').classList.remove('d-none');
        } else if (selected === '9mm_pistol') {
            document.getElementById('form_9mm_pistol').classList.remove('d-none');
        } else if (selected === '7mm_rifle') {
            document.getElementById('7mmm_rifle').classList.remove('d-none');
        } else if (selected === '222_bore_rifle') {
            document.getElementById('222bore_rifle').classList.remove('d-none');
        } else if (selected === '44_bore_rifle') {
            document.getElementById('44bore_rifle').classList.remove('d-none');
        } else if (selected === '223_bore_rifle') {
            document.getElementById('223bore_rifle').classList.remove('d-none');
        } else if (selected === '223_m4_rifle') {
            document.getElementById('223m4_rifle').classList.remove('d-none');
        }
        else if (selected === 'all') {
            document.getElementById('form_12_bore').classList.remove('d-none');
            document.getElementById('form_30_bore').classList.remove('d-none');
            document.getElementById('form_9mm_pistol').classList.remove('d-none');
            document.getElementById('7mmm_rifle').classList.remove('d-none');
            document.getElementById('222bore_rifle').classList.remove('d-none');
            document.getElementById('44bore_rifle').classList.remove('d-none');
            document.getElementById('223bore_rifle').classList.remove('d-none');
            document.getElementById('223m4_rifle').classList.remove('d-none');
        }

    });
</script>
