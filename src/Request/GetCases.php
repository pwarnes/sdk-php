<?php

namespace Easir\SDK\Request;

use Easir\SDK\Exception\RequestException;
use Easir\SDK\Model\Cases;
use Easir\SDK\Request;
use Easir\SDK\Request\Model\GetById;

class GetCase extends Request
{
    protected $url = '/cases/%s';
    public $method = 'GET';
    public $requiresAuth = true;
    public $responseClass = Cases::class;
    protected $modelClass = GetById::class;

    public function getUrl()
    {
        if (is_null($this->model)) {
            throw new RequestException("We can't make a request without a RequestModel", RequestException::MISSING_MODEL);
        } else {
            return sprintf(parent::getUrl(), $this->model->id);
        }
    }
}