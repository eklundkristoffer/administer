<div class="card">
    @if (isset($header) && ! empty($header))
        <div class="card-header">
            {{ $header }}
        </div>
    @endif
    
    <div class="card-block">
        {{ $slot }}
    </div>
</div>