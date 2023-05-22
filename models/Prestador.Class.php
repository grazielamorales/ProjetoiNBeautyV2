<?php
    class Prestador
    {
        public function __construct(
            private int $idPrestador = 0,
            private string $Nome = "",
            private string $DtNasc = "",
            private string $Celular = "",
            private string $Email = "",
            private string $Senha = "",
            private string $Status = "", 
            private array $Servico = array(),
            private $Empresa = null,
            
        ){}

        

          

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
             * Get the value of Nome
             */
            public function getNome(): string
            {
                        return $this->Nome;
            }

            /**
             * Set the value of Nome
             */
            public function setNome(string $Nome): self
            {
                        $this->Nome = $Nome;

                        return $this;
            }

            /**
             * Get the value of DtNasc
             */
            public function getDtNasc(): string
            {
                        return $this->DtNasc;
            }

            /**
             * Set the value of DtNasc
             */
            public function setDtNasc(string $DtNasc): self
            {
                        $this->DtNasc = $DtNasc;

                        return $this;
            }

            /**
             * Get the value of Celular
             */
            public function getCelular(): string
            {
                        return $this->Celular;
            }

            /**
             * Set the value of Celular
             */
            public function setCelular(string $Celular): self
            {
                        $this->Celular = $Celular;

                        return $this;
            }

            /**
             * Get the value of Email
             */
            public function getEmail(): string
            {
                        return $this->Email;
            }

            /**
             * Set the value of Email
             */
            public function setEmail(string $Email): self
            {
                        $this->Email = $Email;

                        return $this;
            }

            /**
             * Get the value of Senha
             */
            public function getSenha(): string
            {
                        return $this->Senha;
            }

            /**
             * Set the value of Senha
             */
            public function setSenha(string $Senha): self
            {
                        $this->Senha = $Senha;

                        return $this;
            }

            /**
             * Get the value of Status
             */
            public function getStatus(): string
            {
                        return $this->Status;
            }

            /**
             * Set the value of Status
             */
            public function setStatus(string $Status): self
            {
                        $this->Status = $Status;

                        return $this;
            }

            /**
             * Get the value of Servico
             */
            public function getServico(): array
            {
                        return $this->Servico;
            }

            /**
             * Set the value of Servico
             */
            public function setServico(array $Servico): self
            {
                        $this->Servico = $Servico;

                        return $this;
            }

            /**
             * Get the value of Empresa
             */
            public function getEmpresa()
            {
                        return $this->Empresa;
            }

            /**
             * Set the value of Empresa
             */
            public function setEmpresa($Empresa): self
            {
                        $this->Empresa = $Empresa;

                        return $this;
            }
    }
?>