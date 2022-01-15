<?php


namespace App\Services;


use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PostalCodeConflictValidator
{
    /**
     * @var \App\Models\PostalCode
     */
    private $allPostalCodes;

    /**
     * PostalCodeConflictValidator constructor.
     *
     */
    public function __construct(Collection $allPostalCodes)
    {
        $this->allPostalCodes = $allPostalCodes;
    }

    /**
     * @param $newCodes
     *
     * @return \Illuminate\Support\Collection
     */
    public function validate($newCodes): Collection
    {
        $oldCodesConverted = $this->convertAbbrevationCodesToRange($this->allPostalCodes->pluck('code'));
        $newCodesConverted = $this->convertAbbrevationCodesToRange($newCodes);

        return $oldCodesConverted->intersect($newCodesConverted);
    }

    /**
     * @param  \Illuminate\Support\Collection  $codes
     *
     * @return \Illuminate\Support\Collection
     */
    private function convertAbbrevationCodesToRange(Collection $codes): Collection
    {
        $newCodes = $codes->filter(function ($item) {
            return Str::contains($item, '*');
        })->values();

        $transformed = $newCodes->transform(function ($item) use ($codes) {

            $min = Str::replace('*', '00', $item);
            $max = Str::replace('*', '99', $item);

            $codeId = $codes->search($item);
            $codes->forget($codeId);

            return array_map('strval', (range($min, $max)));
        })->flatten();

       return $codes->push($transformed);

    }

}
