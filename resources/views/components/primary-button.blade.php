<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-block w-75 mt-4']) }}>
    {{ $slot }}
</button>