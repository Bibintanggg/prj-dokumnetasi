<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-uB3F8W9fWZTzD9DqS1ZVG7mrMJj9TtD6iQqEyaZRLq+4kbbDxQ1V23KAG+Z3XpOgZDfIqkTVvXg+QxM1wVGf1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/datetime.js'])
    <title>Dashboard</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');</style>


</head>
<body class="bg-[#EFF2FB]">
    
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
                    <h1>Dashboard</h1>
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
                            <h1 class="text-xl font-semibold">Dashboard</h1>
                            <div class="flex gap-4">
                                <div class="w-[35rem] h-[17rem] bg-white mt-4 rounded-2xl flex">
                                    <div class="p-8 flex flex-col">
                                        <h1 id="waktu" class="text-base"></h1>
                                        <div class="flex flex-col">
                                            <p class="text-3xl font-semibold">Hi, {{ Auth::user()->name }}!</p>
                                            <h2 class="max-w-52 text-black/70 mt-2">
                                                Selamat beraktivitas hari ini jangan lupa senyum ^_^
                                            </h2>
                                            <h3 class="mt-2">Mau ngapain hari ini???</h3>
                    
                                            <div class="flex flex-col gap-2 mt-2">
                                                <a href="" class="flex items-center gap-3">
                                                    <div class="w-5 h-5 bg-black"></div>
                                                    <p class="text-sm text-blue-500 hover:text-blue-200 transition-all duration-200">
                                                        Cek Dokumentasi
                                                    </p>
                                                </a>
                                                <a href="" class="flex items-center gap-3">
                                                    <div class="w-5 h-5 bg-black"></div>
                                                    <p class="text-sm text-blue-500 hover:text-blue-200 transition-all duration-200">
                                                        Cek Dokumentasi
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-[20rem] h-[17rem] mt-4 rounded-2xl p-4">
                                    <p class="text-xl font-semibold">Notifikasi</p>
                                    <div class="">
                                        <div>
                                            <div class="space-y-4 mt-4">
                                                @forelse ($notifDokum as $notif)
                                                    <div class="flex items-center bg-white p-4 rounded-xl shadow gap-4"> 
                                                        <i class="fa-solid fa-user text-blue-500 text-xl"></i> 
                                                        <p class="text-xs flex-1 max-w-[20rem]">
                                                            {{ Auth::user()->name }} pada tanggal {{ \Carbon\Carbon::now()->format('Y-m-d') }} menambahkan dokumentasi baru
                                                        </p>
                                                    </div>
                                                @empty
                                                    <p class="text-gray-500 text-sm">Belum ada notifikasi.</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
    </div>
</body>


</html>
