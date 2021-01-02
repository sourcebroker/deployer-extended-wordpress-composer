<?php

namespace SourceBroker\DeployerExtendedWordpressComposer\Drivers;

use Symfony\Component\Dotenv\Dotenv;

class EnvDriver
{
    /**
     * @throws \Exception
     */
    public function getDatabaseConfig($absolutePathWithConfig = null): array
    {
        $this->loadEnv($absolutePathWithConfig);
        return [
            'host' => getenv('DB_HOST'),
            'port' => getenv('DB_PORT'),
            'dbname' => getenv('DB_NAME'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
        ];
    }

    /**
     * @throws \Exception
     */
    public function getInstanceName($absolutePathWithConfig = null): string
    {
        $this->loadEnv($absolutePathWithConfig);
        $instanceName = strtolower(getenv('WP_INSTANCE') ? getenv('WP_INSTANCE') : getenv('WP_ENV'));
        if (empty($instanceName)) {
            throw new \Exception("\nWP_INSTANCE/WP_ENV env variable is not set. \nIf this is your local instance then please put following line: \nWP_ENV=development (or WP_INSTANCE=dev if you have instance based settings)\nin configuration file: ' . $absolutePathWithConfig . '\n\n");
        }
        return $instanceName;
    }

    /**
     * @throws \Exception
     */
    private function loadEnv($absolutePathWithConfig = null)
    {
        $absolutePathWithConfig = $absolutePathWithConfig ?? getcwd();
        $absolutePathWithConfig = rtrim($absolutePathWithConfig, DIRECTORY_SEPARATOR);
        $envFilePath = $absolutePathWithConfig . '/.env';
        if (file_exists($envFilePath)) {
            (new Dotenv(true))->loadEnv($envFilePath, 'WP_INSTANCE');
        } else {
            throw new \Exception('Missing file "' . $envFilePath . '".');
        }
    }
}