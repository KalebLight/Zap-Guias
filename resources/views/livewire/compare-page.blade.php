<div class="w-full flex justify-center">
    <div class="w-[90%] border-t border-primary pt-2">
        <div class="mt-5">

            <!-- INFORMAÇÕES BÁSICAS  -->
            <div class="w-full h-full overflow-x-auto">
                <div class="flex flex-row">
                    <div class="w-[150px] flex-shrink-0">
                        <h4 class="text-primary font-medium underline text-right">Informações</h4>
                        <h4 class="text-primary font-medium leading-none underline text-right">Básicas</h4>
                    </div>

                </div>
                <table class="w-full table-auto">
                    <tbody>
                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Bio:</td>
                            @foreach ($compareData as $item)
                                <td class="text-primary bg-buttonPrimary px-3 flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center  border-t border-primary border-dashed border-width-2 border-dasharray-2-1 compare-cel">
                                    {{ $item['bio'] ?? '—' }}
                                </td>
                            @endforeach
                        </tr>
                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Tipo:</td>
                            @foreach ($compareData as $item)
                                <td class="text-primary px-3  flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center compare-cel">
                                    {{ $item['model_type'] }}
                                </td>
                            @endforeach
                        </tr>
                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Cidade:</td>
                            @foreach ($compareData as $item)
                                <td class="text-primary px-3 bg-buttonPrimary flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center compare-cel">
                                    {{ $item['cidade'] ?? '—'  }}
                                </td>
                            @endforeach
                        </tr>
                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Idiomas Falados:</td>
                            @foreach ($compareData as $item)
                                <td class="text-primary px-3 flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center compare-cel">
                                    {{ $item['idiomas'] ?? '—' }}
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>

                <!-- INFORMAÇÕES ADICIONAIS -->
                <div class="flex flex-row">
                    <div class="w-[150px] flex-shrink-0">
                        <h4 class="text-primary font-medium underline text-right">Informações</h4>
                        <h4 class="text-primary font-medium leading-none underline text-right">Adicionais</h4>
                    </div>

                </div>
                <table class="w-full table-auto">
                    <tbody>
                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Preço:</td>
                            @foreach ($compareData as $item)
                                <td class="text-primary bg-buttonPrimary px-3 flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center  border-t border-primary border-dashed border-width-2 border-dasharray-2-1 compare-cel">
                                    {{ $item['preco'] ?? '—' }}
                                </td>
                            @endforeach
                        </tr>

                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Funcionamento:</td>
                            @foreach ($compareData as $item)
                                <td class="text-primary px-3  flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center compare-cel">
                                    {{ $item['funcionamento'] ?? '—' }}
                                </td>
                            @endforeach
                        </tr>

                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Formas de Pagamento:</td>
                            @foreach ($compareData as $item)
                                <td class="text-primary bg-buttonPrimary px-3 flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center compare-cel">
                                    {{ $item['formas_de_pagamento'] ?? '—' }}
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>

                <!-- CONTATO -->
                <div class="flex flex-row">
                    <div class="w-[150px] flex-shrink-0">
                        <h4 class="text-primary font-medium underline text-right">Contato</h4>

                    </div>

                </div>
                <table class="w-full table-auto">
                    <tbody>
                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Telefone:</td>
                            @foreach ($compareData as $item)
                                <td class="text-primary px-3 flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center border-t border-primary border-dashed border-width-2 border-dasharray-2-1 compare-cel">
                                    {{ !empty($item['telefone']) ? $item['telefone'] : '—' }}
                                </td>
                            @endforeach
                        </tr>

                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Whatsapp:</td>
                            @foreach ($compareData as $item)
                                                        <td class="text-primary bg-buttonPrimary px-3 flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center compare-cel">
                                                            @php
                                                                $numeroFormatado = formataNumeroTelefone($item['whatsapp']);
                                                                $whatsappLink = ($numeroFormatado !== '—') ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $item['whatsapp']) : null;
                                                            @endphp

                                                            @if ($whatsappLink)
                                                                <a href="{{ $whatsappLink }}" target="_blank" class="text-primary underline">
                                                                    {{ $numeroFormatado }}
                                                                </a>
                                                            @else
                                                                {{ $numeroFormatado }}
                                                            @endif
                                                        </td>
                            @endforeach
                        </tr>

                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Instagram:</td>
                            @foreach ($compareData as $item)
                                                        @php
                                                            $instagramUsername = $item['instagram'] ?? '—';
                                                            $instagramUsernameShow = '@' . $item['instagram'] ?? '—';
                                                            $instagramUrl = ($instagramUsername !== '—') ? 'https://www.instagram.com/' . $instagramUsername : null;
                                                        @endphp

                                                        <td class="text-primary px-3 flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center compare-cel">
                                                            @if ($instagramUrl)
                                                                <a href="{{ $instagramUrl }}" target="_blank" class="text-primary underline">
                                                                    {{ $instagramUsernameShow }}
                                                                </a>
                                                            @else
                                                                {{ $instagramUsername }}
                                                            @endif
                                                        </td>
                            @endforeach
                        </tr>
                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Facebook:</td>
                            @foreach ($compareData as $item)
                                                        @php
                                                            $facebookValue = $item['facebook'] ?? '—';
                                                            $facebookUrl = (!empty($facebookValue) && $facebookValue !== '—') ? (strpos($facebookValue, 'facebook.com') !== false ? $facebookValue : 'https://www.facebook.com/' . $facebookValue) : null;
                                                        @endphp

                                                        <td class="text-primary px-3 flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center compare-cel">
                                                            @if ($facebookUrl)
                                                                <a href="{{ $facebookUrl }}" target="_blank" class="text-primary underline">
                                                                    /{{ str_replace('https://www.facebook.com/', '', $facebookValue) }}
                                                                </a>
                                                            @else
                                                                {{ $facebookValue === '' ? '—' : $facebookValue }}
                                                            @endif
                                                        </td>
                            @endforeach
                        </tr>
                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">Site:</td>
                            @foreach ($compareData as $item)
                                                        @php
                                                            $websiteValue = $item['website'] ?? '—';
                                                            $websiteUrl = ($websiteValue !== '—' && !empty($websiteValue)) ? (strpos($websiteValue, 'http') === 0 ? $websiteValue : 'https://' . $websiteValue) : null;
                                                        @endphp

                                                        <td class="text-primary px-3 flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center compare-cel">
                                                            @if ($websiteUrl)
                                                                <a href="{{ $websiteUrl }}" target="_blank" class="text-primary underline">
                                                                    {{ $websiteValue }}
                                                                </a>
                                                            @else
                                                                {{ empty($websiteValue) ? '—' : $websiteValue }}
                                                            @endif
                                                        </td>
                            @endforeach
                        </tr>

                        <tr class="flex">
                            <td class="text-primary px-3 py-2 w-[150px] flex-shrink-0 compare-cel-label">E-Mail:</td>
                            @foreach ($compareData as $item)
                                <td class="text-primary px-3 flex-1 2xl:w-[266px] lg:w-[208px] w-[180px] text-center compare-cel">
                                    {{ $item['email'] ?? '—' }}
                                </td>
                            @endforeach
                        </tr>

                    </tbody>
                </table>

                <!-- INFORMAÇÕES EMPRESARIAIS -->
                <div class="flex flex-row w-[150px] justify-end">


                    <img src="{{ asset('images/check-icon.svg') }}" alt="" class="w-9">
                    <div class="flex flex-col ml-2">
                        <h4 class="text-primary font-medium underline text-right">Informações</h4>
                        <h4 class="text-primary font-medium leading-none underline text-right">Empresariais</h4>
                    </div>


                </div>
                <table class="w-full table-auto">
                    <tbody>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>