<?php
namespace Domain\Http;
use Illuminate\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Support\Arrayable;
use Zend\Config\Config;
use Zend\Config\Writer\Xml;

class ResponseFactory extends Response{
    
    public function make($content = '',$status = 200, array $headers = []){
        $request = app('request');
        $acceptHeader = $request->header('accept');
        $result = "";
        switch ($acceptHeader){
            case 'application/json':
                $result = $this->json($content,$status,$headers);
                break;
            case 'application/xml':
                $result = parent::make($this->getXML($content),$status,$headers);
                break;
            default:
                $result = $this->json($content,$status,$headers);
                break;
        }
        return $result;
    }
    
    protected function getXML($data){
        if($data instanceof Arrayable){
            $data = $data->toArray();            
        }
        $config = new Config(['result'=>$data],true);
        $xmlWritter = new Xml();
        return $xmlWritter->toString($config);
    }
}
