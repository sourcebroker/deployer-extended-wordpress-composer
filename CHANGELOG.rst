
Changelog
---------

master
-----
1) [BREAKING] Change ``set('instance_local_name', 'development'); set('instance_live_name', 'production');`` to ``set('instance_local_name', 'dev'); set('instance_live_name', 'live');``
2) [BREAKING] Change shared files to ``set('shared_files', ['config/.env.local','web/.htaccess'])``;
3) [BREAKING] Move ``.env`` file to ``config/`` and use Symfony/Dotenv loadEnv() to have support for instance based env read.
4) [BREAKING] Change default build command from ``npm ci && gulp build`` to ``npm ci && npm build``

5.0.0
-----

1) [BREAKING] Increase ``sourcebroker/deployer-extended``.
2) [BREAKING] Increase ``deployer-extended-database``.
3) [TASK] Extend dependency of symfony/dotenv to 5.0
4) [TASK] Increase ``deployer/dist`` version.
5) [TASK] Add '.ddev' to 'clear_paths'.

4.0.0
~~~~~

1) [BUGFIX] Change Dotenv dependency to Symfony\Dotenv (possible breaking change)
2) [TASK][BRAKING] Update to deployer 6 and compatible deployer-extended- stack.
3) [TASK] Allow to override assets build command.
4) [BUGFIX] Fix wrongly calculated $absolutePathWithConfig in driver.
5) [TASK] Add deploy:unlock after fail.
6) [BUGFIX] Add deployer-instance to loader.
7) [BUGFIX] Deployer 6.x compatibility - dumpcode argument missing in db:import:post_command:wp_domains
8) [TASK] Increase default timeout to 900s.
9) [TASK][BREAKING] Change deploy tasks to use more tasks from deployer-extended.
10) [TASK] Deployer-instance changes.
11) [TASK] Rename task names to not use ":" for Windows WSL compatibility.
12) [TASK] Increase sourcebroker/deployer-extended to 12.0.0
13) [BUGFIX] Fix possible errors with wrong php version on host in db:import:post_command:wp_domains
14) [TASK] set('instance_local_name', 'development'), set('instance_live_name', 'production');
15) [TASK] Disallow pushing, coping, pulling media and database to top instance.
16) [TASK][BREAKING] By setting ``set('branch_detect_to_deploy', false);`` change the default unsafe bahaviour
    of deployer to deploy the currently checked out branch. The branch must be set explicitly in host configuration.
17) [TASK] Update deployer-extended-media, deployer-extended-database, deployer-instance, deployer-extended.

3.0.0
~~~~~

1) [BUGFIX] Change the way the wp-cli binary is detected. It must be now present in vendor/bin.

2.0.0
~~~~~

1) [TASK][!!!BREAKING] Change th logic for finding "wp-cli" executable.

1.0.1
~~~~~

1) [BUGFIX] file_upload should be an array

1.0.0
~~~~~

1) First stable release.

0.0.1
~~~~~

1) Init version.
