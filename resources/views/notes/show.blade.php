<x-note>
    <h1 class="text-center text-3xl ">Note</h1>
    
    @if (Auth::check())
    @if ($showNote->id===Auth::id())
        <a href="{{ route('note.index') }}"><button type="submit" class="mx-5 bg-yellow-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">My Notes</button></a>
        <div class="flex justify-start m-5">
            <a href="{{ route('note.create') }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New Note</button></a>
        </div>    
    @endif
    @endif
        <div class="flex flex-col justify-center align-center m-4">
            <div class="bg-white rounded-lg shadow-md p-4">   
                    <p class="text-right text-sm">created_at:{{ $showNote->created_at }}</p>
                    <div class="">  
                        <h1 class="text-center text-xl uppercase">{{ $showNote->title }}</h1>  
                        <p>{!! $showNote->note !!}</p>
                    </div>
                    <div class="flex justify-end items-center">
                        <a href="{{ route('welcome') }}"><button type="submit" class=" m-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Go back to home page</button></a>
                       
                        @if (Auth::check())
                          @if ($showNote->id===Auth::id())
                                <a href="{{ route('note.edit', $showNote->id) }}"><button  class="m-1 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Edit</button></a>
                                <form action="{{ route('note.delete',$showNote->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button  class="m-1 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                </form>
                              
                          @endif
                            
                        @endif
                        
                    </div>      
            </div>    
        </div>    
</x-note>