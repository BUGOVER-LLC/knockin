<?php

declare(strict_types=1);

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\ResponseFactory;

if (!function_exists('uniqueMachineID')) {
    /**
     * Use this for encrypt a decrypt as a key @TODO. but be careful this is unique within the same machine
     *
     * @param string $salt
     * @return string
     */
    function uniqueMachineID(string $salt = ''): string
    {
        if (0 === strncasecmp(PHP_OS, 'WIN', 3)) {
            $temp = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'diskpartscript.txt';
            if (!file_exists($temp) && !is_file($temp)) {
                file_put_contents($temp, "select disk 0\ndetail disk");
            }
            $output = shell_exec('diskpart /s ' . $temp);
            $lines = explode("\n", $output);
            $result = array_filter($lines, static fn ($line) => false !== stripos($line, 'ID:'));
            if (0 < count($result)) {
                $array = array_values($result);
                $result = array_shift($array);
                $result = explode(':', $result);
                $result = trim(end($result));
            } else {
                $result = $output;
            }
        } else {
            $result = shell_exec('blkid -o value -s UUID');
            if (false !== stripos($result, 'blkid')) {
                $result = $_SERVER['HTTP_HOST'];
            }
        }

        return hash('sha3-512', $salt . hash('sha3-512', $result));
    }
}

if (!function_exists('asset_mix')) {
    /**
     * @param string $path
     * @return string|null
     * @throws Exception
     */
    function asset_mix(string $path): ?string
    {
        try {
            $asset = asset(mix($path));
        } catch (Exception $e) {
            if (!config('app.strict') || app()->environment('production')) {
                $asset = asset($path);
            } else {
                throw new $e();
            }
        }

        return $asset ?? null;
    }
}

if (!function_exists('jsponse')) {
    /**
     * @param array $data
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
    function jsponse(array $data = [], int $status = 200, array $headers = [], int $options = 0): JsonResponse
    {
        return resolve(ResponseFactory::class)->json($data, $status, $headers, $options);
    }
}

if (!function_exists('recursive_loaders')) {
    /**
     * @param string $dir
     * @param array $results
     * @param bool $only_class
     * @param bool $with_path
     * @return void
     */
    function recursive_loader(
        string $dir,
        array &$results = [],
        bool $only_class = false,
        bool $with_path = false
    ): void {
        $files = scandir($dir);
        $app_path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app';
        $app_name = substr($app_path, (strrpos($app_path, DIRECTORY_SEPARATOR) + 1));

        foreach ($files as $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);

            if (!is_dir($path)) {
                $replacer_image = $app_name . substr($path, (strrpos($path, $app_name) + strlen($app_name)));
                $replace = str_replace(['.php', DIRECTORY_SEPARATOR], ['', '\\'], $replacer_image);
                $clean_class = ucfirst(substr($replace, strrpos($replace, $app_name)));

                if ($only_class && class_exists($clean_class)) {
                    $results[] = $clean_class;
                } elseif (!$only_class) {
                    $results[] = $path;
                }
            } elseif ('.' !== $value && '..' !== $value) {
                recursive_loader($path, $results, $only_class, $with_path);
                $with_path ? $results[] = $path : null;
            }
        }
    }//end recursive_loader()
}//end if
