<x-note>
    <a href="{{ route('welcome') }}"><button type="submit" class="mx-5 mt-5 bg-yellow-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Home</button></a>
    
    <form action="{{ route('note.store') }}" method="post" class="m-3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter title" required>
        </div>
        <div class="mb-6">
            <label for="note-text" class="block text-gray-700 text-sm font-bold mb-2">Note</label>
            <textarea name="note-text" id="editor" cols="30" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter text"></textarea>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
        </div>
    </form>
</x-note>

