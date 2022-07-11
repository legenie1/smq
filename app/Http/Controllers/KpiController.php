<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class KpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kpi::get();

        $kpis = Kpi::all();

        $dataPoints = [];

        foreach ($kpis as $kpi) {
            
            $dataPoints[] = array(
                "name" => $kpi['name'],
                "data" => [
                    floatval((($kpi['chiffre']/$kpi['objectif']))*100),
                    floatval((($kpi['police_renouvele']/$kpi['police_a_renouvele']))*100),
                    floatval((($kpi['total_encais1']/$kpi['total_prime1']))*100),
                    floatval((($kpi['total_encais2']/$kpi['total_prime2']))*100),
                ],
            );
        }

        return view("kpi.index", [
            "data" => $data,
            "data2" => json_encode($dataPoints),
            "terms" => json_encode(array(
                "Trimèstre 1",
                "Trimèstre 2",
                "Trimèstre 3",
                "Trimèstre 4",
            )),
        ]);

    // }

        // return View('kpi.index', compact('data'))->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('kpi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            // 'nom'   => 'required|string|max:255|unique:kpis',
            // 'trimestre'   => 'required|string|max:255',
        ]);

        try {
            $kpi = new Kpi;
            $kpi->trimestre  = $request->trimestre;
            $kpi->chiffre  = $request->chiffre;
            $kpi->objectif  = $request->objectif;
            $kpi->police_renouvele  = $request->police_renouvele;
            $kpi->police_a_renouvele  = $request->police_a_renouvele;
            $kpi->total_encais1  = $request->total_encais1;
            $kpi->total_prime1  = $request->total_prime1;
            $kpi->total_encais2  = $request->total_encais2;
            $kpi->total_prime2  = $request->total_prime2;
            $kpi->save();

            Toastr::success('Kpi créer avec succès','Success');
            return redirect()->route('kpi.index');

        } catch (Exception $e) {
            Toastr::error('Erreur de création','Error');
            return redirect()->route('kpi.create');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KPI  $kpi
     * @return \Illuminate\Http\Response
     */
    public function show(KPI $kpi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KPI  $kpi
     * @return \Illuminate\Http\Response
     */
    public function edit(KPI $id)
    {
        //
        // $data = KPI::find($id);
        return View('kpi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KPI  $kpi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KPI $kpi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KPI  $kpi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            $data = KPI::find($id);
            $data->delete();
            Toastr::success('KPI supprimer avec succès :)','success');
            return redirect()->route('kpi.index');
    }

}
