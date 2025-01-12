<?php

function formatarHorario($horarios)
{
  $diasSemana = ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo'];
  $horariosFormatados = [];
  $diasConsecutivos = [];

  foreach ($horarios as $dia => $horario) {
    if (!$horario['active']) {
      continue;
    }

    $diasConsecutivos[] = [
      'dia' => $dia,
      'from' => $horario['from'],
      'to' => $horario['to'],
    ];
  }

  $gruposConsecutivos = [];
  $grupoAtual = [];

  foreach ($diasConsecutivos as $diaConsecutivo) {
    if (empty($grupoAtual) || ($grupoAtual[count($grupoAtual) - 1]['from'] == $diaConsecutivo['from'] && $grupoAtual[count($grupoAtual) - 1]['to'] == $diaConsecutivo['to'])) {
      $grupoAtual[] = $diaConsecutivo;
    } else {
      $gruposConsecutivos[] = $grupoAtual;
      $grupoAtual = [$diaConsecutivo];
    }
  }

  if (!empty($grupoAtual)) {
    $gruposConsecutivos[] = $grupoAtual;
  }

  foreach ($gruposConsecutivos as $grupo) {
    $primeiroDia = $grupo[0]['dia'];
    $ultimoDia = $grupo[count($grupo) - 1]['dia'];
    $horario = $grupo[0]['from'] . ' - ' . $grupo[0]['to'];

    $horariosFormatados[] = [
      'dias' => abbreviarDias($primeiroDia, $ultimoDia),
      'horario' => $horario,
    ];
  }

  return $horariosFormatados;
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

  if ($primeiroDia == $ultimoDia) {
    return $primeiroDia;
  } else {
    return $primeiroDia . ' - ' . $ultimoDia;
  }
}




