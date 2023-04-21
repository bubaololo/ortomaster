<div>
    <input type="file" wire:model="photo" accept="image/*" capture>
    <div wire:loading wire:target="photo">
        Uploading photo...
    </div>
</div>
