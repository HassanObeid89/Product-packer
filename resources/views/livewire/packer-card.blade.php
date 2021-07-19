        
        <div  class=" flex items-center justify-center justify-between px-8 py-8 shadow-xl rounded-lg w-2/5 mt-20">
            
            <div class="flex flex-col mb-2" >
                <label for="text" class=" font-bold ">Product number: <span class="font-medium">{{$articleNumber}}</span> </label>
                <label for="text" class=" font-bold mb-2">Product Name: <span class="font-medium">{{$itemName}}</span> </label>
                <p class="text-lg font-serif">
                    This product fits in <span class="font-bold">{{$boxSize}}</span> box
                </p> 
            </div>
            <div>
                <img class="w-32   animate-pulse" src="{{ URL('images/Xs.png') }}" alt="">
            </div>
        </div>
