<?php
    class Servico
    {
        public function __construct(
            private int $idServico = 0,
            private string $descritivo = "",
            private $preco= 0,
            private $tempoEstimado,
            private $prestador = array()
            
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
            public function getPreco()
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
            public function getTempoEstimado()
            {
                        return $this->tempoEstimado;
            }

            /**
             * Set the value of tempoEstim
             */
            public function setTempoEstimado(string $tempoEstimado): self
            {
                        $this->tempoEstimado = $tempoEstimado;

                        return $this;
            }

            /**
             * Get the value of cliente
             */
            public function getPrestador()
            {
                        return $this->prestador;
            }

            /**
             * Set the value of cliente
             */
            public function setPrestador($prestador)
            {
                        $this->prestador[] = $prestador;
            }
    }



?>