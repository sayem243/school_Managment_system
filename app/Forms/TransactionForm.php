<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class TransactionForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('amount', Field::TEXT, [
                'rules' => 'required|min:5'
            ])
            ->add('lyrics', Field::TEXTAREA, [
                'rules' => 'max:5000'
            ])
            ->add('publish', Field::CHECKBOX);
    }
}
