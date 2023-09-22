
{{-- if u wish to give this component a class as a prop you can using the $attributes variable --}}
<div {{$attributes->merge(['class'=>"bg-gray-50 border border-gray-200 rounded p-6"])}} class="bg-gray-50 border border-gray-200 rounded p-6">
    {{ $slot }} {{-- this works like props.children in react --}}

</div>
