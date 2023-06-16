@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-blue-600']) }}>
    {{ $value ?? $slot }}
</label>
