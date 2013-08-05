<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Upload\Controller\Upload' => 'Upload\Controller\UploadController',
        ),
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'Upload' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/Upload[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Upload\Controller\Upload',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    
    'view_manager' => array(
        'template_path_stack' => array(
            'Upload' => __DIR__ . '/../view',
        ),
    ),
);
