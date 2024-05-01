
<x-note>
    <h1 class="text-center text-3xl ">All Notes</h1>

    <div class="flex justify-between m-5">
        <div>
            <a href="{{ route('note.index') }}"><button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >My Notes</button></a>
        </div>
        <div>
            <a href="{{ route('note.create') }}"><button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >Create Note</button></a>
        </div>
       
    </div>

    <div class="grid grid-cols-2">
        @foreach ($notes as $note)
        <div class="relative bg-gray-100 border-opacity-5 rounded-lg shadow-md  m-3 p-4 h-60">   
                <div class="flex flex-col">  
                    <div>
                        @if (Str_word_count($note->note)>3)
                            <h1 class="text-center text-xl uppercase">{!! Str::words($note->title, $count=4, '...')!!}</h1> 
                        @else
                            <h1 class="text-center text-xl uppercase">{{ $note->title}} </h1> 
                        @endif 
                    
                    </div>
                    <div>
                        <p class="mt-auto">{!! Str::words($note->note, $count=25, '...')!!} 
                            @if (Str_word_count($note->note)>=25)
                                <a href="{{ route('note.show',$note->id) }}" class="text-blue-300">Read More</a>     
                            @endif 
                        </p>
                    </div>  
                </div>
                
                   <p class="text-right absolute right-0 p-2 bottom-16">Author: {{ $note->user->name }}</p>    
               
                <p class="text-right absolute right-0 p-2 bottom-10">created_on: {{ $note->created_at->format('d,F Y') }}</p>

                    <div class=" flex justify-center items-baseline absolute bottom-0 right-0 p-2">
                        <a href="{{ route('note.show', $note->id) }}"> <button  class="bg-white-400 hover:bg-blue-700 text-blue-700  hover:text-white py-1  px-2 rounded shadow-md font-light">view</button></a>
                    </div>
                
        </div>
        
        @endforeach
    </div>   

    
<div class="m-5">{{ $notes->links() }}</div>
<div class="bg-teal-100 w-full h-32 text-center">footer</div>
</x-note>
                    


