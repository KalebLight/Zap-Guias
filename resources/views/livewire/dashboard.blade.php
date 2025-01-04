<table class="table-auto w-full border-collapse border border-gray-300">
    <thead>
        <tr>
            <th class="border border-gray-300 px-4 py-2">ID</th>
            <th class="border border-gray-300 px-4 py-2">Nome Fantasia</th>
            <th class="border border-gray-300 px-4 py-2">Tipo</th>
            <th class="border border-gray-300 px-4 py-2">CNPJ</th>
        </tr>
    </thead>
    <tbody>
        @forelse($partners as $partner)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $partner->id }}</td>
                <td>
                    <a href="{{ route('partner.profile', ['slug' => $partner->slug]) }}">
                        {{  $partner->nome_fantasia ?? 'N/A' }}
                    </a>
                </td>

                <td class="border border-gray-300 px-4 py-2">{{ class_basename($partner) }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $partner->cnpj ?? 'N/A' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center border border-gray-300 px-4 py-2">Nenhuma empresa encontrada.</td>
            </tr>
        @endforelse
    </tbody>
</table>