<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $data_nasc
 * @property string|null $telefone
 * @property int|null $ativo
 *
 * @property Pedidos[] $pedidos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'data_nasc'], 'required'],
            [['data_nasc'], 'date', 'format' => 'yyyy-MM-dd'],
            [['ativo'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['cpf', 'telefone'], 'string', 'max' => 15],
            [['cpf'],'validateCpf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'data_nasc' => 'Data Nascimento',
            'telefone' => 'Telefone',
            'ativo' => 'Ativo',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->data_nasc) {
               // $this->data_nasc = Yii::$app->formatter->asDate($this->data_nasc, 'Y-M-d'); 
            }
            return true;
        }
        return false;
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::class, ['cliente_id' => 'id']);
    }

    /**
     * Valida se o CPF é válido.
     * 
     * @param string $attribute o nome do atributo a ser validado
     */
    public function validateCpf($attribute)
    {
        if (!$this->isCpfValid($this->$attribute)) {
            $this->addError($attribute, 'O CPF não é válido.');
        }
    }

    /**
     * Validador de CPF
     *
     * @param string $cpf
     * @return bool
     */
    public function isCpfValid($cpf)
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se todos os dígitos são iguais
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Calcula os dígitos verificadores para verificar se o CPF é válido
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
