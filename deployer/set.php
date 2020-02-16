<?php

namespace Deployer;

set('instance_local_name', 'development');
set('instance_live_name', 'production');

set('allow_anonymous_stats', false);
set('web_path', 'web/');
set('default_timeout', 900);

set('local/bin/wp', function () {
    return './vendor/bin/wp';
});

set('shared_dirs', [
        'web/app/uploads',
    ]
);

set('shared_files', [
    '.env',
]);

set('writable_dirs', [
        'web/app/uploads',
    ]
);

set('clear_paths', [
    '.editorconfig',
    '.env.example',
    '.git',
    '.gitattributes',
    '.gitignore',
    'CHANGELOG.md',
    'CODE_OF_CONDUCT.md',
    'LICENSE.md',
    'CONTRIBUTING.md',
    'README.md',
    'composer.json',
    'composer.lock',
    'composer.phar',
    'dependencies.yml',
    'phpcs.xml',
    'ruleset.xml',
    'travis.yml'
]);

set('default_stage', function () {
    return (new \SourceBroker\DeployerExtendedWordpressComposer\Drivers\WordpressDriver)
        ->getInstanceName(getcwd());
});

// Look on https://github.com/sourcebroker/deployer-extended#buffer-start for docs
set('buffer_config', [
        'index.php' => [
            'entrypoint_filename' => 'web/index.php',
        ],
    ]
);

// Look https://github.com/sourcebroker/deployer-extended-media for docs
set('media_allow_push_live', false);
set('media_allow_copy_live', false);
set('media_allow_link_live', false);
set('media',
    [
        'filter' => [
            '+ web/',
            '+ web/app/',
            '+ web/app/uploads/',
            '+ web/app/uploads/**',
            '- *'
        ]
    ]);

// Look https://github.com/sourcebroker/deployer-extended-database for docs
set('db_allow_push_live', false);
set('db_allow_pull_live', false);
set('db_default', [
    'ignore_tables_out' => [],
    'post_sql_in' => '',
    'post_command' => ['export $(cat .env | xargs) && {{local/bin/deployer}} db:import:post_command:wp_domains']
]);
set('db_databases',
    [
        'database_default' => [
            get('db_default'),
            function () {
                return (new \SourceBroker\DeployerExtendedWordpressComposer\Drivers\WordpressDriver)
                    ->getDatabaseConfig(getcwd());
            }
        ]
    ]
);

// Look https://github.com/sourcebroker/deployer-extended-database#db-dumpclean for docs
set('db_dumpclean_keep', [
    '*' => 5,
    'live' => 10,
]);

// update vhost template
set('vhost_document_root', function () {
    if (get('vhost_nocurrent', false) === false) {
        return get('deploy_path') . '/current/web';
    } else {
        return get('deploy_path') . '/web';
    }
});
