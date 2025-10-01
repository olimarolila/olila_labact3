<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-4 py-2 
                bg-[#1a8dc3] border border-transparent rounded-md 
                font-semibold text-sm text-white uppercase tracking-widest 
                hover:bg-[#176fa1] focus:bg-[#176fa1] active:bg-[#145c80] 
                focus:outline-none focus:ring-2 focus:ring-[#1a8dc3] focus:ring-offset-2 
                disabled:opacity-50 transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
