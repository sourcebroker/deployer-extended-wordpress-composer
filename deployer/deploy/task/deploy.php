<?php

namespace Deployer;

task('deploy', [
    // Read more on https://github.com/sourcebroker/deployer-extended#deploy-check-lock
    'deploy:check_lock',

    // Read more on https://github.com/sourcebroker/deployer-extended#deploy-check-composer-install
    'deploy:check_composer_install',

    // Standard deployer deploy:prepare
    'deploy:prepare',

    // Standard deployer deploy:lock
    'deploy:lock',

    // Standard deployer deploy:release
    'deploy:release',

    // Standard deployer deploy:update_code
    'deploy:update_code',

    // Standard deployer deploy:shared
    'deploy:shared',

    // Standard deployer deploy:writable
    'deploy:writable',

    // Standard deployer deploy:vendors
    'deploy:vendors',

    // Default build assets. "assets_path" and "assets_dist_path" must be set.
    'assets:build',

    // Uploads folders if defined in set('file_upload', ['/some/dir/to/upload']). You can define here build to be uploaded.
    'file:upload',

    // Standard deployer deploy:clear_paths
    'deploy:clear_paths',

    // Create database backup, compress and copy to database store.
    // Read more on https://github.com/sourcebroker/deployer-extended-database#db-backup
    'db:backup',

    // Clear php cli cache.
    // Read more on https://github.com/sourcebroker/deployer-extended#php-clear-cache-cli
    'cache:clear_php_cli',

    // Start buffering http requests. No frontend access possible from now.
    // Read more on https://github.com/sourcebroker/deployer-extended#buffer-start
    'buffer:start',

    // Standard deployer symlink (symlink release/x/ to current/)
    'deploy:symlink',

    // Clear frontend http cache.
    // Read more on https://github.com/sourcebroker/deployer-extended#php-clear-cache-http
    'cache:clear_php_http',

    // Frontend access possible again from now
    // Read more on https://github.com/sourcebroker/deployer-extended#buffer-stop
    'buffer:stop',

    // Standard deployer deploy:unlock
    'deploy:unlock',

    // Standard deployer cleanup.
    'cleanup',
])->desc('Deploy your WordPress');


after('deploy:failed', 'deploy:unlock');
