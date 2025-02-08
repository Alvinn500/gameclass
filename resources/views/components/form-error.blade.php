@props(['name'])

@error($name)
    <p class="text-xs font-semibold text-red-400 my-1">{{$message}}</p>
@enderror