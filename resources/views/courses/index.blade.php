<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Mata Kuliah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">

                {{-- Filter Section --}}
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <form action="{{ url('/courses') }}" method="GET">
                        <div class="flex flex-wrap items-center gap-4"> 
                            <label for="semester_id" class="font-semibold text-gray-700 dark:text-gray-300">
                                <i class="fas fa-filter text-blue-500 mr-2"></i>Filter Semester:
                            </label>

                            <select name="semester_id" id="semester_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" onchange="this.form.submit()">
                                <option value="">Semua Semester</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester }}" {{ $selectedSemesterId == $semester ? 'selected' : '' }}>
                                        Semester {{ $semester }}
                                    </option>
                                @endforeach
                            </select>

                            @if($selectedSemesterId)
                                <a href="{{ url('/courses') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                    <i class="fas fa-times mr-1"></i>Reset
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                {{-- Search Section --}}
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <form action="{{ url('/courses') }}" method="GET">
                        <div class="flex flex-wrap items-center gap-4">
                             <label for="search_id" class="font-semibold text-gray-700 dark:text-gray-300">
                                <i class="fas fa-magnifying-glass text-blue-500 mr-2"></i>Cari Mata Kuliah:
                            </label>
                            <div class="flex-grow max-w-lg">
                                <div class="flex rounded-md shadow-sm">
                                    <input type="text" name="search" id="search_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-none rounded-l-md flex-1 block w-full" placeholder="Cari nama mata kuliah..." value="{{ $searchQuery }}">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-r-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </div>

                        @if ($data_courses->isEmpty() && isset($searchQuery))
                        <div class="mt-4 p-4 bg-yellow-100 border-l-4 border-yellow-400 text-yellow-700">
                            <p>Tidak ada mata kuliah yang ditemukan.</p>
                        </div>
                        @endif
                    </form>
                </div>

                {{-- Content Section (Tabel) --}}
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                    <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-center">
                            <h5 class="font-semibold text-lg text-gray-800 dark:text-gray-200">
                                <i class="fas fa-book mr-2"></i>
                                @if($selectedSemesterId)
                                    Mata Kuliah Semester {{ $selectedSemesterId }}
                                @else
                                    Semua Mata Kuliah
                                @endif
                            </h5>
                            <a href="{{ route('courses.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <i class="fas fa-plus mr-1"></i>Tambah Mata Kuliah
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                @if(count($data_courses) > 0)
                                <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No.</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Semester</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kode</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Mata Kuliah</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Deskripsi</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Harga</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach ($data_courses as $index => $course)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                            {{ $course->semester_id }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-800 dark:text-gray-200">{{ $course->course_code }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $course->course_name }}</td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 max-w-xs truncate">{{ Str::limit($course->description, 100) }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-green-600">{{ "Rp. ".number_format($course->harga, 0, ',', '.')}}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        <div class="flex items-center space-x-2">
                                                            <a href="{{ route('courses.edit', $course->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-100">Edit</a>
                                                            <form action="{{ route('courses.destroy', $course->id) }}" method="post" onsubmit="return confirm('Yakin ingin dihapus?')">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-100">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="text-center py-12">
                                    <i class="fas fa-book-open text-gray-400 text-4xl mb-3"></i>
                                    <h5 class="text-lg font-medium text-gray-700 dark:text-gray-300">Tidak ada mata kuliah</h5>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada mata kuliah yang tersedia untuk semester yang dipilih.</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Statistics Section --}}
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-blue-600 text-white rounded-t-lg">
                        <h5 class="font-semibold text-lg">
                            <i class="fas fa-chart-bar mr-2"></i>Statistik Mata Kuliah
                        </h5>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                            <li class="flex justify-between"><strong>Total Mata Kuliah:</strong> <span>{{ $totalCourses }}</span></li>
                            <li class="flex justify-between"><strong>Total Harga:</strong> <span>Rp. {{ number_format($totalHarga, 0, ',', '.') }}</span></li>
                            <li class="flex justify-between"><strong>Harga Tertinggi:</strong> <span>Rp. {{ number_format($hargaTertinggi, 0, ',', '.') }}</span></li>
                            <li class="flex justify-between"><strong>Harga Terendah:</strong> <span>Rp. {{ number_format($hargaTerendah, 0, ',', '.') }}</span></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>