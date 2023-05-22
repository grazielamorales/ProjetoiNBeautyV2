<?php
    class Empresa
    {
        public function __construct(
            $idPrestador,
            $NomePrestador,
            $DataNascimento,
            $Celular,
            $Email_prestador,
            $Senha,
            $Situacao_prestador, 
            $Servico,
            $Empresa,
            private int $idEmpresa = 0,
            private string $NomeEmpresa = "",
            private string $Logradouro = "",
            private string $Cep = "",
            private string $Cidade = "",
            private string $Uf = "",
            private string $Telefone = "",
            private string $Email_empresa = "",
            private string $Situacao = "",
            private string $HorarioFuncionamento = "",
            private array $Prestador = array()
        )
        {
            $this->Prestador[] = new Prestador(
            $idPrestador,
            $NomePrestador,
            $DataNascimento ,
            $Celular,
            $Email_prestador,
            $Senha,
            $Situacao_prestador, 
            array($Servico),
            $Empresa
            );
        }
        
        


            /**
             * Get the value of idEmpresa
             */
            public function getIdEmpresa(): int
            {
                        return $this->idEmpresa;
            }

            /**
             * Set the value of idEmpresa
             */
            public function setIdEmpresa(int $idEmpresa): self
            {
                        $this->idEmpresa = $idEmpresa;

                        return $this;
            }

            /**
             * Get the value of NomeFantasia
             */
            public function getNomeEmpresa(): string
            {
                        return $this->NomeEmpresa;
            }


            /**
             * Get the value of Teleone Empresa
             */
            public function getTelefone(): string
            {
                        return $this->Telefone;
            }

            /**
             * Set the value of Telefone Empresa
             */
            public function setTelefone(string $Telefone): self
            {
                        $this->Telefone = $Telefone;

                        return $this;
            }

            /**Get Celular */
            public function getCelular(): string
            {
                        return $this->Celular;
            }

            /**
             * Set the value of Celular Empresa
             */
            public function setCelular(string $Celular): self
            {
                        $this->Celular = $Celular;

                        return $this;
            }


            /**
             * Get the value of Email
             */
            public function getEmail_empresa(): string
            {
                return $this->Email_empresa;
            }

            /**
             * Set the value of Email
             */
            public function setEmail_empresa(string $Email_empresa): self
            {
                        $this->Email_empresa = $Email_empresa;

                        return $this;
            }

            /**
             * Get the value of Logradouro
             */
            public function getLogradouro(): string
            {
                        return $this->Logradouro;
            }

            /**
             * Set the value of Logradouro
             */
            public function setLogradouro(string $Logradouro): self
            {
                        $this->Logradouro = $Logradouro;

                        return $this;
            }

            
            
            /**
             * Get the value of Cep
             */
            public function getCep(): string
            {
                        return $this->Cep;
            }

            /**
             * Set the value of Cep
             */
            public function setCep(string $Cep): self
            {
                        $this->Cep = $Cep;

                        return $this;
            }

            /**
             * Get the value of Cidade
             */
            public function getCidade(): string
            {
                        return $this->Cidade;
            }

            /**
             * Set the value of Cidade
             */
            public function setCidade(string $Cidade): self
            {
                        $this->Cidade = $Cidade;

                        return $this;
            }

            /**
             * Get the value of Uf
             */
            public function getUf(): string
            {
                        return $this->Uf;
            }

            /**
             * Set the value of Uf
             */
            public function setUf(string $Uf): self
            {
                        $this->Uf = $Uf;

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
             * Get the value of HorarioFuncionamento
             */
            public function getHorarioFuncionamento(): string
            {
                        return $this->HorarioFuncionamento;
            }

            /**
             * Set the value of HorarioFuncionamento
             */
            public function setHorarioFuncionamento(string $HorarioFuncionamento): self
            {
                        $this->HorarioFuncionamento = $HorarioFuncionamento;

                        return $this;
            }

            /**
             * Get the value of Prestador
             */
            public function getPrestador(): array
            {
                        return $this->Prestador;
            }

            /**
             * Set the value of Prestador
             */
            public function setPrestador($idPrestador,
            $NomePrestador,
            $DataNascimento ,
            $Celular,
            $Email_prestador,
            $Senha,
            $Situacao, 
            $Servico,
            $Empresa):self
            {
                        $this->Prestador[] =new Prestador($idPrestador,
            $NomePrestador,
            $DataNascimento ,
            $Celular,
            $Email_prestador,
            $Senha,
            $Situacao, 
            $Servico,
            $Empresa);

                        return $this;
            }
    }


?>