<x-app-layout>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p id="latex">
                    \(\newenvironment{task}{}{}\)
                    \(\newenvironment{solution}{\noindent\textbf{Riešenie:}}{}\)
                        @foreach ($latex as $priklad)
                            <div>
                                <p>\[{{$priklad['task']}}\]</p>
                                @if($priklad['image'] != "")
                                <p><img src="{{Storage::url($priklad['image'])}}"></p>
                                @endif
                                <p>Solution: \[{{$priklad['solution']}}\]</p>
                            </div>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>