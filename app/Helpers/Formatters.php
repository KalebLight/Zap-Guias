<?php

function formatSpecificData(array $data): array
{
  $map = [
    'unidades_habitacionais' => 'Unidades Habitacionais',
    'leitos' => 'Leitos',
    'uhs_acessiveis' => 'UHS Acessíveis',
    'leitos_acessiveis' => 'Leitos Acessíveis',
    'tipo_de_hospedagem' => 'Tipo de Hospedagem',
    'area_total_construida' => 'Área Total Construída m²',
    'area_locavel' => 'Área Locável m²',
    'tipo_de_eventos' => 'Tipo de Eventos',
    'capacidade_de_lugares' => 'Capacidade de Lugares',
    'tipo_da_estrutura_nautica' => 'Tipo da Estrutura Náutica',
    'capacidade' => 'Capacidade',
    'area_montagem' => 'Área de Montagem m²',
    'tipo_de_veiculos_aquaticos' => 'Tipo de Veículos Aquáticos',
    'tipo_de_veiculos_terrestre' => 'Tipo de Veículos Terrestres',
    'segmento' => 'Segmento',
    'categoria' => 'Categoria',
    'guia_motorista' => 'Guia Motorista',
    'municipio_de_atuacao' => 'Município de Atuação',
    'categoria_de_atuacao' => 'Categoria de Atuação',
    'atividades_obrigatorias' => 'Atividades Obrigatórias',
    'atividades_opcionais' => 'Atividades Opcionais',
    'segmentos_turisticos' => 'Segmentos Turísticos',
    'especialidade' => 'Especialidade',
    'quantidade_de_veiculos' => 'Quantidade de Veículos',
    'quantidade_de_embarcacoes' => 'Quantidade de Embarcações',
    'quantidade_de_cruzeiro_maritmo' => 'Quantidade de Cruzeiros Marítmos',
    'quantidade_de_cruzeiro_fluvial' => 'Quantidade de Cruzeiros Fluviais',
    'area_total_do_empreendimento' => 'Área Total do Empreendimento m²',
  ];

  $formattedData = [];
  foreach ($data as $key => $value) {
    $formattedKey = $map[strtolower($key)] ?? ucfirst($key);
    $formattedData[$formattedKey] = $value;
  }

  return $formattedData;
}


function getEspecialidade($class)
{
  switch ($class) {
    case 'Restaurante':
      return 'Culinária';
    default:
      return '';
  }
}

function getServicosLabel($class)
{
  switch ($class) {
    case 'Restaurante':
      return 'Menu';
    case 'MeioDeHospedagem':
      return 'Quartos';
    default:
      return 'Serviços';
  }
}

function addSpace($str)
{
  $resultado = '';
  for ($i = 0; $i < strlen($str); $i++) {
    if ($i > 0 && ctype_upper($str[$i])) {
      $resultado .= ' ';
    }
    $resultado .= $str[$i];
  }
  return $resultado;
}




function formatLabels(array $keys): array
{
  $map = [
    'unidades_habitacionais' => 'Unidades Habitacionais',
    'leitos' => 'Leitos',
    'uhs_acessiveis' => 'UHS Acessíveis',
    'leitos_acessiveis' => 'Leitos Acessíveis',
    'tipo_de_hospedagem' => 'Tipo de Hospedagem',
    'area_total_construida' => 'Área Total Construída: m2',
    'area_locavel' => 'Área Locável: m2',
    'tipo_de_eventos' => 'Tipo de Eventos',
    'capacidade_de_lugares' => 'Capacidade de Lugares',
    'tipo_da_estrutura_nautica' => 'Tipo da Estrutura Náutica',
    'capacidade' => 'Capacidade',
    'area_montagem' => 'Área de Montagem',
    'tipo_de_veiculos_aquaticos' => 'Tipo de Veículos Aquáticos',
    'tipo_de_veiculos_terrestre' => 'Tipo de Veículos Terrestres',
    'segmento' => 'Segmento',
    'categoria' => 'Categoria',
    'guia_motorista' => 'Guia Motorista',
    'municipio_de_atuacao' => 'Município de Atuação',
    'categoria_de_atuacao' => 'Categoria de Atuação',
    'atividades_obrigatorias' => 'Atividades Obrigatórias',
    'atividades_opcionais' => 'Atividades Opcionais',
    'segmentos_turisticos' => 'Segmentos Turísticos',
    'especialidade' => 'Especialidade',
    'quantidade_de_veiculos' => 'Quantidade de Veículos',
    'quantidade_de_embarcacoes' => 'Quantidade de Embarcações',
    'quantidade_de_cruzeiro_maritmo' => 'Quantidade de Cruzeiros Marítmos',
    'quantidade_de_cruzeiro_fluvial' => 'Quantidade de Cruzeiros Fluviais',
    'area_total_do_empreendimento' => 'Área Total do Empreendimento',
  ];

  return array_map(fn($key) => $map[$key] ?? ucfirst(str_replace('_', ' ', $key)), $keys);
}



