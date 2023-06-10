<?php 
    Class Reserva{
        public function __construct(
            private $idReserva,
            private $DtReserva,
            private $HoraReserva,
            private $Procedimento,
            private $ValorProcedimento,
            private $idUsuario,
            private $idPrestador,
            private string $status = ""
          
        )
        {}   

        

            /**
             * Get the value of idReserva
             */
            public function getIdReserva()
            {
                        return $this->idReserva;
            }

            /**
             * Set the value of idReserva
             */
            public function setIdReserva($idReserva): self
            {
                        $this->idReserva = $idReserva;

                        return $this;
            }

            /**
             * Get the value of DtReserva
             */
            public function getDtReserva()
            {
                        return $this->DtReserva;
            }

            /**
             * Set the value of DtReserva
             */
            public function setDtReserva($DtReserva): self
            {
                        $this->DtReserva = $DtReserva;

                        return $this;
            }

            /**
             * Get the value of HoraReserva
             */
            public function getHoraReserva()
            {
                        return $this->HoraReserva;
            }

            /**
             * Set the value of HoraReserva
             */
            public function setHoraReserva($HoraReserva): self
            {
                        $this->HoraReserva = $HoraReserva;

                        return $this;
            }

            /**
             * Get the value of Procedimento
             */
            public function getProcedimento()
            {
                        return $this->Procedimento;
            }

            /**
             * Set the value of Procedimento
             */
            public function setProcedimento($Procedimento): self
            {
                        $this->Procedimento = $Procedimento;

                        return $this;
            }

            /**
             * Get the value of ValorProcedimento
             */
            public function getValorProcedimento()
            {
                        return $this->ValorProcedimento;
            }

            /**
             * Set the value of ValorProcedimento
             */
            public function setValorProcedimento($ValorProcedimento): self
            {
                        $this->ValorProcedimento = $ValorProcedimento;

                        return $this;
            }

            /**
             * Get the value of idUsuario
             */
            public function getIdUsuario()
            {
                        return $this->idUsuario;
            }

            /**
             * Set the value of idUsuario
             */
            public function setIdUsuario($idUsuario): self
            {
                        $this->idUsuario = $idUsuario;

                        return $this;
            }

            /**
             * Get the value of idPrestador
             */
            public function getIdPrestador()
            {
                        return $this->idPrestador;
            }

            /**
             * Set the value of idPrestador
             */
            public function setIdPrestador($idPrestador): self
            {
                        $this->idPrestador = $idPrestador;

                        return $this;
            }

            public function getStatus(): string
            {
                return $this->status;
            }

            public function setStatus($status): self
            {
                $this->status = $status;
                return $this;
            }
     }  
          
?>