<?php

namespace packages\Infrustructure\Prefecture;

use App\Eloquent\EloquentPrefecture;
use packages\Domain\Domain\Prefecture\Prefecture;
use PrefectureRepositoryInterface;

class PrefectureRepository implements PrefectureRepositoryInterface
{
    /**
     * @return Prefecture[]
     */
    public function all(): array
    {
        /** @var EloquentPrefecture[] $records */
        $records = EloquentPrefecture::query()
                                     ->orderBy('id')
                                     ->get();
        $results = [];
        foreach ($records as $r) {
            $prefecture = new Prefecture($r->name);
            $prefecture->setId($r->id);
            $results[] = $prefecture;
        }

        return $results;
    }
}
