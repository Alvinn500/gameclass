@props(['name'])

@error($name)
    <p class="text-xs font-semibold text-red-500 mt-1">{{$message}}</p>
@enderror