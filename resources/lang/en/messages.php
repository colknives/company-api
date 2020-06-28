<?php
return [
    'auth' => [
        'login' => [
            '200' => 'Employee successfully logged in',
            '201' => 'Employee successfully logged in',
            '403' => 'Access denied',
            '401' => 'Unauthorized access',
            '419' => 'Token expired',
            '400' => 'Password is incorrect',
            '404' => 'Employee not yet registered'
        ],
    ],
    'employees' => [
        'list' => [
            '200' => 'Employees successfully fetched'
        ],
        'save' => [
            '201' => 'Employee successfully created',
            '400' => 'Failed to create user'
        ],
        'view' => [
            '200' => 'Employee successfully fetched',
            '404' => 'Employee not found'
        ],
        'update' => [
            '200' => 'Employee successfully updated',
            '404' => 'Employee not found',
            '400' => 'Failed to update user'
        ],
        'delete' => [
            '200' => 'Employee successfully deleted',
            '404' => 'Employee not found',
            '400' => [
                'failed' => 'Failed to delete user',
                'super_admin' => 'Deleting super admin account is not allowed'
            ]
        ],
        'password' => [
            'update' => [
                '200' => 'Password successfully updated',
                '404' => 'Employee not found',
                '400' => 'Failed to update password'
            ]
        ],
    ],
    'companies' => [
        'list' => [
            '200' => 'Companies successfully fetched'
        ],
        'save' => [
            '201' => 'Company successfully created',
            '400' => 'Company unsuccessfully created',
        ],
        'update' => [
            '200' => 'Company successfully updated'
        ],
        'delete' => [
            '404' => 'Company not found',
            '200' => 'Company unsuccessfully deleted',
            '200' => 'Company successfully deleted'
        ]
    ],
    'departments' => [
        'list' => [
            '200' => 'Departments successfully fetched'
        ],
        'save' => [
            '201' => 'Department successfully created',
            '400' => 'Department unsuccessfully created',
        ],
        'update' => [
            '200' => 'Department successfully updated'
        ],
        'delete' => [
            '404' => 'Department not found',
            '200' => 'Department unsuccessfully deleted',
            '200' => 'Department successfully deleted'
        ]
    ]
];
