<div>
    <input wire:model="name" type="text" id="name" />
    <button wire:click="submit">Submit</button>
    @if($success)<div>Saved</div>@endif
    <h1>{{ $name }}</h1>
</div>
