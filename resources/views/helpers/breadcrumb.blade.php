<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a
                    href="{{ route('admin.dashboard') }}">@lang('shared.HOME')</a></li>
        <li class="breadcrumb-item"><a
                    href="{{ route($route ?? 'admin.dashboard') }}">{{ $menuName ?? '' }}</a></li>
        @if(isset($pageName))
            <li class="breadcrumb-item active"
                aria-current="page">{{ $pageName ?? '' }}</li>
        @endif
    </ol>
</nav>
