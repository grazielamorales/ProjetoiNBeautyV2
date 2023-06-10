<?php
    class Servico_idPrestador
    {
        public function __construct(
            private int $id = 0,
            private int $idPrestador,
            private int $idServico,            
            
        ){}   

        

            /**
             * Get the value of id
             */
            public function getId(): int
            {
                        return $this->id;
            }

            /**
             * Set the value of id
             */
            public function setId(int $id): self
            {
                        $this->id = $id;

                        return $this;
            }

            /**
             * Get the value of idPrestador
             */
            public function getIdPrestador(): int
            {
                        return $this->idPrestador;
            }

            /**
             * Set the value of idPrestador
             */
            public function setIdPrestador(int $idPrestador): self
            {
                        $this->idPrestador = $idPrestador;

                        return $this;
            }

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
    }    
?>