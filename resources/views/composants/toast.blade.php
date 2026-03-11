{{-- Toast System --}}
<div
    x-data="{
        toasts: [],
        add(message, type = 'success') {
            const id = Date.now();
            this.toasts.push({ id, message, type });
            setTimeout(() => this.remove(id), 3500);
        },
        remove(id) {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }
    }"
    x-on:toast.window="add($event.detail.message, $event.detail.type)"
    class="fixed top-20 right-4 z-[999] flex flex-col gap-2 max-w-xs w-full"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-show="true"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-full"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-end="opacity-0 translate-x-full"
            :class="toast.type === 'success' 
                ? 'bg-white border-l-4 border-second' 
                : 'bg-white border-l-4 border-red-400'"
            class="flex items-center gap-3 px-4 py-3 rounded-lg shadow-lg w-full"
        >
            {{-- Icône --}}
            <i 
                :class="toast.type === 'success' ? 'ri-checkbox-circle-line text-second' : 'ri-close-circle-line text-red-400'"
                class="text-xl shrink-0"
            ></i>

            {{-- Message --}}
            <p class="text-sm text-first font-dmsans flex-1" x-text="toast.message"></p>

            {{-- Fermer --}}
            <button @click="remove(toast.id)" class="text-first/30 hover:text-first transition shrink-0">
                <i class="ri-close-line"></i>
            </button>
        </div>
    </template>
</div>