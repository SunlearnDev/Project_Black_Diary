@push('style')
    <style>
        .rotate-45 {
            --transform-rotate: 45deg;
            transform: rotate(45deg);
        }

        .group:hover .group-hover\:flex {
            display: flex;
        }
    </style>
@endpush

<div x-html="$store.chat.chatBox">
</div>
