<?php

namespace jlaucho\DoubleKey;


class AccessKey
{
    private $roles_aprobatory;
    private $roles_request;
    private $roles_master;

    public function __construct()
    {
        $this->roles_master = ['superAdmin'];
        $this->roles_aprobatory = ['superAdmin', 'directiva'];
        $this->roles_request = ['supervisor_administrativo'];
    }

    private function getPrivilegesRequest($role){
        return in_array($role, $this->roles_request);
    }

    public function set_new_request ($role) {
        if($this->getPrivilegesRequest($role)){
            return true;
        }
        if(in_array($role, $this->roles_aprobatory)){
            return 'aprobada solicitud';
        }

        return false;
    }

    public function see_requests ($role) {

    }
}