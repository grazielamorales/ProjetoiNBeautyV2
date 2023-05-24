<?php
    class Servico
    {
        public function __construct(
            private int $idServico = 0,
            private string $descritivo = "",
            private float $preco= 0,
            private string $tempoEstim = "",
            private array $cliente = array()
            
        ){}       


            /**
             * Get the value of idServico
             */
            public function getIdServico(): int
            {
                        return $this->idServico;
            }

            /**
             * Set the value of idServico
             */
            public function setIdServico(int $idServico): self
            {
                        $this->idServico = $idServico;

                        return $this;
            }

            /**
             * Get the value of descritivo
             */
            public function getDescritivo(): string
            {
                        return $this->descritivo;
            }

            /**
             * Set the value of descritivo
             */
            public function setDescritivo(string $descritivo): self
            {
                        $this->descritivo = $descritivo;

                        return $this;
            }

            /**
             * Get the value of preco
             */
            public function getPreco(): float
            {
                        return $this->preco;
            }

            /**
             * Set the value of preco
             */
            public function setPreco(float $preco): self
            {
                        $this->preco = $preco;

                        return $this;
            }

            /**
             * Get the value of tempoEstim
             */
            public function getTempoEstim(): string
            {
                        return $this->tempoEstim;
            }

            /**
             * Set the value of tempoEstim
             */
            public function setTempoEstim(string $tempoEstim): self
            {
                        $this->tempoEstim = $tempoEstim;

                        return $this;
            }

            /**
             * Get the value of cliente
             */
            public function getCliente(): array
            {
                        return $this->cliente;
            }

            /**
             * Set the value of cliente
             */
            public function setCliente(array $cliente): self
            {
                        $this->cliente = $cliente;

                        return $this;
            }
    }



?>