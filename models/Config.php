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
    static public function get($name, $params = array())
    {
        $config = yaml_parse_file("configs/{$name}.yaml");
        $result = [];
        foreach($config as $key => $configLink)
        {
            if($key === 'default') continue;
            if($configLink['key'] == $params) $result[] = $configLink['value'];
        }

        if(empty($result) && isset($config['default'])) $result = $config['default'];
        elseif(count($result) == 1) $result = current($result);

        return $result;
    }
}
