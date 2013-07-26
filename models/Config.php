<?php

/**
 * Class for getting configs
**/
class Config
{
    /**
     * Function gets config by name.yaml using params
     *
     * @param $params - array
     *
     * @return mixed
    **/
    static public function get($name, $params)
    {
        $config = yaml_parse_file("configs/{$name}.yaml");
        return $config['default'];
    }
}
