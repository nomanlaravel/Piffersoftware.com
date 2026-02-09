@push('extended-css')
    <link rel="stylesheet" href="{{ asset('css/tick.css') }}">
    <style>
        .modern-breadcrumb-section {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 249, 255, 0.95) 100%);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            padding: 20px 28px;
            margin-bottom: 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0 0 12px 0;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .breadcrumb-item {
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            content: '→';
            padding: 0 12px;
            color: #94a3b8;
            font-weight: 400;
        }

        .breadcrumb-item a {
            color: #64748b;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 6px 12px;
            border-radius: 6px;
        }

        .breadcrumb-item a:hover {
            color: #667eea;
            background: rgba(102, 126, 234, 0.1);
        }

        .breadcrumb-item.active a {
            color: #667eea;
            font-weight: 700;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        }

        .page-title {
            font-size: 24px;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .btn.add-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .btn.add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn.add-btn i {
            margin-right: 8px;
        }

        .refresh-section {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            border-radius: 10px;
            border: 1px solid rgba(102, 126, 234, 0.2);
        }

        .refresh-section p {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
            color: #475569;
        }

        #refresh-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: white;
        }

        #refresh-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }
    </style>
@endpush

<div class="modern-breadcrumb-section">
    <div class="row align-items-center">
        <div class="col-md-8">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="text-capitalize" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <?php $segments = ''; ?>
                    <li class="breadcrumb-item active">
                        <a class="text-capitalize" href="{{ $segments }}">{{ str_replace('-', ' ', collect(request()->segments())->last()) }}</a>
                    </li>
            </ul>
            <h3 class="page-title breadcrumb-card-head text-capitalize">
                {{ str_replace('-', ' ', collect(request()->segments())->last()) }}
            </h3>
        </div>

        @if ($modal == true)
            <div class="col-md-4 text-right">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#{{ $modalId }}">
                    <i class="fa fa-plus"></i> Add {{ $modalType }}
                </a>
            </div>
        @endif
    </div>

    @if ($showClock == 'true')
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="tick" data-did-init="handleTickInit">
                    <div data-repeat="true" data-layout="horizontal fit" data-transform="preset(d, h, m, s) -> delay">
                        <div class="tick-group">
                            <div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">
                                <span data-view="flip"></span>
                            </div>
                            <span data-key="label" data-view="text" class="tick-label"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-center mt-3">
            <div class="refresh-section d-inline-flex">
                <p>Till next attendance update</p>
                <form action="{{ url('/refresh-data') }}" method="GET" style="display: inline;">
                    <button id="refresh-btn" type="submit">
                        <i class="fas fa-sync fa-spin"></i>
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>
<!-- /Page Header -->

@push('extended-js')
    <script src="{{ asset('js/extensions/tick/tick.js') }}"></script>
    <script>
        document.getElementById('refresh-btn')?.addEventListener('click', function (e) {
            e.preventDefault();
            fetch("{{ url('/refresh-data') }}")
                .then(response => response.text())
                .then(data => {
                    toastr.success("Attendances have been updated successfully!");
                })
                .catch(error => {
                    toastr.error("Error updating attendances!");
                });
        });
    </script>
@endpush