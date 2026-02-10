# Attendance Management Module - Developer Quick Reference

## 📁 File Structure
```
attendance_management/
├── shared/
│   ├── styles.blade.php          # All shared CSS styles
│   └── scripts.blade.php         # DataTables JS libraries
├── leave_types/
│   └── index.blade.php           # Leave types management
├── employee_leaves/
│   └── index.blade.php           # Employee leave requests
└── attendance/
    └── attendance-update.blade.php
```

## 🎨 Shared Styles Available

### CSS Classes
- `.page-header` - Modern header with gradient text
- `.table-card` - Card container for tables
- `.table-card-header` - Card header section
- `.table-card-title` - Header title with icon
- `.table-card-subtitle` - Subtitle text
- `.table-card-body` - Card body content
- `.btn-refresh` - Refresh button with hover effects
- `.badge-active`, `.badge-held` - Status badges
- `.action-icon` - Action dropdown trigger

### CSS Variables
```css
--primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%)
--text-primary: #2d3748
--text-secondary: #718096
--border-radius-lg: 16px
--border-radius-md: 12px
--border-radius-sm: 8px
```

## 📦 Available Includes

### Vendor CSS
```blade
@include('vendors.data-tables')      # DataTables Bootstrap 5 CSS
@include('vendors.toastr')           # Toastr notification CSS
@include('vendors.sweet-alerts')     # SweetAlert CSS
```

### Vendor JS
```blade
@include('attendance_management.shared.scripts')  # DataTables JS
```

### Module Styles
```blade
@include('attendance_management.shared.styles')  # All shared module styles
```

## 🚀 Quick Start Template

```blade
@include('layouts.header')

{{-- CSS Vendors --}}
@include('vendors.data-tables')
@include('vendors.toastr')
@include('vendors.sweet-alerts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

{{-- Shared Styles --}}
@include('attendance_management.shared.styles')

<div class="customer_form">
    @include('headerlogout')

    {{-- Page Header --}}
    <div class="page-header">
        <h1>
            <i class="fas fa-icon-name"></i>
            Your Page Title
        </h1>
        <p>Your page description</p>
    </div>

    {{-- Your Content --}}
    <div class="table-card">
        <div class="table-card-header">
            <div class="table-card-title">
                <i class="fas fa-list"></i>
                <span>Section Title</span>
            </div>
            <button class="btn-refresh" id="btn-refresh">
                <i class="fas fa-sync-alt"></i>
                <span>Refresh</span>
            </button>
        </div>
        <div class="table-card-body">
            <!-- Your content here -->
        </div>
    </div>
</div>

{{-- JS Vendors --}}
@include('attendance_management.shared.scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Your Custom JS --}}
<script src="{{ asset('js/your-page.js') }}"></script>

@include('layouts.footer')
```

## ⚠️ Important Notes

### DO NOT Use @push/@pop
- The layout doesn't support @push/@pop properly
- Always use direct @include() statements

### Loading Order
1. layouts.header (includes jQuery)
2. Vendor CSS
3. Shared styles
4. Page-specific styles (if any)
5. Page content
6. Shared scripts
7. Vendor JS
8. Page-specific scripts
9. layouts.footer

### DataTables Styling
All DataTables controls are pre-styled:
- Search input has search icon
- Length menu (show dropdown) has custom styling
- Pagination buttons have gradient hover effects
- All responsive and mobile-friendly

## 🎯 Common Patterns

### Table Structure
```blade
<div class="table-card">
    <div class="table-card-header">
        <div class="table-card-title">
            <i class="fas fa-table"></i>
            <span>Title</span>
        </div>
    </div>
    <div class="table-card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <!-- table content -->
            </table>
        </div>
    </div>
</div>
```

### Action Dropdown
```blade
<div class="dropdown dropdown-action">
    <a href="#" class="action-icon" data-toggle="dropdown">
        <i class="fas fa-ellipsis-v"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">
            <i class="fas fa-edit"></i> Edit
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" href="#">
            <i class="fas fa-trash"></i> Delete
        </a>
    </div>
</div>
```

### Status Badges
```blade
<span class="badge badge-active">
    <i class="fas fa-check-circle"></i> Active
</span>

<span class="badge badge-held">
    <i class="fas fa-info-circle"></i> Held
</span>
```

## 🔧 Troubleshooting

### Styles Not Applying
1. Check if `@include('attendance_management.shared.styles')` is present
2. Verify it's after vendor CSS includes
3. Clear browser cache

### Scripts Not Loading
1. Ensure `@include('attendance_management.shared.scripts')` is present
2. Check browser console for 404 errors
3. Verify script paths are correct

### DataTables Not Working
1. Check if jQuery is loaded (from layouts.header)
2. Verify shared scripts are included
3. Check browser console for errors

## 📝 Best Practices

1. **Always** use shared styles for consistency
2. **Only** add page-specific styles when absolutely necessary
3. **Never** duplicate vendor includes
4. **Always** maintain the correct loading order
5 **Use** CSS variables for colors and spacing
6. **Follow** the established naming conventions
