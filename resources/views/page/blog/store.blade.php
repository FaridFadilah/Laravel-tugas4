<x-app-layout>
  <x-slot:title>{{ __("Tambah Produk") }}</x-slot>
  <x-slot:content>
    <div class="my-10 container mx-auto w-[700px]">
      <form action="{{ route('blog.store') }}" enctype="multipart/form-data" method="POST" class="flex items-center flex-col p-8 gap-8 border-2 -tracking-tighter border-[#1C315E] rounded-lg">
        @csrf
        <h1 class="text-4xl font-bold text-[#1C315E]">{{ __('Tambah Blog') }}</h1>
        <input type="text" autocomplete="off" name="nama" placeholder="Nama Blog" class="border-2 w-full rounded-lg border-[#1C315E] p-5 placeholder:text-[#1C315E]">
        @error('nama')
        <p class="text-red-500 italic">{{ $message }}</p>
        @enderror
        <input type="text" autocomplete="off" name="slug" placeholder="kata pengantar" class="border-2 w-full rounded-lg border-[#1C315E] p-5 placeholder:text-[#1C315E]">
        @error('slug')
        <p class="text-red-500 italic">{{ $message }}</p>
        @enderror
        <input type="hidden" name="isi" id="isi" >
        <trix-editor input='isi' class="w-full border-2 border-[#1C315E] rounded-lg">

        </trix-editor>
        @error('isi')
        <p class="text-red-500 italic">{{ $message }}</p>
        @enderror
        {{-- <textarea  placeholder="Deskripsi" autocomplete="off" name="isi" class="border-2 w-full rounded-lg border-[#1C315E] p-5 placeholder:text-[#1C315E]"></textarea> --}}
        <input type="file" placeholder="Nama Produk" name="img" class="file:p-5 file:bg-[#1C315E] file:text-[#C0EEE4] file:border-none file:rounded-l-lg rounded-xl w-full border-2  border-[#1C315E]">
        @error('img')
          <p class="text-red-500 italic">{{ $message }}</p>
        @enderror
        <button type="submit" class="py-2.5 px-5 hover:bg-[#1C315E] rounded-lg border-2 border-[#1C315E] text-[#1C315E] font-semibold hover:text-[#C0EEE4] transition duration-200">Submit</button>
      </form>
    </div>
  </x-slot>
</x-app-layout>