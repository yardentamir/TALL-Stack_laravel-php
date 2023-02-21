@props([
    'variation' => 'primary',
    'icon' => false,
    'iconPosition' => 'after',
    'href' => false,
    'styleType' => 'secondary',
])

@if (isset($href) && !empty($href))
    <a href="{!! $href !!}" {{ $attributes }} class="{{ $styleType }}">
        @if (isset($icon) && !empty($icon) && $iconPosition === 'before')
            @include('components.blast-demo.' . $icon)
        @endif

        @if (isset($slot) && !empty($slot) && $slot != '')
            <span>{{ $slot }}</span>
        @endisset

        @if (isset($icon) && !empty($icon) && $iconPosition === 'after')
            @include('components.blast-demo.' . $icon)
        @endif
</a>
@else
<button {{ $attributes }} class="{{ $styleType }}">
    @if (isset($icon) && !empty($icon) && $iconPosition === 'before')
        @include('components.blast-demo.' . $icon)
    @endif

    @if (isset($slot) && !empty($slot) && $slot != '')
        <span>{{ $slot }}</span>
    @endisset

    @if (isset($icon) && !empty($icon) && $iconPosition === 'after')
        @include('components.blast-demo.' . $icon)
    @endif
</button>
@endif

<style>
a,
.secondary,
.primary {
display: inline-flex;
justify-items: center;
align-items: center;
padding: 16px 20px;
border: 1px solid #121212;
background: transparent;
color: #121212;
font-weight: 600;
font-size: 18px;
text-align: center;
white-space: nowrap;
transition: all 0.3s ease-in-out;
}


.secondary:hover,
.primary:hover {
background: #121212;
color: #fff;
}

a svg:first-child,
button svg:first-child {
margin-right: 16px;
}

a svg:last-child,
button svg:last-child {
margin-left: 16px;
}

.secondary {
background-color: yellow;
}

.primary {
background-color: red;
}
</style>
