<?php

namespace SourceBroker\DeployerExtendedWordpressComposer\Drivers;

use Symfony\Component\Dotenv\Dotenv;

/**
 * Class WordpressDriver
 * @package SourceBroker\DeployerExtended\Drivers
 */
class WordpressDriver
{
    /**
     * @param null $absolutePathWithConfig
     * @return array
     * @throws \Exception
     * @internal param null $params
     */
    public function getDatabaseConfig($absolutePathWithConfig = null)
    {
        $absolutePathWithConfig = $absolutePathWithConfig ?? getcwd();
        $absolutePathWithConfig = rtrim($absolutePathWithConfig, DIRECTORY_SEPARATOR);
        $envFilePath = $absolutePathWithConfig . '/.env';
        if (file_exists($envFilePath)) {
            (new Dotenv(true))->load($envFilePath);
            $dbSettings = [
                'host' => getenv('DB_HOST'),
                'port' => getenv('DB_PORT'),
                'dbname' => getenv('DB_NAME'),
                'user' => getenv('DB_USER'),
                'password' => getenv('DB_PASSWORD'),
            ];
        } else {
            throw new \Exception('Missing file "' . $envFilePath . '".');
        }
        return $dbSettings;
    }

    /**
     * Return the instance name for project
     *
     * @param null $absolutePathWithConfig
     * @return string
     * @throws \Exception
     * @internal param null $params
     */
    public function getInstanceName($absolutePathWithConfig = null)
    {
        $absolutePathWithConfig = $absolutePathWithConfig ?? getcwd();
        $absolutePathWithConfig = rtrim($absolutePathWithConfig, DIRECTORY_SEPARATOR);
        $envFilePath = $absolutePathWithConfig . '/.env';
        if (file_exists($envFilePath)) {
            (new Dotenv(true))->load($envFilePath);
            $instanceName = getenv('WP_ENV');
            if (isset($instanceName) && strlen($instanceName)) {
                $instanceName = strtolower($instanceName);
            } else {
                throw new \Exception("\nWP_ENV env variable is not set. \nIf this is your local instance then please put following line: \nWP_ENV=development \nin configuration file: ' . $absolutePathWithConfig . '\n\n");
            }
        } else {
            throw new \Exception('Missing file "' . $envFilePath . '".');
        }
        return $instanceName;
    }
}
