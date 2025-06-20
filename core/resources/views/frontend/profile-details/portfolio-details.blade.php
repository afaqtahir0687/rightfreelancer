<span class="popup-contents-close popup-close"> <i class="fas fa-times"></i> </span>
<div class="profile-details-portfolio">
    <div class="popup-contents-portfolio-thumb">
    <a href="#/">
        @php
            $image = $portfolioDetails->image ?? null;
            $cloud = cloudStorageExist() && in_array(Storage::getDefaultDriver(), ['s3', 'cloudFlareR2', 'wasabi']);
        @endphp

        @if(!empty($image))
            @if($cloud)
                <img src="{{ render_frontend_cloud_image_if_module_exists('portfolio/' . $image, load_from: $portfolioDetails->load_from) }}" alt="{{ __('portfolio') }}">
            @else
                <img src="{{ asset('assets/uploads/portfolio/' . $image) }}" alt="{{ __('portfolio') }}">
            @endif
        @else
        <img src="{{ asset('assets/uploads/portfolio/logo172632858617267305591731011557.png') }}" alt="default-avatar">
        @endif
    </a>

    </div>
    <div class="profile-details-portfolio-content mt-3">
        <h5 class="profile-details-portfolio-content-title">
            <a href="javascript:void(0)">{{ $portfolioDetails->title ?? '' }}</a>
        </h5>
        <p class="profile-details-portfolio-content-para">{{ $portfolioDetails->created_at->toFormattedDateString() ?? '' }}</p>
        <p class="profile-details-portfolio-content-para">{{ $portfolioDetails->description ?? '' }} </p>
    </div>
</div>
@if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 2 && Auth::guard('web')->user()->username==$username)
    <div class="popup-contents-btn flex-btn justify-content-end profile-border-top">
        <a href="javascript:void(0)" class="btn-profile btn-outline-gray btn-hover-danger delete_portfolio" data-id="{{ $portfolioDetails->id }}">
            <i class="fa-solid fa-trash-can"></i> {{ __('Delete') }}
        </a>
        <a href="javascript:void(0)"
           class="btn-profile btn-bg-1 edit_portfolio_details"
           data-id="{{ $portfolioDetails->id }}"
           data-title="{{ $portfolioDetails->title }}"
           data-description="{{ $portfolioDetails->description }}"
           data-image="{{ $portfolioDetails->image }}"
        > {{ __('Edit This') }} </a>
    </div>
@endif

