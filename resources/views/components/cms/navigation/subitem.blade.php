<div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
    <span class="menu-link py-2">
        <span class="menu-icon">
            <i class="fa-solid {{ $icon }}"></i>
        </span>
        <span class="menu-title">{{ $label }}</span>
        <span class="menu-arrow"></span>
    </span>

    <div class="menu-sub menu-sub-accordion">
        {{ $slot }}
    </div>
</div>

@push('custom-js')
    <script>
        $(document).ready(function () {

            if ($('.menu-accordion .menu-sub-accordion').find('.menu-link.active').length > 0) {
                $('.menu-accordion').addClass('show');
            }

        });
    </script>
@endpush