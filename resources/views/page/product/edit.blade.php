<x-app-layout>
  <x-slot:title>{{ __("Tambah Produk") }}</x-slot>
  <x-slot:content>
    <div class="my-10 container mx-auto w-[500px]">
      <form action="{{ route('product.update', $data->id) }}" enctype="multipart/form-data" method="POST" class="flex items-center flex-col p-8 gap-8 border-2 -tracking-tighter border-[#1C315E] rounded-lg">
        @method('PUT')
        @csrf
        <h1 class="text-4xl font-bold text-[#1C315E]">{{ __('Tambah Produk') }}</h1>
        <input value="{{ $data->nama }}" type="text" autocomplete="off" name="nama" placeholder="Nama Produk" class="border-2 w-full rounded-lg border-[#1C315E] p-5 placeholder:text-[#1C315E]">
        @error('nama')
          <p class="text-red-500 italic">{{ $message }}</p>
        @enderror
        <input value="{{ $data->harga }}" type="text" autocomplete="off" placeholder="harga" name="harga" class="border-2 w-full rounded-lg border-[#1C315E] p-5 placeholder:text-[#1C315E]">
        @error('harga')
          <p class="text-red-500 italic">{{ $message }}</p>
        @enderror
        <textarea placeholder="Deskripsi" autocomplete="off" name="deskripsi" class="border-2 w-full rounded-lg border-[#1C315E] p-5 placeholder:text-[#1C315E]">{{ $data->deskripsi }}</textarea>
        @error('deskripsi')
          <p class="text-red-500 italic">{{ $message }}</p>
        @enderror
        <input type="file" name="img" class="file:p-5 file:bg-[#1C315E] file:text-[#C0EEE4] file:border-none file:rounded-l-lg rounded-xl w-full border-2  border-[#1C315E]" value="{{ $data->img }}">
        @error('img')
          <p class="text-red-500 italic">{{ $message }}</p>
        @enderror
        <button class="py-2.5 px-5 hover:bg-[#1C315E] rounded-lg border-2 border-[#1C315E] text-[#1C315E] font-semibold hover:text-[#C0EEE4] transition duration-200">Submit</button>
      </form>
    </div>
  </x-slot>
</x-app-layout>