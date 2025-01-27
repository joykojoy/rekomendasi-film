<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Advance Search') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-4">
        <div class="flex justify-center">
            <div class="w-full md:w-2/3">
                <div class="bg-gray-800 text-white rounded-lg shadow-md">
                    <div class="bg-blue-600 p-4 rounded-t-lg text-center">
                        <h3 class="text-lg font-semibold">Advance Search</h3>
                    </div>
                    <div class="p-6">
                        <form method="GET" action="{{ route('films.advance-search') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="search" class="block text-sm font-medium text-gray-200">Search</label>
                                <input 
                                    type="text" 
                                    id="search" 
                                    name="search" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300" 
                                    value="{{ old('search') }}" 
                                    placeholder="Enter film title or keyword">
                            </div>

                            <div class="mb-4">
                                <label for="sort_by_update" class="block text-sm font-medium text-gray-200">Sort by update</label>
                                <select id="sort_by_update" name="sort_by_update" class="mt-1 block w-full rounded-md dark:bg-gray-700 dark:text-gray-300">
                                    <option value="">Pilih</option>
                                    <option value="desc">Terbaru</option>
                                    <option value="asc">Terlama</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="sort_by_rating" class="block text-sm font-medium text-gray-200">Sort by rating</label>
                                <select id="sort_by_rating" name="sort_by_rating" class="mt-1 block w-full rounded-md dark:bg-gray-700 dark:text-gray-300">
                                    <option value="">Pilih</option>
                                    <option value="desc">Tertinggi</option>
                                    <option value="asc">Terendah</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="sort_by_relevance" class="block text-sm font-medium text-gray-200">Sort by relevance</label>
                                <select id="sort_by_relevance" name="sort_by_relevance" class="mt-1 block w-full rounded-md dark:bg-gray-700 dark:text-gray-300">
                                    <option value="">Pilih</option>
                                    <option value="desc">Tertinggi</option>
                                    <option value="asc">Terendah</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Search</button>
                        </form>

                        @if ($films->count() > 0)
                            <h2 class="mt-6 text-xl font-semibold">Search Results</h2>
                            <table class="w-full mt-4 table-auto text-gray-200">
                                <thead class="bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-2">No</th>
                                        <th class="px-4 py-2">Judul</th>
                                        <th class="px-4 py-2">Deskripsi</th>
                                        <th class="px-4 py-2">Genre</th>
                                        <th class="px-4 py-2">Rating</th>
                                        <th class="px-4 py-2">Sinopsis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($films as $film)
                                        <tr 
                                            class="bg-gray-800 border-b border-gray-700 hover:bg-gray-700 cursor-pointer" 
                                            onclick="window.location='{{ route('films.display', $film->id) }}'">
                                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2">{{ $film->title }}</td>
                                            <td class="px-4 py-2">{{ $film->description }}</td>
                                            <td class="px-4 py-2">{{ $film->genre }}</td>
                                            <td class="px-4 py-2">{{ $film->rating }}</td>
                                            <td class="px-4 py-2">{{ $film->sinopsis }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $films->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
