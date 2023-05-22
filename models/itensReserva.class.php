<?php 
    Class ItensReserva{
        public function __construct(
            private int $idReserva = 0,
            private float $Preco = 0,
            private string $StatusReserva = "",
            private $servico = null
        ){}

        

            /**
             * Get the value of id
             */
            public function getIdReserva(): int
            {
                        return $this->idReserva;
            }

            /**
             * Set the value of id
             */
            public function setIdReserva(int $idReserva): self
            {
                        $this->idReserva = $idReserva;

                        return $this;
            }

            /**
             * Get the value of Preco
             */
            public function getPreco(): float
            {
                        return $this->Preco;
            }

            /**
             * Set the value of Preco
             */
            public function setPreco(float $Preco): self
            {
                        $this->Preco = $Preco;

                        return $this;
            }

            /**
             * Get the value of StatusReserva
             */
            public function getStatusReserva(): string
            {
                        return $this->StatusReserva;
            }

            /**
             * Set the value of StatusReserva
             */
            public function setStatusReserva(string $StatusReserva): self
            {
                        $this->StatusReserva = $StatusReserva;

                        return $this;
            }

            public function getServico()
            {
                return $this->servico;
            }

            public function setServico($Servico)
            {
                $this->servico = $Servico;
                return $this;
            }
    }
?>