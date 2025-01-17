<?php

function formatarHorario($horarios)
{
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
