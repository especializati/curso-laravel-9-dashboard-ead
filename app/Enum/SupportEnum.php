<?php

namespace App\Enum;

enum SupportEnum: string
{
    case P = 'Pendente';
    case A = 'Aguardando Aluno';
    case C = 'Finalizado';
}
