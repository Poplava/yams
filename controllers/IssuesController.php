<?php

class IssuesController extends Controller
{
    public function allowed(array $params = array())
    {
        return true;
    }

    public function post($params = array())
    {
        $issueId = Issue::create($params);
        $this->response(array('issueId' => $issueId));
    }

    public function get($params = array())
    {
        $issue = Issue::get($params);
        $this->response(array('issue' => $issue));
    }

    public function put($params = array())
    {
        Issue::update($params);
    }

    public function delete($params = array())
    {
        Issue::delete($params);
    }
}