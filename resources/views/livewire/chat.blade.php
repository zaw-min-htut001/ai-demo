<div
    x-data="{
        scrollToBottom() {
            this.$nextTick(() => {
                const el = document.getElementById('conversation');
                if (el) el.scrollTop = el.scrollHeight;
            });
        }
    }"
    x-init="scrollToBottom()"
    @scroll-bottom.window="scrollToBottom()"
    class="w-full max-w-3xl p-4 bg-white rounded-lg shadow-lg flex flex-col h-[80vh]">

    <!-- Chat Messages -->
    <div id="conversation" class="flex-1 overflow-y-auto p-4 space-y-4">
        <!-- User Message -->
        @foreach ($messages as $key => $message)
        @if($message['role'] === 'user')
        <div class="chat chat-end">
            <div class="chat-header">You</div>
            <div class="chat-bubble bg-accent text-accent-content">{{$message['content']}}</div>
        </div>
        @endif

        @if($message['role'] === 'assistant')
        <!-- AI Message -->
        <livewire:chat-response :key="$key" :messages="$this->messages" />
        @endif
        @endforeach
    </div>
    <!-- Loading Indicator -->
    <div class="absolute bottom-0 p-3" wire:loading>
        <p>
            <span class="loading loading-spinner text-accent loading-xs"></span>
            Loading response from bot...
        </p>
    </div>
    <!-- Input Area -->
    <div class="p-4 border-t bg-base-100">

        <form wire:keydown.enter="send" wire:submit.prevent="send">
            <div class="flex items-center gap-3">
                <textarea wire:model="body" placeholder="Ask me anything..."
                    class="textarea textarea-bordered w-full resize-none"></textarea>
                <button wire:loading.attr="disabled" class="btn btn-accent">Ask</button>
            </div>
        </form>
    </div>
</div>

