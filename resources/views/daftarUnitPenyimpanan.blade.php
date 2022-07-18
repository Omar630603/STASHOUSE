<x-guest-layout>
    <x-slot name="header"> </x-slot>
    <ul>
        @foreach ($units as $unit)
        <li>{{$unit->id}} - {{$unit->name}} - {{$unit->city}} - {{$unit->unitCategory->name}} -
            {{$unit->storageOwner->storage_name}} - {{$unit->assets->first()}}
        </li>
        @endforeach
    </ul>
    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                Daftar Unit Penyimpanan
            </div>
        </div>
    </div>
</x-guest-layout>