<?php

return [
    /* Your Repos Here 'contract => eloquent' */
    App\Repositories\Contracts\LeadRepositoryContract::class     => App\Repositories\Eloquents\LeadRepositoryEloquent::class,
    App\Repositories\Contracts\BusinessRepositoryContract::class => App\Repositories\Eloquents\BusinessRepositoryEloquent::class,
    App\Repositories\Contracts\SectionRepositoryContract::class  => App\Repositories\Eloquents\SectionRepositoryEloquent::class,
    App\Repositories\Contracts\SettingRepositoryContract::class  => App\Repositories\Eloquents\SettingRepositoryEloquent::class,

];
