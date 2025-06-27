<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/togglemodal.js'])
    <title>Dokumentasi</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');</style>

</head>
<body class="bg-[#EFF2FB]">
    <script>
        function togglemodal(modalID) {
                const modal = document.getElementById(modalID);
                if (modal) {
                    modal.classList.toggle("hidden");
                }
            }

            function tampilForm() {
            const pilihan = document.getElementById('pilihan').value;
            const deskripsiKendala = document.getElementById('deskripsiKendala');

            if(pilihan === 'ada') {
                deskripsiKendala.classList.remove('hidden');
            } else {
                deskripsiKendala.classList.add('hidden');
            }
        }

    </script>
    
    <div class="flex">
        <aside class="h-screen bg-white w-[15rem]">
            <div class="mx-auto items-center flex flex-col translate-y-10">
                <img src="" alt="logo">
                <p class="font-semibold text-lg">Dokumentasi</p>
                <hr class="w-24 h-0.5 bg-black mt-8">
            </div>
    
            <div class="mt-20">
    
            <x-sidebar-item
            route="{{'/dashboard'}}"
            icon=""
            iconTitle="Beranda"/>
    
            <x-sidebar-item 
            route="{{'/dokumentasi'}}" 
            icon="" 
            iconTitle="Dokumentasi" />
    
            <x-sidebar-item 
            route="{{'/dashboard'}}" 
            icon="" 
            iconTitle="Projek" />
        </div>
        </aside>
    
        <main class=" p-8 flex-1 overflow-y-auto">
            <div>
                <div class="flex justify-between items-center mb-6">
                    <h1>Dokumentasi</h1>
                    <a href="" class="flex">
                        <img src="" alt="pfpicon">
                        <p>{{Auth::user()->name}}</p>
                    </a>
                </div>
    
                <hr class="w-[100%] h-0.5 bg-black">
    
                <div>
                    <div class="justify-center mx-auto flex mt-3">
                        <h1>{{\Carbon\Carbon::now()->format('d F Y')}}</h1>
                    </div>
    
                    <div class='mt-10'>
                        <div class="flex flex-col font-jakarta">
                            <h1 class="text-xl font-semibold">Dokumentasi</h1>
                            <div class="mt-3">
                                <table class="table-auto w-full text-left border-collapse">
                                    <thead class="bg-white">
                                        <tr>
                                            <th class="px-4 py-2">Judul</th>
                                            <th class="px-4 py-2">Kegiatan</th>
                                            <th class="px-4 py-2">Kendala</th>
                                            <th class="px-4 py-2">Deskripsi Kendala</th>
                                            <th class="px-4 py-2">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @forelse ($dokumentasi as $dokumentasis)
                                            <tr class="border-t">
                                                <td class="px-4 py-2">{{ $dokumentasis->judul ?? '-' }}</td>
                                                <td class="px-4 py-2">{{ $dokumentasis->kegiatan ?? '-' }}</td>
                                                <td class="px-4 py-2">{{ $dokumentasis->kendala ?? '-' }}</td>
                                                <td class="px-4 py-2">{{ $dokumentasis->deskripsi_kendala ?? '-' }}</td>
                                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($dokumentasis->tanggal)->format('d M Y') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-4">Belum ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                
                            </div>

                            <button onclick="togglemodal('tambahDokum')" class="px-4 py-2 bg-blue-500 text-white rounded mt-2">
                                Tambah Dokumentasi
                            </button>

                            <x-modal-form
                            id="tambahDokum"
                            title="Tambah Dokumentasi"
                            action="{{ route('dokumentasi.store') }}">
                        
                            <label for="" class="text-lg font-jakarta ">Judul Dokumentasi</label>
                            <input type="text"
                            name="judul"
                            class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan judul dokumentasi"
                            required>

                            <div class="mt-4">

                            <label for="" class="text-lg font-jakarta ">Nama Kegiatan</label>
                            <input type="kegiatan"
                            name="kegiatan"
                            class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Ngapain Aja Hari Ini?"
                            required>
                            </div>

                            <div class="mt-4" id="formKendala" ">
                                <label for="" class="text-lg font-jakarta flex flex-col">Apa ada Kendala ?</label>
                                <select 
                                name="kendala" 
                                id="pilihan" 
                                onchange="tampilForm()" 
                                class="rounded-xl">
                                    <option value="tidak ada">Tidak Ada</option>
                                    <option value="ada">Ada</option>
                                </select>
                            </div>

                            <div class="mt-4 hidden" id="deskripsiKendala">
                                <label for="" class="text-lg font-jakarta">Deskripsi Kendala</label>
                                <input type="text"
                                name="deskripsi_kendala"
                                class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Kalo Ada Kendala, Deskripsikan Disini"
                                >
                            </div>

                            <div class="mt-4">

                            <label for="" class="text-lg font-jakarta ">Tanggal</label>
                            <input type="date"
                            name="tanggal"
                            class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>

                            
                            </x-modal-form>
                            </div>
                            
                    </div>
                    
                </div>
            </div>
        </main>
    </div>
</body>


</html>
