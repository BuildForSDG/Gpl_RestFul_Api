<?php

/**
 * @OA\Schema(
 *      title="Store Project request",
 *      description="Store Project request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class CreateGplRequest
{
    /**
     * @OA\Property(
     *      title="DATE",
     *      description="date of the day",
     *      example="2021-05-22"
     * )
     *
     * @var date
     */
    public $DATES;

    /**
     * @OA\Property(
     *      title="DATES SAISIES SAP",
     *      description="DATES SAISIES SAP",
     *      example="2021-05-22"
     * )
     *
     * @var date
     */
    public $DATES_SAISIES_SAP;

    /**
     * @OA\Property(
     *      title="DATES LIVRAISON PREV",
     *      description="DATES LIVRAISON PREV",
     *      example="2021-05-22"
     * )
     *
     * @var date
     */
    public $DATES_LIVRAISON_PREV;

    /**
     * @OA\Property(
     *      title="DATES  LIVRAISONS",
     *      description="DATES  LIVRAISONS",
     *      example="2021-05-22"
     * )
     *
     * @var date
     */
    public $DATES__LIVRAISONS;

    /**
     * @OA\Property(
     *      title="COMPTE",
     *      description="COMPTE",
     *      example="RESEAU"
     * )
     *
     * @var string
     */
    public $COMPTE;

    /**
     * @OA\Property(
     *      title="NUMERO DE BL",
     *      description="NUMERO DE BL",
     *      example="000123456"
     * )
     *
     * @var string
     */
    public $NUMERO_DE_BL;

    /**
     * @OA\Property(
     *      title="6 KG",
     *      description="6 KG",
     *      format="int64",
     *      example=80
     * )
     *
     * @var integer
     */

    public $_6_kg;

    /**
     * @OA\Property(
     *      title="12 KG",
     *      description="12 KG",
     *      format="int64",
     *      example=60
     * )
     *
     * @var integer
     */

    public $_12_kg;

    /**
     * @OA\Property(
     *      title="18 KG",
     *      description="18 KG",
     *      format="int64",
     *      example=40
     * )
     *
     * @var integer
     */

    public $_18_kg;

    /**
     * @OA\Property(
     *      title="32 KG",
     *      description="32 KG",
     *      format="int64",
     *      example=30
     * )
     *
     * @var integer
     */

    public $_32_kg;

    /**
     * @OA\Property(
     *      title="QUANTITE PREV",
     *      description="35 KG",
     *      format="int64",
     *      example=80
     * )
     *
     * @var integer
     */

    public $QUANTITE_PREV;

    /**
     * @OA\Property(
     *      title="QUANTITE REEL",
     *      description="35 KG",
     *      format="int64",
     *      example=80
     * )
     *
     * @var integer
     */

    public $QUANTITE_REEL;


    /**
     * @OA\Property(
     *      title="CAMION",
     *      description="CAMION",
     *      example="LTSR 896 AJ"
     * )
     *
     * @var string
     */
    public $CAMION;

    /**
     * @OA\Property(
     *      title="TRANSPORTEUR",
     *      description="TRANSPORTEUR",
     *      example="SOCOTRAP"
     * )
     *
     * @var string
     */
    public $TRANSPORTEUR;

    /**
     * @OA\Property(
     *      title="CHAUFFEUR",
     *      description="CHAUFFEUR",
     *      example="DONGMO"
     * )
     *
     * @var string
     */
    public $CHAUFFEUR;


    /**
     * @OA\Property(
     *      title="POIDS(KG) PREV",
     *      description="POIDS(KG) PREV",
     *      format="int64",
     *      example=null
     * )
     *
     * @var integer
     */

    public $POIDS_KG_PREV;

    /**
     * @OA\Property(
     *      title="POIDS(kg)",
     *      description="POIDS(kg)",
     *      format="int64",
     *      example=1000
     * )
     *
     * @var integer
     */

    public $POIDS_kg;

    /**
     * @OA\Property(
     *      title="VILLE",
     *      description="VILLE",
     *      example="DLA"
     * )
     *
     * @var string
     */
    public $VILLE;

    /**
     * @OA\Property(
     *      title="CONTENANT",
     *      description="CONTENANT",
     *      example=""
     * )
     *
     * @var string
     */
    public $CONTENANT;

    /**
     * @OA\Property(
     *      title="N B EXPEDITION",
     *      description="N B EXPEDITION",
     *      example=""
     * )
     *
     * @var string
     */
    public $N_B_EXPEDITION;

    /**
     * @OA\Property(
     *      title="COMMENTAIRE",
     *      description="COMMENTAIRE",
     *      example=""
     * )
     *
     * @var string
     */
    public $COMMENTAIRE;
}
