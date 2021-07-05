<div class="mb-6" style="display: none">
    <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="{{$fieldName}}">
        My Name
    </label>

    <input class="border border-gray-400 p-2 w-full"
           type="text"
           name="{{$fieldName}}"
           id="{{$fieldName}}"
    >
</div>

<div class="mb-6" style="display: none">
    <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="{{$fieldTimeName}}">
        My Time
    </label>

    <input class="border border-gray-400 p-2 w-full"
           type="text"
           name="{{$fieldTimeName}}"
           id="{{$fieldTimeName}}"
           value="{{ microtime(true) }}"
    >
</div>
