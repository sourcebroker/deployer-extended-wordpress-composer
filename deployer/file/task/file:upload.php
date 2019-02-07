<?php

namespace Deployer;

task('file:upload', function () {
    foreach (get('uploadDirs', []) as $uploadDir) {
        $uploadFolderName = basename($uploadDir);
        $uploadDir = trim($uploadDir, '/\\');
        $uploadFolderPathOneLevelBelow = dirname($uploadDir);
        $compressedFilename = parse($uploadFolderName . '_{{random}}.tar.gz');
        runLocally('cd ./' . $uploadFolderPathOneLevelBelow . ' && tar -zcf ' . $compressedFilename . ' ' . $uploadFolderName);
        $distPath = get('deploy_path') . '/'
            . (test('[ -L {{deploy_path}}/release ]') ? 'release' : 'current') . '/' . $uploadFolderPathOneLevelBelow;
        upload('./' . $uploadFolderPathOneLevelBelow . '/' . $compressedFilename, $distPath);
        runLocally('cd ./' . $uploadFolderPathOneLevelBelow . ' && rm -f ' . $compressedFilename);
        run('cd ' . $distPath . ' && rm -rf ' . $uploadFolderName);
        run('cd ' . $distPath . ' && tar -xf ' . $compressedFilename);
        run('cd ' . $distPath . ' && rm -f ' . $compressedFilename);
    }
});