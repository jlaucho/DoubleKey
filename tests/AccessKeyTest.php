<?php

use jlaucho\DoubleKey\AccessKey;

class AccessKeyTest extends PHPUnit\Framework\TestCase
{
    public function test_privilegies_create_request () {
        $access_key = new AccessKey();
        $this->assertTrue(
            $access_key->set_new_request('supervisor_administrativo')
        );
    }

    public function test_master_privilegies_for_create_request () {
        $access_key = new AccessKey();
        $this->assertContains(
            'aprobada solicitud',
            $access_key->set_new_request('superAdmin')
        );
    }

    public function test_not_privilegies_for_create_request () {
        $access_key = new AccessKey();
        $this->assertFalse(
            $access_key->set_new_request('asistente_administrativo', 'No tiene privilegios')
        );
    }

}