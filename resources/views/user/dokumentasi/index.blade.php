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
                                <table class="justify-center">
                                    <thead>
                                        <tr class="bg-white w-[65rem] h-14 flex gap-40 items-center justify-center rounded-xl">
                                            <div class="justify-center">
                                                <th>Judul</th>
                                                <th>Kegiatan</th>
                                                <th>Kendala</th>
                                                <th>Deskripsi Kendala</th>
                                                <th>Tanggal</th>
                                            </div>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white -translate-y-2">
                                        @forelse ($dokumentasi as $dokumentasis)
                                            <tr>
                                                <tr>{{$dokumentasis->judul ?? '-'}}</tr>
                                                <tr>{{$dokumentasis->kegiatan ?? '-'}}</tr>
                                                <tr>{{$dokumentasis->kendala ?? '-'}}</tr>
                                                <tr>{{$dokumentasis->deskripsi_kendala ?? '-'}}</tr>
                                                <tr>{{$dokumentasis->tanggal->format('d M y')}}</tr>
                                            </tr>
                                        @empty
                                        <tr><td colspan="4" class="text-center py-4">Belum ada data</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <button onclick="togglemodal('modalPemasukan')" class="px-4 py-2 bg-blue-500 text-white rounded">
                                Tambah Dokumentasi
                            </button>
                            
                            <x-modal-form 
                            id="modalPemasukan" 
                            title="Tambah Dokumentasi" 
                            action="{{ route('dokumentasi.store') }}"
                            >
                                <div class="mb-4">
                                    <label for="judul" class="block mb-1">Judul</label>
                                    <input 
                                    type="text" 
                                    title="judul" 
                                    id="judul" 
                                    class="border w-full p-2 rounded">
                                </div>
                                <div class="mb-4">
                                    <label for="kegiatan" class="block mb-1">Kegiatan</label>
                                    <input type="text" name="kegiatan" id="kegiatan" class="border w-full p-2 rounded">
                                </div>
                                <div class="mb-4">
                                    <label for="kendala" class="block mb-1">Kendala</label>
                                    <input type="text" name="kendala" id="kendala" class="border w-full p-2 rounded">
                                </div>
                                <div class="mb-4">
                                    <label for="deskripsi_kendala" class="block mb-1">Deskripsi Kendala</label>
                                    <textarea name="deskripsi_kendala" id="deskripsi_kendala" class="border w-full p-2 rounded"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="tanggal" class="block mb-1">Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal" class="border w-full p-2 rounded">
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
