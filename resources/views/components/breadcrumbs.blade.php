<nav class="bg-main shadow-md py-2.5 px-4 rounded-lg mb-4">
    <ul class="flex gap-2">
        @foreach ($breadcrumbs as $breadcrumb)
            <li class="text-secondary text-xs sm:text-sm">
                @if (isset($breadcrumb["link"]))
                    <a href="{{ $breadcrumb["link"] }}" class="text-breadcrumb font-medium">{{ $breadcrumb["name"]}}</a>
                @else
                    {{$breadcrumb["name"]}}
                @endif    
                @if (!$loop->last)
                    <span class="ml-1">/</span>
                @endif
            </li>                
        @endforeach
    </ul>
</nav>