function formatarHorario($horarios)
{
  if ($horarios == []) {

    return '-';
  }

  $diasSemana = ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo'];
  $horariosFormatados = [];
  $gruposConsecutivos = [];
  $grupoAtual = [];

  foreach ($diasSemana as $index => $dia) {
    if ($horarios[$dia]['active']) {
      $horarioAtual = [
        'dia' => $dia,
        'from' => $horarios[$dia]['from'],
        'to' => $horarios[$dia]['to'],
      ];

      if (empty($grupoAtual)) {
        $grupoAtual[] = $horarioAtual;
      } else {
        $ultimoDia = end($grupoAtual);
        $ultimoIndex = array_search($ultimoDia['dia'], $diasSemana);

        // Verifica se o horário é igual e se os dias são consecutivos
        if (
          $ultimoDia['from'] === $horarioAtual['from'] &&
          $ultimoDia['to'] === $horarioAtual['to'] &&
          $ultimoIndex + 1 === $index
        ) {
          $grupoAtual[] = $horarioAtual;
        } else {
          $gruposConsecutivos[] = $grupoAtual;
          $grupoAtual = [$horarioAtual];
        }
      }
    } else {
      if (!empty($grupoAtual)) {
        $gruposConsecutivos[] = $grupoAtual;
        $grupoAtual = [];
      }
    }
  }

  // Adiciona o último grupo se existir
  if (!empty($grupoAtual)) {
    $gruposConsecutivos[] = $grupoAtual;
  }

  // Formata os grupos
  foreach ($gruposConsecutivos as $grupo) {
    $primeiroDia = $grupo[0]['dia'];
    $ultimoDia = end($grupo)['dia'];
    $horario = $grupo[0]['from'] . ' - ' . $grupo[0]['to'];

    $horariosFormatados[] = [
      'dias' => abbreviarDias($primeiroDia, $ultimoDia),
      'horario' => $horario,
    ];
  }

  return $horariosFormatados;
}

function getIntervaloDeFuncionamento($json)
{
  $diasDaSemana = [
    'Segunda',
    'Terça',
    'Quarta',
    'Quinta',
    'Sexta',
    'Sábado',
    'Domingo'
  ];

  if ($json != null) {
    $diasAtivos = [];
    foreach ($json as $dia => $valor) {
      $diaSemSuffixo = str_replace('-feira', '', $dia);
      if ($valor['active']) {
        $diasAtivos[] = $diaSemSuffixo;
      }
    }

    if (empty($diasAtivos)) {
      return 'Fechado';
    }

    $intervalos = [];
    $intervaloAtual = [$diasAtivos[0]];
    for ($i = 1; $i < count($diasAtivos); $i++) {
      $indiceAtual = array_search($diasAtivos[$i], $diasDaSemana);
      $indiceAnterior = array_search($diasAtivos[$i - 1], $diasDaSemana);
      if ($indiceAtual - $indiceAnterior == 1) {
        $intervaloAtual[] = $diasAtivos[$i];
      } else {
        $intervalos[] = $intervaloAtual;
        $intervaloAtual = [$diasAtivos[$i]];
      }
    }
    $intervalos[] = $intervaloAtual;

    $resultados = [];
    foreach ($intervalos as $intervalo) {
      if (count($intervalo) == 1) {
        $resultados[] = $intervalo[0];
      } else {
        $resultados[] = $intervalo[0] . ' a ' . $intervalo[count($intervalo) - 1];
      }
    }

    return implode(' e ', $resultados);
  }
  return null;
}




function abbreviarDia($dia)
{
  $diasAbreviados = [
    'Segunda-feira' => 'Seg',
    'Terça-feira' => 'Ter',
    'Quarta-feira' => 'Qua',
    'Quinta-feira' => 'Qui',
    'Sexta-feira' => 'Sex',
    'Sábado' => 'Sáb',
    'Domingo' => 'Dom',
  ];

  return $diasAbreviados[$dia];
}

function abbreviarDias($primeiroDia, $ultimoDia)
{
  $primeiroDia = abbreviarDia($primeiroDia);
  $ultimoDia = abbreviarDia($ultimoDia);

  if ($primeiroDia === $ultimoDia) {
    return $primeiroDia;
  } else {
    return $primeiroDia . ' - ' . $ultimoDia;
  }
}



function formataFormasDePagamento(array $array): array
{
  return array_values(array_map(function ($key) {
    $key = str_replace(
      ['credito', 'pix', 'boleto', 'debito'],
      ['Crédito', 'Pix', 'Boleto', 'Débito'],
      $key
    );
    return mb_strtoupper(mb_substr($key, 0, 1)) . mb_substr($key, 1);
  }, array_keys($array)));
}



function formataNumeroTelefone($numero)
{
  if (empty($numero)) {
    return '—';
  }

  $numeroLimpo = preg_replace('/[^0-9]/', '', $numero);

  if (strlen($numeroLimpo) < 11) {
    return $numero;
  }

  return "+55 (" . substr($numeroLimpo, 2, 2) . ") " . substr($numeroLimpo, 4, 5) . "-" . substr($numeroLimpo, 9, 4);
}

