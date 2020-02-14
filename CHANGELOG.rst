
Changelog
---------

master
~~~~~~

1) [TASK][BRAKING] Update to deployer 6 and compatible deployer-extended- stack.
2) [TASK] Allow to override assets build command.
3) [BUGFIX] Fix wrongly calculated $absolutePathWithConfig in driver.
4) [TASK] Add deploy:unlock after fail.
5) [BUGFIX] Add deployer-instance to loader.
6) [BUGFIX] Deployer 6.x compatibility - dumpcode argument missing in db:import:post_command:wp_domains
7) [TASK] Increase default timeout to 900s.
8) [TASK][BREAKING] Change deploy tasks to use more tasks from deployer-extended.
9) [TASK] Deployer-instance changes.
10) [TASK] Rename task names to not use ":" for Windows WSL compatibility.
11) [TASK] Increase sourcebroker/deployer-extended to 12.0.0
12) [BUGFIX] Fix possible errors with wrong php version on host in db:import:post_command:wp_domains

4.0.0
~~~~~

1) [BUGFIX] Change Dotenv dependency to Symfony\Dotenv (possible breaking change)

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
