<?php

namespace App\Domains\Repositories;

use App\Domains\Entities\BusinessCardEntity;
use App\Models\BusinessCard;

class BusinessCardRepository
{
    public function findByName(string $name): BusinessCardEntity
    {
        $businessCard = BusinessCard::where('name', 'LIKE', '%' . $name . '%')->first();

        return new BusinessCardEntity(
            $businessCard->id,
            $businessCard->name,
            $businessCard->company_name,
            $businessCard->post_code,
            $businessCard->address,
            $businessCard->phone,
            $businessCard->fax,
            $businessCard->email,
            $businessCard->created_at,
            $businessCard->updated_at,
        );
    }
}
