<?php

namespace App\Http\Controllers;

use App\PrintData;
use App\Crosslink;
use App\Pressure;
use App\PrintFile;
use App\Resolution;
use Illuminate\Http\Request;

use App\Http\Requests;

class ChartController extends Controller
{
    /**
     * Return the print_data for the given user.
     *
     * @param  int $id
     * @return Response
     */
    public function printDataChart($id)
    {
        $printDatas = PrintData::where('user_id', $id)->get();

        $objects = array(
            'dead_percent' => array(
                'name' => 'Dead Percent',
                'data' => array()
            ),
            'elasticity' => array(
                'name' => 'Elasticity',
                'data' => array()
            ),
            'live_percent' => array(
                'name' => 'Live Percent',
                'data' => array()
            )
        );

        foreach ($printDatas as $printData) {
            $objects['dead_percent'] ['data'][] = floatval($printData->dead_percent);
            $objects['elasticity'] ['data'][] = floatval($printData->elasticity);
            $objects['live_percent'] ['data'][] = floatval($printData->live_percent);
        }

        return response()->json($objects);
    }

    /**
     * Return the crosslinking for the given user.
     *
     * @param  int $id
     * @return Response
     */
    public function printCrosslinkChart($id)
    {
        $crosslinks = Crosslink::where('user_id', $id)->get();

        $objects = array(
            'cl_duration' => array(
                'name' => 'Cl Duration',
                'data' => array()
            ),
            'cl_enabled' => array(
                'name' => 'Cl Enabled',
                'data' => array()
            ),
            'cl_intensity' => array(
                'name' => 'Cl Intensity',
                'data' => array()
            )
        );

        foreach ($crosslinks as $crosslink) {
            $objects['cl_duration'] ['data'][] = floatval($crosslink->cl_duration);
            $objects['cl_enabled'] ['data'][] = intval($crosslink->cl_enabled);
            $objects['cl_intensity'] ['data'][] = intval($crosslink->cl_intensity);
        }

        return response()->json($objects);
    }

    /**
     * Return the pressure for the given user.
     *
     * @param  int $id
     * @return Response
     */
    public function printPressureChart($id)
    {
        $pressures = Pressure::where('user_id', $id)->get();

        $objects = array(
            'extruder1' => array(
                'name' => 'Extruder1',
                'data' => array()
            ),
            'extruder2' => array(
                'name' => 'Extruder2',
                'data' => array()
            )
        );

        foreach ($pressures as $pressure) {
            $objects['extruder1'] ['data'][] = intval($pressure->extruder1);
            $objects['extruder2'] ['data'][] = intval($pressure->extruder2);
        }

        return response()->json($objects);
    }

    /**
     * Return the resolution for the given user.
     *
     * @param  int $id
     * @return Response
     */
    public function printResolutionChart($id)
    {
        $resolutions = Resolution::where('user_id', $id)->get();

        $objects = array(
            'layer_height' => array(
                'name' => 'Layer Height',
                'data' => array()
            ),
            'layer_num' => array(
                'name' => 'Layer Number',
                'data' => array()
            )
        );

        foreach ($resolutions as $resolution) {
            $objects['layer_height'] ['data'][] = floatval($resolution->layer_height);
            $objects['layer_num'] ['data'][] = floatval($resolution->layer_num);
        }

        return response()->json($objects);
    }
}
