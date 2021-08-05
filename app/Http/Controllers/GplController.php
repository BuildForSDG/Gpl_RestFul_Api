<?php


namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\GplResource;
use App\Models\gpl;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;


/**
 * @OA\Info(title="GPL API", version="1.0")
 */


class GplController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/v1/gpl",
     *      operationId="getAllData",
     *      tags={"gpl"},
     *      summary="Get list of gpl records",
     *      description="Returns list of gpls",
     *      @OA\Parameter(
     *          name="limit",
     *          description="records limit",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GplResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      security={{ "apiAuth": {} }},
     *     )
     */
    public function getAllData(Request $request)
    {
        $a = $request->limit;

        if (!empty($request->limit)) {

            $gpl = gpl::offset(0)->limit($request->limit)
                ->orderby('DATES', 'DESC')
                ->get();

            if (($gpl->count() > 0) && ($gpl != null)) {

                return $this->sendResponse(GplResource::collection($gpl), "data retrieve sucessfully !");
            } else {
                return $this->badRequest();
            }
        } else {
            return $this->badRequest("please provide a limit value !");
        }
    }

    /**
     * @OA\Get(
     *      path="/api/v1/gpl_Filter_year",
     *      operationId="getDataByYear",
     *      tags={"gpl_Filter_year"},
     *      summary="Get list of gpl records by year",
     *      description="Returns list of gpls by year",
     *      security={{ "apiAuth": {} }},
     *      @OA\Parameter(
     *          name="year",
     *          description="records year",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function getDataByYear(Request $request)
    {
        $a = $request->year;

        if (!empty($request->year)) {

            $year = Carbon::createFromFormat('Y', $request->year);

            $gpl = gpl::whereYear('DATES', $year)
                ->orderby('DATES', 'DESC')
                ->get();

            if (($gpl->count() > 0) && ($gpl != null)) {

                return $this->sendResponse(GplResource::collection($gpl), "data retrieve sucessfully !");
            } else {
                return $this->notFound();
            }
        } else {
            return $this->badRequest("please provide the year !");
        }
    }

    /**
     * @OA\Get(
     *      path="/api/v1/gpl_Filter_dates",
     *      operationId="getDataBtwDates",
     *      tags={"gpl_Filter_dates"},
     *      summary="Get list of gpl records betweent two dates",
     *      description="Returns list of gpls betweent two dates",
     *      security={{ "apiAuth": {} }},
     *      @OA\Parameter(
     *          name="from_date",
     *          description="from_date ex: 01/04/2020",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *          format ="date-time",
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="to_date",
     *          description="to_date ex: 20/04/2020",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *          format ="date-time",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function getDataBtwDates(Request $request)
    {

        if (!empty($request->from_date) && !empty($request->from_date)) {

            $fromdate = Carbon::createFromFormat('d/m/Y', $request->from_date);

            $todate = Carbon::createFromFormat('d/m/Y', $request->to_date);


            $gpl = gpl::whereBetween('DATES', [$fromdate, $todate])
                ->orderby('DATES', 'DESC')
                ->get();

            if (($gpl->count() > 0) && ($gpl != null)) {

                return $this->sendResponse(GplResource::collection($gpl), "data retrieve sucessfully !");
            } else {
                return $this->badRequest();
            }
        } else {
            return $this->badRequest("please provide the date range !");
        }
    }


    /**
     * @OA\Get(
     *      path="/api/v1/gpl/{id}",
     *      operationId="getSingleData",
     *      tags={"gpl"},
     *      summary="Get a single  gpl records",
     *      description="Returns a single gpls record",
     *      security={{ "apiAuth": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Gpl id to retrieve",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\Schema(ref="#/components/schemas/GPLResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function getSingleData($id)
    {
        $gpl = gpl::find($id);

        if (($gpl != null)) {

            if ($gpl->count() > 0) {
                return $this->sendResponse(new GplResource($gpl), "data retrieve sucessfully !");
            }
        } else {
            return $this->notFound();
        }
    }

    /**
     * @OA\Post(
     *      path="/api/v1/gpl",
     *      operationId="createNewData",
     *      tags={"gpl"},
     *      summary="Create a gpl records",
     *      description="create a single gpls record",
     *      security={{ "apiAuth": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateGplRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function createNewData(Request $request)
    {
        $rules = [

            'NUMERO DE BL' => 'required',
            'DATES SAISIES SAP' => 'required',
            'DATES LIVRAISON PREV' => 'required',
            'DATES  LIVRAISONS' => 'nullable',
            'CAMION' => 'required',
            'CLIENTS' => 'required',
            '6 KG' => 'nullable',
            '12,5 KG' => 'nullable',
            '18 KG' => 'nullable',
            '35 KG' => 'nullable',
            '32 KG' => 'nullable',
        ];

        $validator =  Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $countExistrecord = gpl::where('NUMERO DE BL', $request->{"NUMERO DE BL"})->count();

        if ($countExistrecord == 0) {

            $gpl = gpl::create($request->all());
            return $this->created($gpl, "successfully created!");
        } else {
            return $this->badRequest('record already exist');
        }
    }

    /**
     * @OA\Put(
     *      path="/api/v1/gpl/{id}",
     *      operationId="updateData",
     *      tags={"gpl"},
     *      summary="Update a gpl records",
     *      description="Update a single gpls record",
     *      security={{ "apiAuth": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateGplRequest")
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Gpl id to update",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function updateData(Request $request, $id)
    {
        $rules = [

            'ID' => 'required',
            'NUMERO DE BL' => 'required',
            'DATES SAISIES SAP' => 'required',
            'DATES LIVRAISON PREV' => 'required',
            'DATES  LIVRAISONS' => 'required',
            'CAMION' => 'required',
            'CLIENTS' => 'required',
            '6 KG' => 'nullable',
            '12,5 KG' => 'nullable',
            '18 KG' => 'nullable',
            '35 KG' => 'nullable',
            '32 KG' => 'nullable',
        ];

        $validator =  Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $countExistrecord = gpl::find($id);

        if (!is_null($countExistrecord)) {

            $gpl = gpl::find($id);
            $gpl->update($request->all());

            return $this->updated($gpl, "successfully updated!");
        } else {
            return $this->notFound('update error. Record does not exist !');
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/gpl/{id}",
     *      operationId="deleteData",
     *      tags={"gpl"},
     *      summary="Delete a gpl records",
     *      description="Delete a single gpls record",
     *      security={{ "apiAuth": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Gpl id to delete",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="No Content"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function deleteData($id)
    {
        $countExistrecord = gpl::find($id);

        if (!is_null($countExistrecord)) {

            $gpl = gpl::destroy($id);

            if ($gpl) {

                return $this->delete("successfully deleted!");
            } else {

                return $this->badRequest("fail to delete record !");
            }
        } else {

            return $this->notFound('delete error. Record does not exist !');
        }
    }
}
