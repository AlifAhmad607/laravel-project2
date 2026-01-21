<div>
    <a {{ $attributes }} aria-current="page" class=" {{ $active ? "bg-gray-950/50 text-white" : "text-gray-300 hover:bg-white/5 hover:text-white"}} block rounded-md px-3 py-2 text-base font-medium">{{ $slot }}</a>
</div>
