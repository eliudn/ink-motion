<?php

namespace Src\Application\MediaRepositorySeasons\Domain;

use Src\Application\MediaRepositorySeasons\Domain\Exceptions\SeasonNotFoundException;
use Src\Application\MediaRepositorySeasons\Domain\Exceptions\VerifyLastRecordFinalizationException;
use Src\Application\MediaRepositorySeasons\Infrastructure\Enum\Status;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;
use function Symfony\Component\Translation\t;

class SeasonEntity extends \Src\Shared\Domain\Domain
{
    use HttpCodesDomainHelper;
    const REPOSITORY_SEASON_NOT_FOUND = "REPOSITORY_SEASON_NOT_FOUND";
    const VERIFY_LAST_RECORD_FINALIZATION= "VERIFY_LAST_RECORD_FINALIZATION";
    public function __construct(mixed $entity = null, ?string $exception = null)
    {
        parent::__construct($entity, $exception);
    }

    private function singleArray():array
    {
        return [
            'id'=>$this->entity()->toArray()["id"],
            'mediaRepositoryId'=>$this->entity()->toArray()["media_repository_id"],
            'season'=>$this->entity()->toArray()["order"],
            'status'=>$this->entity()->toArray()["status"]
        ];

    }
    public function handler():array
    {
        if(empty($this->entity()->toArray())) return [];

        return   array_key_exists('id',$this->entity()->toArray())?
            $this->singleArray():
            array_map(fn($value)=>[
            'id'=>$value['id'],
            'mediaRepositoryId'=>$value["media_repository_id"],
            'season'=>$value['order'],
            'status'=>$value['status']
        ] ,$this->entity()->toArray())
            ;
    }

    public function newSeason()
    {
        try {
            return array_key_exists('season', $this->handler())?
                $this->handler()['season']+1:
                $this->orderSeason()[0]['season']+1;
        }catch (\Exception ){
            return 1;
        }

    }

    public function VerifyLastRecordFinalization():bool
    {

        $status = $this->orderSeason();
        if( empty($status)) return false;

        if ($status[0]["status"]!=Status::FINALIZED->value)
        {
            return true;
        }
        return false;
    }
    private function orderSeason(): array
    {
        $season =  $this->handler();
        array_multisort(
            array_column($season,'season'),
            SORT_DESC,
            $season
        );
        return $season;
    }

    /**
     * @inheritDoc
     * @throws SeasonNotFoundException
     * @throws VerifyLastRecordFinalizationException
     */
    protected function isException(?string $exception): void
    {
        if (!is_null($exception)){
            match ($exception){
                self::REPOSITORY_SEASON_NOT_FOUND => throw new SeasonNotFoundException('Season not found',404),
                self::VERIFY_LAST_RECORD_FINALIZATION=> throw new VerifyLastRecordFinalizationException('The last season is still pending finalization ',400)
            };
        }
    }
}
