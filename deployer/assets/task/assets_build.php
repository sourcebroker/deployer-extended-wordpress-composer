<?php

namespace Deployer;

task('assets:build', function () {
    if (!empty(get('assets_path', false))) {
        $assetsPath = trim(get('assets_path'), '/\\');
        runLocally('cd ./' . $assetsPath . ' && ' . get('assets_build', ' npm ci && gulp build'));
    }
    if (!empty(get('assets_dist_path', false))) {
        set('file_upload', [get('assets_dist_path')]);
    }
});
