<?php
    class Prestador
    {
        public function __construct(
            private int $idPrestador = 0,
            private string $NomePrestador = "",
            private string $DataNascimento = "",
            private string $Celular = "",
            private string $Email = "",
            private string $Senha = "",
            private string $Situacao = "", 
            private array $Servico = array(),
            private $Empresa = null
        )
        {
            
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
             * Get the value of NomePrestador
             */
            public function getNomePrestador(): string
            {
                        return $this->NomePrestador;
            }

            /**
             * Set the value of NomePrestador
             */
            public function setNomePrestador(string $NomePrestador): self
            {
                        $this->NomePrestador = $NomePrestador;

                        return $this;
            }

            /**
             * Get the value of DataNascimento
             */
            public function getDataNascimento(): string
            {
                        return $this->DataNascimento;
            }

            /**
             * Set the value of DataNascimento
             */
            public function setDataNascimento(string $DataNascimento): self
            {
                        $this->DataNascimento = $DataNascimento;

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
             * Get the value of Situacao
             */
            public function getSituacao(): string
            {
                        return $this->Situacao;
            }

            /**
             * Set the value of Situacao
             */
            public function setSituacao(string $Situacao): self
            {
                        $this->Situacao = $Situacao;

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