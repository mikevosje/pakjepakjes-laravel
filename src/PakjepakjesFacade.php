<?php

namespace Pakjepakjes\Pakjepakjes;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Pakjepakjes\Pakjepakjes\Skeleton\SkeletonClass
 */
class PakjepakjesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pakjepakjes';
    }
}
