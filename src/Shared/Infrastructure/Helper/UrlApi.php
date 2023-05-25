<?php

namespace Src\Shared\Infrastructure\Helper;

trait UrlApi
{
     private string $apiUrl = '/api/v0';
    protected $userId;
    protected $jwt;
    protected $repositoryId;

    /**
     * @return string
     */
    public function login(): string
    {
        return sprintf('%s/login',$this->apiUrl);
    }

    /**
     * @return string
     */
    public function user():string
    {
        return sprintf('%s/user',$this->apiUrl);
    }

    /**
     * @param string $userId
     * @return string
     */
    public function userByUserId(string $userId):string
    {
        return sprintf('%s/%s',$this->user(),$userId) ;
    }

    /**
     * @param string $userId
     * @return string
     */
    public function repository(string $userId):string
    {
        return  sprintf('%s/repository', $this->userByUserId($userId)) ;
    }

    /**
     * @param string $userId
     * @param string $repositoryId
     * @return string
     */
    public function repositoryById(string $userId, string $repositoryId):string
    {
        return sprintf('%s/%s',$this->repository($userId),$repositoryId);
    }

    /**
     * @param string $userId
     * @param string $repositoryId
     * @return string
     */
    public function season(string $userId,string $repositoryId):string
    {
        return sprintf('%s/season', $this->repositoryById($userId,$repositoryId));
    }

    /**
     * @param string $userId
     * @param string $repositoryId
     * @param string $seasonId
     * @return string
     */
    public function seasonById(string $userId,string $repositoryId,string $seasonId):string
    {
        return sprintf('%s/%s',$this->season($userId,$repositoryId),$seasonId);
    }

    public function seasonByIdUpdateStatus():string
    {
        return sprintf('%s/status',$this->seasonById($this->userId,$this->repositoryId,$this->seasonId));
    }

    public function plotSectionByRepositoryId($value): string
    {
        return sprintf('%s/repository/%s/%s',$this->apiUrl,$this->repositoryId,$value );
    }
}
