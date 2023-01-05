<div>
    <select x-data wire:model="selectedAnimal" name="animals"
        class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-80">
        <option value="" selected>Choose an Animal</option>
        @foreach ($listOfAnimals as $animal)
            <option key="{{ $animal }}" value="{{ $animal }}">{{ $animal }}</option>
        @endforeach
    </select>
    <div x-data class="max-w-sm">
        <livewire:components.select :selected="null" :items="$listOfAnimals" label="Choose your favorite Animal" />
    </div>
    <div x-data="{ open: false }" class="mt-5 flex justify-center relative">
        <button @click="open = !open" @click.outside="open = false"
            class="border border-gray-400 pl-2 pr-2 rounded-lg mb-3 hover:bg-slate-100">open</button>
        <p x-show="open" class="absolute right-80">hello</p>
    </div>
    <div x-data class="text-center mt-5">
        <div class="flex items-center justify-center gap-2">
            <button wire:click="increment" x-disabled="$wire.isCountLimit"
                class="@if ($isOnMaxLimit) bg-slate-200 hover:bg-slate-200 cursor-auto @endif border border-gray-400 pl-2 pr-2 rounded-lg mb-3">+</button>
            <button wire:click="decrement" x-disabled="$wire.isCountLimit"
                class="@if ($isOnMinLimit) bg-slate-200 hover:bg-slate-200 cursor-auto @endif border border-gray-400 pl-2 pr-2 rounded-lg mb-3">-</button>
        </div>
        <p x-text="$wire.count" class="@if ($isCountLimit) text-red-500 @endif"></p>
    </div>
</div>
