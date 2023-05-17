@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm','style' => 'border-color: rgba(16,16,16); background: linear-gradient(90deg, rgba(84,14,84,1) 0%, rgba(129,17,59,0.7) 90%), rgb(179,20,31)']) !!}>
