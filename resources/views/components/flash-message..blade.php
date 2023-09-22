@if (session()->has('message'))
    {{-- here we are checking if we have   the message --}}
{{-- x-show  ,  x-init x-data are from a javascript library called alpine js  --}}
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show == false, 3000)"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-8 py-3">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
