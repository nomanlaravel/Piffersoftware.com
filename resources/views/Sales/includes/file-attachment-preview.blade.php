@php
    $filePath = $path ?? null;
@endphp

@if (!empty($filePath))
    @if (!empty($showPathInput))
        <input class="form-control" type="text" readonly value="{{ basename($filePath) }}" style="width: 100%;">
    @endif
    <div class="mt-2 d-flex align-items-start flex-wrap" style="gap: 8px;">
        <div class="file-preview" style="cursor: pointer;"
            data-file="{{ asset($filePath) }}"
            data-extension="{{ strtolower(pathinfo($filePath, PATHINFO_EXTENSION)) }}"
            onclick="openRequirementFileModal(this)">
            {!! getFilePreview($filePath) !!}
        </div>
        <a href="{{ asset($filePath) }}" target="_blank" rel="noopener" class="btn btn-sm btn-outline-primary">
            Open / Download
        </a>
    </div>
@else
    <p class="text-muted small mb-0 mt-1">No file uploaded</p>
@endif
