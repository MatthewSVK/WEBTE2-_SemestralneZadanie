@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white dark:bg-gray-700'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
@endphp

{{--<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">--}}
{{--    <div @click="open = ! open">--}}
{{--        {{ $trigger }}--}}
{{--    </div>--}}

{{--    <div x-show="open"--}}
{{--            x-transition:enter="transition ease-out duration-200"--}}
{{--            x-transition:enter-start="transform opacity-0 scale-95"--}}
{{--            x-transition:enter-end="transform opacity-100 scale-100"--}}
{{--            x-transition:leave="transition ease-in duration-75"--}}
{{--            x-transition:leave-start="transform opacity-100 scale-100"--}}
{{--            x-transition:leave-end="transform opacity-0 scale-95"--}}
{{--            class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"--}}
{{--            style="display: none;"--}}
{{--            @click="open = false">--}}
{{--        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">--}}
{{--            {{ $content }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<select {!! $attributes->merge(['class' => 'dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm', 'style' => 'border-color: rgba(16,16,16); background: linear-gradient(90deg, rgba(84,14,84,1) 0%, rgba(129,17,59,0.7) 90%), rgb(179,20,31)']) !!}>
    {{ $slot }}
</select>
