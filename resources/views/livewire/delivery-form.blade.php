<div>
    <form class="flex flex-col" wire:submit.prevent="submitForm">

        <div class="flex flex-row space-x-2">
            <div class="flex flex-col">
                <label class="text-white font-bold" for="city">City:</label>
                <input class="border-gray-300 border-2 rounded" type="text" id="city" wire:model="City" placeholder="City">
            </div>

            <div class="flex flex-col">
            <label class="text-white font-bold" for="pincode">Pincode:</label>
            <input class="border-gray-300 border-2 rounded" type="number" id="pincode" wire:model="Pincode"  placeholder="Pincode">
            </div>
        </div>


        <label class="text-white font-bold" for="name">Name:</label>
        <input class="border-gray-300 border-2 rounded" type="text" id="name" wire:model="name"  placeholder="Name">

        <label class="text-white font-bold" for="email">Email:</label>
        <input class="border-gray-300 border-2 rounded" type="email" id="email" wire:model="email"  placeholder="Email">

        <label class="text-white font-bold" for="phone">Phone:</label>
        <input class="border-gray-300 border-2 rounded" type="number" id="phone" wire:model="phone"  placeholder="Phone">

        <label class="text-white font-bold" for="email">Comment:</label>
        <textarea class="border-gray-300 border-2 rounded" type="text" id="comment" wire:model="comment"  placeholder="Insert a comment to the delivery" rows="5"> </textarea>
        <button class="bg-green-400 rounded-md text-white my-5 px-10 py-1" type="submit">Submit</button>

    </form>
</div>
