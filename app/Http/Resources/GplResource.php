<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\gpl;

/**
 * @OA\Schema(
 *     title="GplResource",
 *     description="Gpl resource",
 *     @OA\Xml(
 *         name="GplResource"
 *     )
 * )
 */

class GplResource extends JsonResource
{



    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Models\gpl[]
     */
    private $data;




    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'ID' => $this->ID,
            'DATES' => $this->DATES,
            'DATES SAISIES SAP' => $this->{'DATES SAISIES SAP'},
            'DATES LIVRAISON PREV' => $this->{'DATES LIVRAISON PREV'},
            'DATES  LIVRAISONS' => $this->{'DATES  LIVRAISONS'},
            'COMPTE' => $this->COMPTE,
            'CLIENTS' => $this->CLIENTS,
            'NUMERO DE BL' => $this->{'NUMERO DE BL'},
            '6 KG' => $this->{'6 KG'},
            '12,5 KG' => $this->{'12,5 KG'},
            '18 KG' => $this->{'18 KG'},
            '32 KG' => $this->{'32 KG'},
            '35 KG' => $this->{'35 KG'},
            'QUANTITE PREV' => $this->{'QUANTITE PREV'},
            'QUANTITE REEL' => $this->{'QUANTITE REEL'},
            'CAMION' => $this->CAMION,
            'TRANSPORTEUR' => $this->TRANSPORTEUR,
            'CHAUFFEUR' => $this->CHAUFFEUR,
            'POIDS(KG) PREV' => $this->{'POIDS(KG) PREV'},
            'POIDS(kg)' => $this->{'POIDS(kg)'},
            'VILLE' => $this->VILLE,
            'CONTENANT' => $this->CONTENANT,
            'N B EXPEDITION' => $this->{'N B EXPEDITION'},
            'COMMENTAIRE' => $this->COMMENTAIRE,

        ];
    }
}
