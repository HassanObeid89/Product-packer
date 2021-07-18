<!doctype html>

<title>Product Packer</title>
<link href="{{ mix('css/app.css') }}" rel='stylesheet'>
@livewireStyles
<body>

    

    <div class="min-h-screen bg-gradient-to-r from-pink-100 via-yellow-300
    to-pink-100 flex flex-col items-center justify-center ">

        <x-logo />


        <div class="  py-8 px-6 shadow-xl rounded-lg  w-2/5
     ">
            <form action="productView" method="GET">
                <label for="text" class="block font-bold text-black">Article number</label>
                <div class=" flex flex-col items-center justify-center ">

                    <input type="number" name='articleNumber' value="" required class="w-full bg-gray-200 border border-black px-3 py-2 rounded-lg
                shadow-sm focus:outline-none focus:border-indigo-500
                focus:ring-1 focus:ring-indigo-500 mb-8
                 " />
                    
                    <button wire:click="$set('show', true)" type='submit' class="w-2/5 py-2
                rounded-2xl text-lg font-bold text-black bg-purple-400
                hover:bg-purple-300
                ">Submit</button>
                </div>

            </form>
        </div>

        @if ($show ?? '' == true)

        @livewire('packer-card', [
            'itemName' => $itemName,
            'width' => $width,
            'height' => $height,
            'depth' => $depth,
            'articleNumber' => $articleNumber,
            'boxSize' => $boxSize,
            ])
        
        @endif
        
    </div>
    
    
@livewireScripts

</body>
