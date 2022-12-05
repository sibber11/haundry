<?php

namespace App\Traits;

use App\Models\Order;
use App\Models\Package;

trait CanPurchasePackage
{
    public function initializeCanSubscribeToPackageTrait()
    {
        //adding cast to the parent model.
        //you can literally use the + sign ot concatenate two array.
    }

    public function purchase(Package|int $package): bool
    {
        if (is_integer($package)) {
            $package = Package::findOrFail($package);
        }

        $this->packages()->attach($package, [
            'activated_at' => now(),
        ]);
        $this->add_point($package->points);
        return true;
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class)->withPivot([
            'start_date', 'end_date', 'remaining'
        ]);
    }

    public function use_package(Order $order)
    {
        //todo: use the package
    }
}
