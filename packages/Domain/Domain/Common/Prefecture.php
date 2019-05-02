<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Common;

use Illuminate\Support\Collection;
use InvalidArgumentException;
use packages\Infrustructure\Prefecture\PrefectureRepository;

class Prefecture
{
    use EnumTrait;
    use ValueObjectOf;

    /**
     * EnumTrait constructor.
     *
     * @param mixed $key
     */
    final public function __construct($key)
    {
        if (!self::isValidateValue($key)) {
            throw new InvalidArgumentException();
        }

        $this->key   = $key;
        $this->value = self::Enum()[$key];
    }

    /**
     * @return array
     */
    public static function Enum(): array
    {
        /** @var Collection $prefectures */
        $prefectureRepository = new PrefectureRepository();
        $prefectures          = $prefectureRepository->all();

        return $prefectures->toArray();
    }
}
