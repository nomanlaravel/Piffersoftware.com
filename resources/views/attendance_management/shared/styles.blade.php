{{-- Shared Styles for Attendance Management Module --}}
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        --danger-gradient: linear-gradient(135deg, #ee0979 0%, #ff6a00 100%);
        --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --info-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        --light-bg: #f8f9ff;
        --text-primary: #2d3748;
        --text-secondary: #718096;
        --border-radius-lg: 16px;
        --border-radius-md: 12px;
        --border-radius-sm: 8px;
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
        --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.12);
        --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.16);
        --shadow-xl: 0 12px 48px rgba(0, 0, 0, 0.2);
    }

    * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf4 100%);
        min-height: 100vh;
    }

    .customer_form {
        margin-left: 15% !important;
        padding: 30px !important;
        width: 85% !important;
        box-sizing: border-box;
    }

    @media screen and (max-width: 991px) {
        .customer_form {
            margin-left: 0 !important;
            width: 100% !important;
            padding: 15px !important;
        }
    }

    /* Modern Alert Styling */
    .alert-success {
        background: linear-gradient(135deg, rgba(17, 153, 142, 0.1) 0%, rgba(56, 239, 125, 0.1) 100%);
        border: 2px solid rgba(56, 239, 125, 0.3);
        border-radius: var(--border-radius-md);
        color: #0d9488;
        font-weight: 500;
        box-shadow: var(--shadow-sm);
        animation: slideDown 0.4s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Main Card Styling */
    .card-premium {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .card-premium:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-2px);
    }

    /* Header Styles */
    .page-header {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 249, 255, 0.95) 100%);
        backdrop-filter: blur(20px);
        border-radius: var(--border-radius-lg);
        padding: 32px;
        margin-bottom: 32px;
        border: 1px solid rgba(102, 126, 234, 0.1);
        box-shadow: var(--shadow-md);
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(102, 126, 234, 0.03) 50%, transparent 70%);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .page-header h1 {
        margin: 0;
        font-size: 32px;
        font-weight: 700;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.5px;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .page-header p {
        margin: 8px 0 0 0;
        color: var(--text-secondary);
        font-size: 15px;
        font-weight: 500;
        position: relative;
        z-index: 1;
    }

    /* Refresh Button Premium */
    .btn-refresh {
        background: white;
        border: 2px solid #e2e8f0;
        color: #667eea;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 12px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .btn-refresh:hover {
        background: var(--primary-gradient);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-refresh:active {
        transform: translateY(0);
    }

    .btn-refresh i.fa-spin {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    /* Table Card Styling */
    .table-card {
        background: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-md);
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }

    .table-card-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 24px 32px;
        border-bottom: 2px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .table-card-title {
        display: flex;
        align-items: center;
        gap: 16px;
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: var(--text-primary);
    }

    .table-card-title i {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--primary-gradient);
        color: white;
        border-radius: 12px;
        font-size: 20px;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .table-card-subtitle {
        margin: 4px 0 0 64px;
        color: var(--text-secondary);
        font-size: 14px;
        font-weight: 500;
    }

    .table-card-body {
        padding: 32px;
    }

    /* Table Styling */
    .table-responsive {
        border-radius: var(--border-radius-md);
        overflow: auto;
        box-shadow: var(--shadow-sm);
        margin-top: 24px;
    }

    .table {
        margin-bottom: 0 !important;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
    }

    .table thead th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white !important;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px 20px;
        border: none;
        white-space: nowrap;
        position: sticky;
        top: 0;
        z-index: 10;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    .table thead th:first-child {
        border-top-left-radius: var(--border-radius-md);
    }

    .table thead th:last-child {
        border-top-right-radius: var(--border-radius-md);
    }

    .table tbody td {
        padding: 16px 20px;
        vertical-align: middle;
        border-bottom: 1px solid #e2e8f0;
        color: var(--text-primary);
        font-size: 14px;
        transition: background-color 0.2s ease;
        background: white;
    }

    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover td {
        background-color: rgba(102, 126, 234, 0.04);
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .table tbody tr:last-child td:first-child {
        border-bottom-left-radius: var(--border-radius-md);
    }

    .table tbody tr:last-child td:last-child {
        border-bottom-right-radius: var(--border-radius-md);
    }

    /* Badge Styling */
    .badge {
        padding: 8px 16px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        min-width: 90px;
        text-align: center;
    }

    .badge-active,
    .text-success {
        background: linear-gradient(135deg, rgba(17, 153, 142, 0.15) 0%, rgba(56, 239, 125, 0.15) 100%);
        color: #047857 !important;
        border: 2px solid rgba(16, 185, 129, 0.3);
    }

    .badge-held,
    .text-danger {
        background: linear-gradient(135deg, rgba(238, 9, 121, 0.15) 0%, rgba(255, 106, 0, 0.15) 100%);
        color: #b91c1c !important;
        border: 2px solid rgba(239, 68, 68, 0.3);
    }

    /* Action Dropdown Styling */
    .dropdown-action {
        position: relative;
    }

    .action-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        color: #667eea;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .action-icon:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        transform: rotate(90deg);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .dropdown-menu {
        border: none;
        border-radius: var(--border-radius-md);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        padding: 8px;
        margin-top: 8px;
        min-width: 180px;
    }

    .dropdown-item {
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 500;
        color: #475569;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .dropdown-item:hover {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        color: #667eea;
        transform: translateX(4px);
    }

    .dropdown-item.delete-leave-type:hover,
    .dropdown-item.text-danger:hover {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.1) 100%);
        color: #dc2626 !important;
    }

    .dropdown-item i {
        font-size: 16px;
        opacity: 0.8;
    }

    .dropdown-divider {
        border-top: 1px solid #e2e8f0;
        margin: 6px 0;
    }

    /* DataTables Customization */
    .dataTables_wrapper {
        padding: 0;
    }

    .dataTables_wrapper .dataTables_length {
        margin-bottom: 20px;
    }

    .dataTables_wrapper .dataTables_length label {
        font-weight: 600 !important;
        color: var(--text-primary) !important;
        font-size: 14px !important;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .dataTables_wrapper .dataTables_length select {
        border: 2px solid #e2e8f0 !important;
        border-radius: 10px !important;
        padding: 10px 40px 10px 16px !important;
        font-weight: 600 !important;
        color: var(--text-primary) !important;
        background: white !important;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23667eea' d='M6 9L1 4h10z'/%3E%3C/svg%3E") !important;
        background-repeat: no-repeat !important;
        background-position: right 12px center !important;
        appearance: none !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        cursor: pointer;
        transition: all 0.3s ease !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05) !important;
        height: 42px !important;
        line-height: 1.5 !important;
        min-width: 80px !important;
    }

    .dataTables_wrapper .dataTables_length select:hover {
        border-color: #667eea !important;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2) !important;
    }

    .dataTables_wrapper .dataTables_length select:focus {
        outline: none !important;
        border-color: #667eea !important;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1) !important;
    }

    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 20px;
    }

    .dataTables_wrapper .dataTables_filter label {
        font-weight: 600 !important;
        color: var(--text-primary) !important;
        font-size: 14px !important;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 2px solid #e2e8f0 !important;
        border-radius: 12px !important;
        padding: 10px 16px 10px 40px !important;
        font-size: 14px !important;
        font-weight: 500 !important;
        color: var(--text-primary) !important;
        transition: all 0.3s ease !important;
        width: 280px !important;
        background: white !important;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23667eea' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'%3E%3C/circle%3E%3Cpath d='m21 21-4.35-4.35'%3E%3C/path%3E%3C/svg%3E") !important;
        background-repeat: no-repeat !important;
        background-position: 12px center !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05) !important;
    }

    .dataTables_wrapper .dataTables_filter input:hover {
        border-color: #cbd5e0 !important;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        outline: none !important;
        border-color: #667eea !important;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1) !important;
    }

    .dataTables_wrapper .dataTables_filter input::placeholder {
        color: #a0aec0;
    }

    /* DataTables Pagination */
    .dataTables_wrapper .dataTables_paginate {
        margin-top: 24px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border: 2px solid #e2e8f0 !important;
        color: #667eea !important;
        font-weight: 600 !important;
        margin: 0 4px !important;
        border-radius: 8px !important;
        transition: all 0.3s ease !important;
        padding: 8px 16px !important;
        background: white !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: var(--primary-gradient) !important;
        color: white !important;
        border-color: transparent !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3) !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: var(--primary-gradient) !important;
        border-color: transparent !important;
        color: white !important;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4) !important;
    }

    .dataTables_wrapper .dataTables_info {
        font-weight: 600;
        color: #64748b;
        font-size: 14px;
        padding-top: 12px;
    }

    /* Smooth Scrollbar */
    .table-responsive::-webkit-scrollbar {
        height: 10px;
    }

    .table-responsive::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px;
        border: 2px solid #f1f5f9;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 24px;
        }

        .table-card-body {
            padding: 20px;
        }

        .table thead th,
        .table tbody td {
            font-size: 12px;
            padding: 12px 16px;
        }

        .dataTables_wrapper .dataTables_filter input {
            width: 200px !important;
        }
    }
</style>