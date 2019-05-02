<?php

namespace packages\Infrustructure\Prefecture;

use App\Eloquent\EloquentPrefecture;
use Illuminate\Support\Collection;
use packages\Domain\Domain\Prefecture\PrefectureRepositoryInterface;

class PrefectureRepository implements PrefectureRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return EloquentPrefecture::query()
                                 ->orderBy('id')
                                 ->get()
                                 ->pluck('name', 'id');
    }
}
