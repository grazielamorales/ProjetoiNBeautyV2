<?php 
    Class Reserva{
        public function __construct(
            private int $idReserva = 0,
            private $DtReserva = date('Y-m-d'),
            private $HoraReserva = time(),
            private $ItensReserva = array()
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
             * Get the value of DataReserva
             */
            public function getDtReserva()
            {
                        return $this->DtReserva;
            }

            /**
             * Set the value of DataReserva
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
             * Get the value of ItensReserva
             */
            public function getItensReserva()
            {
                        return $this->ItensReserva;
            }

            /**
             * Set the value of ItensReserva
             */
            public function setItensReserva($ItensReserva): self
            {
                        $this->ItensReserva = $ItensReserva;

                        return $this;
            }
    }
?>