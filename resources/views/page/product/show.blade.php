<x-app-layout>
  <x-slot:title>{{ __('Home') }}</x-slot>
  <x-slot:content>
    <div class="container mx-auto my-[4.5rem]">
      <div class="flex items-center justify-between">
        <div class="w-1/2">
          <img src="{{ asset('img/' . $data->img) }}" class="w-full object-contain"/>
        </div>
        <div class="text-[#1C315E] px-5 gap-3 flex flex-col w-1/2">
          <h1 class="text-2xl font-bold">{{ $data->nama }}</h1>
          <h3 class="text-lg font-semibold">harga: {{ $data->harga }}</h3>
          <p>{{ $data->deskripsi }}</p>
          <form action="{{ route('product.destroy', $data->id) }}" method="POST" class="flex items-center justify-center gap-5">
            @csrf
            @method("delete")
            <a href="{{ route('product.edit', $data->id) }}" class="p-3 border-2 border-[#1C315E] hover:bg-[#1C315E] hover:text-[#C0EEE4] text-[#1C315E] rounded-lg transition duration-200">Edit</a>
            <button type="submit" class="p-3 border-2 border-[#1C315E] hover:bg-[#1C315E] hover:text-[#C0EEE4] text-[#1C315E] rounded-lg transition duration-200">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>