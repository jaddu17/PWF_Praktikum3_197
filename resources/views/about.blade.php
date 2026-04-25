<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1f2937] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <div class="flex flex-col gap-2 text-lg">
                        <div>Nama : {{ Auth::user()->name }}</div>
                        <div>NIM : 20230140197</div>
                        <div>Program Studi : Teknologi Informasi</div>
                        <div>Hobi : Ngoding</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
