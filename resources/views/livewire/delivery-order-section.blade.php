<div class="w-full">
    @guest
    <!-- User is not authenticated (guest) -->
    <div class="flex flex-row">
        <!-- Login -->
        <div class="flex flex-col items-center w-1/2 justify-items-center justify-center">
            <div class="flex flex-col mt-10">
                <h4 class="text-black text-2xl font-bold">Have an account?</h4>
                <h4 class="text-white text-4xl font-bold self-center mt-5">Login</h4>
            </div>
            
            <div>
                <livewire:pages.auth.login>
            </div>
            
        </div>

        <!-- (guest) order -->
        <div class="flex flex-col items-center w-1/2 justify-items-center justify-center">
            <div class="flex flex-col mt-10">
                <h4 class="text-black text-2xl font-bold">Continue as guest</h4>
                <h4 class="text-white text-4xl font-bold self-center mt-5">Guest</h4>
            </div>

            <div class="mt-10">
                <livewire:delivery-form>
            </div>
            
        </div>
    </div>

    @else
    <!-- User is authenticated -->
    <p>Welcome, {{ Auth::user()->name }}</p>
    @endguest
</div>
