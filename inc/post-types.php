<?php

/**
 * Регистрация пользовательских типов записей в WordPress
 */

add_action('init', 'register_post_types');

function register_post_types()
{
    register_post_type('portfolio', [
        'label'  => 'Портфолио',
        'labels' => [
            'name'          => 'Работы',
            'singular_name' => 'Работа',
            'add_new'       => 'Добавить работу',
        ],
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'    => 'dashicons-portfolio',
        'supports'     => ['title', 'editor', 'thumbnail'],
    ]);
}
