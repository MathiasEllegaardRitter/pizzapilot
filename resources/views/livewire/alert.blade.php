<div>
 <h1>test</h1>
@if (session()->has('success'))
<div 
x-data="{ show: true }"
x-init="setTimeout(() => show = false, 4000)"
x-show="show"
class="fixed bg-orange-400 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
    <h1>{{ session('success') }}</h1>
</div>  
@endif
@if (session()->has('error'))
<div 
x-data="{ show: true }"
x-init="setTimeout(() => show = false, 4000)"
x-show="show"
class="fixed bg-red-700 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
    <h1>{{ session('error') }}</h1>
</div>  
@endif
<div>
