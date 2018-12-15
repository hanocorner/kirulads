<?php
$config = array(
        'user_auth' => array(
            array(
                'field'=> 'email',
                'label' => 'Email',
                'rules' => 'trim|required'
            ),
            array(
                'field'=> 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            )
        ),
        'user_register'=> array(
            array(
                'field'=> 'fullname',
                'label' => 'Full Name',
                'rules' => 'trim|required'
            ),
            array(
                'field'=> 'mail',
                'label' => 'Email',
                'rules' => 'trim|required'
            ),
            array(
                'field'=> 'number',
                'label' => 'Number',
                'rules' => 'trim|required'
            ),
            array(
                'field'=> 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            )
        )
);
?>
