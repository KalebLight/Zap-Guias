<div class="w-full">
    <div class="w-full border-t border-primary pt-2">
        <div class="mt-5">
            <div class="flex flex-row">
                <div>
                    <h4 class="text-primary font-medium underline text-right">Informações</h4>
                    <h4 class="text-primary font-medium leading-none underline text-right">Básicas</h4>
                </div>
                <div class="border-b border-primary w-full border-dashed border-width-2 border-dasharray-2-1"></div>
            </div>
            <div class="w-full">
                @php
                    $rowIndex = 0; 
                @endphp

                <!-- Linha Bio -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Bio:</div>
                    <div class="w-fit flex gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                            <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $item['bio'] ?? '—' }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp

                <!-- Linha Tipo -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Tipo:</div>
                    <div class="w-fit flex gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                            <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $item['model_type'] }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp

                <!-- Linha Cidade do Endereço -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Cidade do Endereço:</div>
                    <div class="flex w-fit gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                            <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $item['cidade'] ?? '—' }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp

                <!-- Linha Atividade -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Atividade:</div>
                    <div class="flex w-fit gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                            <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $item['atividade'] ?? '—' }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp

                <!-- Linha Idiomas Falados -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Idiomas Falados:</div>
                    <div class="flex w-fit gap-2 py-2 mx-auto  {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                            <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $item['idiomas'] ?? '—' }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



        <!-- INFORMAÇÕES ADICIONAIS -->
        <div class="mt-5">
            <div class="flex flex-row">
                <div>
                    <h4 class="text-primary font-medium underline text-right">Informações</h4>
                    <h4 class="text-primary font-medium leading-none underline text-right">Adicionais</h4>
                </div>
                <div class="border-b border-primary w-full border-dashed border-width-2 border-dasharray-2-1"></div>
            </div>
            <div class="w-full">
                @php
                    $rowIndex = 0; // Contador para alternar as cores das linhas
                @endphp

                <!-- Linha de Preço -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Preço:</div>
                    <div class="flex w-fit gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                            <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $item['preco'] ?? '—' }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp

                <!-- Linha Formas de Pagamento -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Formas de Pagamento:</div>
                    <div class="flex w-fit gap-2 py-2 {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                            <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $item['formas_de_pagamento'] ?? '—' }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp

                <!-- Linha Funcionamento -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Funcionamento:</div>
                    <div class="flex w-fit gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                            <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">

                                {{ $item['funcionamento'] ?? '—' }}

                            </div>
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp


                <!-- CONTATO -->

            </div>
        </div>


        <!-- CONTATO -->

        <div class="mt-5">
            <div class="flex flex-row">
                <div>
                    <h4 class="text-primary font-medium underline text-right">Contato</h4>

                </div>
                <div class="border-b border-primary w-full border-dashed border-width-2 border-dasharray-2-1"></div>
            </div>
            <div class="w-full">
                @php
                    $rowIndex = 0; // Contador para alternar as cores das linhas
                @endphp

                <!-- Linha Telefone -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Telefone:</div>
                    <div class="flex w-fit gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                            <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">

                                {{ !empty($item['telefone']) ? $item['telefone'] : '—' }}

                            </div>
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp

                <!-- Linha Whatsapp -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Whatsapp:</div>
                    <div class="flex w-fit gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                                                @php
                                                    $whatsappLink = !empty($item['whatsapp']) ? 'https://wa.me/' . $item['whatsapp'] : null;
                                                @endphp

                                                @if ($whatsappLink)
                                                    <a href="{{ $whatsappLink }}" target="_blank" class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center cursor-pointer underline" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{ formataNumeroTelefone($item['whatsapp']) }}
                                                    </a>
                                                @else
                                                    <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{ formataNumeroTelefone($item['whatsapp']) }}
                                                    </div>
                                                @endif
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp

                <!-- Linha Instagram -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Instagram:</div>
                    <div class="flex w-fit gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                                                @php
                                                    $instagramUrl = !empty($item['instagram']) ? 'https://www.instagram.com/' . $item['instagram'] : null;
                                                @endphp
                                                @if ($instagramUrl)
                                                    <a href="{{ $instagramUrl }}" target="_blank" class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center cursor-pointer underline" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{ !empty($item['instagram']) ? $item['instagram'] : '—' }}
                                                    </a>
                                                @else
                                                    <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{ !empty($item['instagram']) ? $item['instagram'] : '—' }}
                                                    </div>
                                                @endif
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp


                <!-- Linha Facebook -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Facebook:</div>
                    <div class="flex w-fit gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                                                @php
                                                    $facebookUrl = !empty($item['facebook']) ? 'https://www.facebook.com/' . $item['facebook'] : null;
                                                @endphp
                                                @if ($facebookUrl)
                                                    <a href="{{ $facebookUrl }}" target="_blank" class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center cursor-pointer underline" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{ !empty($item['facebook']) ? $item['facebook'] : '—' }}
                                                    </a>
                                                @else
                                                    <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{ !empty($item['facebook']) ? $item['facebook'] : '—' }}
                                                    </div>
                                                @endif
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp

                <!-- Linha Site -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">Site:</div>
                    <div class="flex w-fit gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                                            @if (!empty($item['website']))
                                                                @php
                                                                    $websiteUrl = strpos($item['website'], 'http') === 0 ? $item['website'] : 'https://' . $item['website'];
                                                                @endphp
                                                                <a href="{{ $websiteUrl }}" target="_blank" class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center cursor-pointer underline" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                                    nada nao
                                                                </a>
                                            @else
                                                <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                    —
                                                </div>
                                            @endif
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp

                <!-- Linha E-mail -->
                <div class="w-full flex justify-center relative">
                    <div class="text-primary px-3 py-2 absolute left-8">E-mail:</div>
                    <div class="flex w-fit gap-2 py-2 mx-auto {{ $rowIndex % 2 === 0 ? 'bg-buttonPrimary' : 'bg-white' }}">
                        @foreach ($compareData as $item)
                            <div class="text-primary px-3 2xl:w-[266px] lg:w-[208px] w-[180px] text-ellipsis text-center" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">

                                {{ $item['email'] ?? '—' }}

                            </div>
                        @endforeach
                    </div>
                </div>
                @php $rowIndex++; @endphp
            </div>
        </div>
    </div>
</div>