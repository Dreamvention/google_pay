<?php
spl_autoload_register(function ($className) {
    if (strpos($className, 'GlobalPayments') !== 0) {
        return;
    }
	
    $fileName = dirname(__FILE__) . DIRECTORY_SEPARATOR;
	
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
	
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
	
    if (is_file($fileName)) {
        require_once $fileName;
    }
});

/*if (version_compare(PHP_VERSION, '7.2.0', '<')) {
    throw new Braintree_Exception('PHP version >= 7.2.0 required');
}*/

class GlobalPayments {
    public static function requireDependencies() {
        $requiredExtensions = ['xmlwriter', 'openssl', 'dom', 'hash', 'curl'];
		
        foreach ($requiredExtensions AS $ext) {
            if (!extension_loaded($ext)) {
                throw new Braintree_Exception('The GlobalPayments library requires the ' . $ext . ' extension.');
            }
        }
    }
}

GlobalPayments::requireDependencies();