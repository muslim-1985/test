<?php


namespace App\ErrorHandling\Api\Serializer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NormalizerFactory
{
    /**
     * @var NormalizerInterface[]
     */
    private $normalizers;

    /**
     * NormalizerFactory constructor.
     *
     * @param iterable $normalizers
     */
    public function __construct(iterable $normalizers)
    {
        $this->normalizers = $normalizers;
    }

    /**
     * Returns the normalizer by supported data.
     */
    public function getNormalizer(mixed $data): NormalizerInterface|null
    {
        foreach ($this->normalizers as $normalizer) {
            if ($normalizer instanceof NormalizerInterface && $normalizer->supportsNormalization($data)) {
                return $normalizer;
            }
        }

        return null;
    }
}