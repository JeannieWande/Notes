<x-note>
    <h1 class="text-center text-3xl ">Note</h1>
    <a href="{{ route('note.index') }}"><button type="submit" class="mx-5 bg-yellow-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Home</button></a>
    <div class="flex justify-start m-5">
        <a href="{{ route('note.create') }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >Create New Note</button></a>
    </div>
    <form action="{{ route('note.update',$editNote->id) }}" method="post" class="m-3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('put')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter title" value="{{ $editNote->title }}">
        </div>
        <div class="mb-6">
            <label for="note-text" class="block text-gray-700 text-sm font-bold mb-2">Note</label>
            <textarea name="note-text" id="editor" cols="30" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $editNote->note }}</textarea>
        </div>
        <div class="flex items-center">
           
            <button type="submit" class="m-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>   
        </div>
    </form>
    <a href="{{ route('note.index') }}"><button type="submit" class=" mx-3 mb-5 bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">cancel</button></a>
</x-note>