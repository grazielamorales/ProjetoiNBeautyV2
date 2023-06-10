 $idReserva = $_GET['idReserva'];
            $data = $_GET['data'];
            $idPrestador = $_GET['idPrestador'];

            $reservaDAO = new ReservaDAO($this->param);
            $agendamentos = array_column($reservaDAO->getHorarios($idReserva, $data, $idPrestador), "HoraReserva");

            $prestadorDAO = new PrestadorDAO($this->param);
            $TempoEstimadoProcedimento = $prestadorDAO->getTempoEstimado($idPrestador);
            var_dump($TempoEstimadoProcedimento);
            $horario = "08:00:00";
            $fechamento = "19:00:00";            
            $TempoEstimadoProcedimento = explode(':', $TempoEstimadoProcedimento);
            $TempoEstimadoProcedimento = ((int)$TempoEstimadoProcedimento[0] * 60) + $TempoEstimadoProcedimento[1];
            $horarios = array();//horarios disponiveis p/ agendamento

            while ($horario < $fechamento) {
                if (!in_array($horario, $agendamentos)) {
                    $horarios[]=$horario;
                }

                $hora = explode(":", $horario);
                $horas = $hora[0] * 60;
                $minutos = $horas + $hora[1];

                $tempoFinal = $TempoEstimadoProcedimento + $minutos;
                $horaFinal = floor($tempoFinal / 60);
                $minutoFinal = $tempoFinal - ($horaFinal * 60);

                $tempoFinal = str_pad($horaFinal, 2, '0', STR_PAD_LEFT) . ':' . str_pad($minutoFinal, 2, '0', STR_PAD_LEFT) . ':00';

                $horario = $tempoFinal;
            }
            echo json_encode($horarios);