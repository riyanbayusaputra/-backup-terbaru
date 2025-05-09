<!-- Main Container -->
<div class="max-w-[480px] mx-auto bg-white min-h-screen relative shadow-lg pb-[70px]">
    <!-- Banner -->
    <div class="h-[180px] relative overflow-hidden bg-gradient-to-br from-primary to-secondary rounded-b-3xl">
        @if($store->bannerUrl)
            <img src="{{ $store->bannerUrl }}" alt="Banner" class="w-full h-full object-cover">
        @endif
        <div class="absolute inset-0 opacity-50 pattern-dots"></div>
    </div>

    <!-- Profile Section -->
    <div class="px-5 relative -mt-20">
        <div class="flex justify-center">
            <div class="w-[140px] h-[140px] bg-white rounded-full flex items-center justify-center shadow-lg transform rotate-[10deg]">
                <img src="{{ $store->imageUrl ?? asset('image/store.png') }}" alt="Store" 
                     class="w-[100px] h-[100px] transform -rotate-[10deg]">
            </div>
        </div>
        <h4 class="mt-4 mb-1 text-gray-800 font-bold text-2xl text-center">{{ $store->name }}</h4>
        <p class="text-gray-600 text-base text-center">{{ $store->description }}</p>
    </div>

    <!-- Navigation Tabs -->
    <div class="mt-6 px-2.5 overflow-x-auto hide-scrollbar">
        <div class="flex gap-3 pb-3 whitespace-nowrap">
            <button wire:click="setCategory('all')" 
                    class="px-8 h-12 flex items-center rounded-full transition-colors border {{ $selectedCategory === 'all' ? 'bg-primary text-white border-primary' : 'text-gray-700 border-gray-300 hover:border-primary hover:text-primary' }}">
                Semua
            </button>
            
            @foreach ($categories as $category)
                <button wire:click="setCategory('{{ $category->id }}')"
                        class="px-8 h-12 flex items-center rounded-full transition-colors border {{ $selectedCategory == $category->id ? 'bg-primary text-white border-primary' : 'text-gray-700 border-gray-300 hover:border-primary hover:text-primary' }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- <!-- Call to Action -->
    <div class="my-6 px-4 text-center">
        <h2 class="text-xl font-semibold text-primary">Discover the Latest Trends!</h2>
        <p class="mt-2 text-gray-600">Explore our collection and find your perfect style.</p>
        <button class="mt-4 px-6 py-2 bg-primary text-white rounded-full hover:bg-primary/90 transition-colors">
            Shop Now
        </button>
    </div> --}}

    <div class="p-3">
        @if($products->isEmpty())
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-12 px-4">
                <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                    <i class="bi bi-bag-x text-4xl text-primary"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Produk</h3>
                <p class="text-gray-500 text-center text-sm">
                    @if($selectedCategory !== 'all')
                        Belum ada produk dalam kategori ini
                    @else
                        Toko belum menambahkan produk apapun
                    @endif
                </p>
            </div>
        @else
            <div class="grid grid-cols-2 gap-4">
                @foreach($products as $item)
                <div class="bg-white rounded-2xl overflow-hidden  shadow-inner shadow-black/60 hover:-translate-y-1 transition-transform duration-300">
                    <a href="{{ route('product.detail', ['slug' => $item->slug]) }}" wire:navigate>
                        <div class="relative">
                            <img src="{{ $item->first_image_url ?? asset('image/no-pictures.png') }}" 
                                 alt="{{$item->name}}" 
                                 class="w-full h-[180px] object-cover ">
                        </div>
                        <div class="p-3">
                            <h6 class="text-sm font-bold text-gray-800 line-clamp-2">{{$item->name}}</h6>
                            <div class="mt-2 flex items-center gap-1">
                                <span class="text-xs text-gray-500">Rp</span>
                                <span class="text-primary font-bold">{{ number_format($item->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

