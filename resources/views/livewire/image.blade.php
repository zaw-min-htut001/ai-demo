<div class="flex w-full max-w-3xl bg-base-200 p-8 mx-auto my-12">
    <div class="basis-2/5">
        <h1 class="text-lg mb-7">Generate images</h1>

        <form wire:keydown.enter="generate" wire:submit='generate'>
            <textarea wire:model='description' class="textarea w-full textarea-bordered" placeholder="Generate your own image..."></textarea>
            <button wire:loading.attr="disabled" class="btn btn-sm btn-accent float-end">Generate</button>
        </form>
    </div>
    <div class="divider lg:divider-horizontal"></div>

    <div class="basis-3/5">
        <div wire:loading.block>
            <p>
                <span class="loading loading-spinner text-accent loading-xs"></span>
                Please wait a second...</p>
        </div>

        @if($images)
            <img src="{{ $images }}" >
        @else
        <div wire:loading.remove>
            <h1 class="text-md mb-7">No image yet !</h1>
        </div>
        @endif

    </div>
</div>
