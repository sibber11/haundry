<?php

namespace App\Traits;

use App\Models\Order;
use App\Models\Package;
use App\Models\Service;

trait CanSubscribeToPackage
{
    public function initializeCanSubscribeToPackageTrait()
    {
        //adding cast to the parent model.
        //you can literally use the + sign ot concatenate two array.
        $this->casts += [
            'packages.start_date' => 'date',
            'packages.end_date' => 'date',
        ];
    }

    public function subscribe(Package|int $package): bool
    {
        if (is_integer($package)) {
            $package = Package::findOrFail($package);
        }

        $this->packages()->attach($package, [
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'remaining' => $package->total_piece
        ]);
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
        $order->load('laundries.service');
        $services = $order->laundries->pluck('service');
        foreach ($services as $service) {
            $laundries = $order->laundries()->whereServiceId($service->id)->get();
            $laundry_count = $laundries->sum('amount');
            $package = $this->is_subscribed_to($service);
            if ($package->pivot->remaining > $laundry_count) {
                $package->pivot->remaining -= $laundry_count;
                // you have to save the pivot individually.
                $package->pivot->save();
                $package->laundries()->saveMany($laundries);
            }
        }
        $order->calc_sub_total();
    }

    public function is_subscribed_to(Service $service): Package
    {
        return $this->packages()->whereServiceId($service->id)->valid()->first();
    }
}
