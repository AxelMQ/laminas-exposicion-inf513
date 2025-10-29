<?php
return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => 'Application\Controller\IndexController',
                        'action' => 'index',
                    ],
                ],
            ],
            'estudiante' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/estudiante[/:action[/:id]]',
                    'defaults' => [
                        'controller' => 'Application\Controller\EstudianteController',
                        'action' => 'index',
                    ],
                ],
            ],
            'info' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/info',
                    'defaults' => [
                        'controller' => 'Application\Controller\IndexController',
                        'action' => 'info',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'Application\Controller\IndexController' => function($container) {
                return new \Application\Controller\IndexController();
            },
            'Application\Controller\EstudianteController' => function($container) {
                return new \Application\Controller\EstudianteController();
            },
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'flashMessenger' => \Laminas\Mvc\Plugin\FlashMessenger\FlashMessengerFactory::class,
        ],
        'aliases' => [
            'flashmessenger' => 'flashMessenger',
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'application/index/info' => __DIR__ . '/../view/application/index/info.phtml',
            'application/estudiante/index' => __DIR__ . '/../view/application/estudiante/index.phtml',
            'application/estudiante/agregar' => __DIR__ . '/../view/application/estudiante/agregar.phtml',
            'application/estudiante/editar' => __DIR__ . '/../view/application/estudiante/editar.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'layout' => 'layout/layout',
        'helper_map' => [
            'flashMessenger' => \Laminas\Mvc\Plugin\FlashMessenger\View\Helper\FlashMessenger::class,
        ],
        'helpers' => [
            'factories' => [
                \Laminas\Mvc\Plugin\FlashMessenger\View\Helper\FlashMessenger::class => \Laminas\View\Helper\Service\FlashMessengerFactory::class,
            ],
            'aliases' => [
                'flashmessenger' => \Laminas\Mvc\Plugin\FlashMessenger\View\Helper\FlashMessenger::class,
            ],
        ],
    ],
];
