<div class="border-2 border-[#1C315E] rounded-lg">
  <img src="{{ asset('img/' . $content->img) }}" class="object-cover rounded-t-lg w-[100%] h-[200px]" alt="">
  <div class="p-5 text-[#1C315E]">
    <a href="{{ $content->harga === null ? route('blog.show',$content->id) : route('product.show', $content->id) }}" class="text-xl font-medium hover:underline ">{{ $content->nama }}</a>
    <p>{{ $content->harga === null ? $content->slug : 'Harga : ' . $content->harga }}</p>
    <form method="POST" action="{{ $content->harga === null ? route('blog.destroy', $content->id)
      : route('product.destroy', $content->id) }}" class="flex items-center justify-between my-2">
      @method('delete')
      @csrf
      <a class="p-3 border-2 border-[#1C315E] hover:bg-[#1C315E] hover:text-[#C0EEE4] text-[#1C315E] rounded-lg transition duration-200" href="{{ $content->harga === null ? route('blog.edit', $content->id)
        : route('product.edit', $content->id) }}">Edit</a>
      <button type="submit" class="p-3 border-2 border-[#1C315E] hover:bg-[#1C315E] hover:text-[#C0EEE4] text-[#1C315E] rounded-lg transition duration-200">Hapus</button>
    </form>
  </div>
</div>