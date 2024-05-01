<x-note>
    <h1 class="text-center text-3xl underline">My Notes</h1>
    <div class="flex justify-between m-5">
        <div>
            <a href="{{ route('welcome') }}"><button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Home</button></a>
        </div>
    
        <div>
            <a href="{{ route('note.create') }}"><button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >Create New Note</button></a>
        </div>
    </div>


        @if($numberOfNotes==0)
            <div class="rounded m-3 ">
                <h1 class="text-center text-3xl bg-blue-400 text-white p-5">You have not created any note!</h1>
            </div> 
        @else
            <div class="grid m-3 grid-cols-3  ">

                @foreach ($notes as $note)
                
                <div class="relative bg-gray-100 border-opacity-5 rounded-lg shadow-md  m-3 p-4 h-72">   
                        <div class="flex flex-col space-y-4">  
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
                        <p class="text-right absolute right-0 p-2 bottom-10">created_on: {{ $note->created_at->format('d,F Y') }}</p>
                  
                            <div class=" flex justify-center items-baseline absolute bottom-0 right-0 p-2">
                                <a href="{{ route('note.show', $note->id) }}"> <button  class="bg-white-400 hover:bg-blue-700 text-blue-700  hover:text-white py-1  px-2 rounded shadow-md font-light">view</button></a>
                                <a href="{{ route('note.edit', $note->id) }}"><button  class="m-1 bg-white-400 hover:bg-green-700 text-green-700  hover:text-white  font-light py-1 px-2 rounded shadow-md">Edit</button></a>
                                <form action="{{ route('note.delete',$note->id)}}" method="post">
                                   @csrf
                                   @method('delete')
                                   <button  class="m-1 bg-white-500 hover:bg-red-700 text-red-500 hover:text-white font-light py-1 px-2 rounded shadow-md">Delete</button>
                                </form> 
                            </div>
                        
                </div>
             
                @endforeach
            </div>   
        @endif
    
    
</x-note>
 {{--
                                @foreach ($users as $user)
                            @if ($user->id===$note->user_id)
                                <!--<p class="text-right">Author:{{ $user->name }}</p>-->                 
                            @endif      
                            @endforeach --}}