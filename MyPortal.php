<?php namespace evilportal;

class MyPortal extends Portal
{

    public function handleAuthorization()
    {
        if (isset($_POST['mac'])) {
            $hostname = isset($_POST['hostname']) ? $_POST['hostname'] : 'hostname';
            $mac = isset($_POST['mac']) ? $_POST['mac'] : 'mac';
            $ip = isset($_POST['ip']) ? $_POST['ip'] : 'ip';

            $reflector = new \ReflectionClass(get_class($this));
            $logPath = dirname($reflector->getFileName());
            file_put_contents("{$logPath}/.logs", "[" . date('Y-m-d H:i:s') . "Z]\n" . "hostname: {$hostname}\nmac: {$mac}\nip: {$ip}\n\n", FILE_APPEND);
        }
        // handle form input or other extra things there

        // Call parent to handle basic authorization first
        parent::handleAuthorization();
    }

    /**
     * Override this to do something when the client is successfully authorized.
     * By default it just notifies the Web UI.
     */
    public function onSuccess()
    {
        // Calls default success message
        parent::onSuccess();
    }

    /**
     * If an error occurs then do something here.
     * Override to provide your own functionality.
     */
    public function showError()
    {
        // Calls default error message
        parent::showError();
    }
}
