<?php

class ContaBanco {

    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;

    public function abrirConta($t) {
        $this->setTipo($t);
        $this->setStatus(true);
        if ($t == "CC") {
            $this->setSaldo(50);
        } else if ($t == "CP") {
            $this->setSaldo(150);
        } else {
            echo "<script>alert('Tipo de conta errado!');</script>";
        }
    }

    public function fecharConta() {
        if ($this->getSaldo() > 0) {
            $saida = "Conta N°".$this->getNumConta()." do ".$this->getDono()." não pode ser fechada pois ainda tem saldo de " . $this->getSaldo();
            echo "<script>alert('" . $saida . "');</script>";
        } else if ($this->getSaldo() < 0) {
            $saida = "Conta N°".$this->getNumConta()." do ".$this->getDono()." não pode ser fechada pois ainda tem DÉBITO de " . $this->getSaldo();
            echo "<script>alert('" . $saida . "');</script>";
        } else {
            $this->setStatus(false);
            echo "Conta Nº ".$this->getNumConta()." de dono: ".$this->getdono()." fechada com sucesso!";
        }
    }

    public function depositar($v) {
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() + $v);
            echo "<p> Foi depositado " . $v . " na conta " . $this->getNumConta() . " e o saldo atual é de " . $this->getSaldo() . "</p>";
        } else {
            echo "<script>alert(Conta fechada, impossível depositar!);</script>";
        }
    }

    public function sacar($v) {
        if ($this->getStatus()) {
            if ($this->getSaldo() >= $v) {
                $this->setSaldo($this->getSaldo() - $v);
                echo "<p>Saque autorizado na conta de ".$this->getDono()." com o valor de ".$v.". Saldo atual de ".$this->getSaldo()."</p>";
            } else {
                echo "<p>Saldo insuficiente para saque!</p>";
            }
        } else {
            echo "<p>Não pode sacar de uma conta fechada</p>";
        }
    }

    public function pagarMensal() {
        if ($this->getStatus()) {
            if ($this->getTipo() == "CC") {
                $this->setSaldo($this->getSaldo() - 12.0);
                echo "<p>Pagando mensalidade de 12 na conta corrente de ".$this->getDono()."</p>";
            } else if ($this->getTipo() == "CP") {
                $this->setSaldo($this->getSaldo() - 20.0);
                echo "<p>Pagando mensalidade de 20 na conta poupança de ".$this->getDono()."</p>";
            } else {
                echo "<n1>Tipo de conta errada na operação pagar mensalidade</n1>";
            }
        } else {
            echo "<n1>Erro ao pagar mensalidade a conta não está ativa</n1>";
        }
    }

    function __construct() {
        $this->setSaldo(0);
        $this->setStatus(false);
        echo "<p>Conta criada com sucesso</p>";
    }

    function getNumConta() {
        return $this->numConta;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDono() {
        return $this->dono;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function getStatus() {
        return $this->status;
    }

    function setNumConta($numConta) {
        $this->numConta = $numConta;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDono($dono) {
        $this->dono = $dono;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}
