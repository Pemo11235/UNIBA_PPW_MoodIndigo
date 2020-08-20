<?php

namespace App\Http\Controllers;

use App\Analysis;
use App\Csv_emozioni;
use App\CsvEmozioni;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;



class CsvEmozioniRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'csv_file' => 'required|file'
        ];
    }
}
class CsvEmozioniController extends Controller
{
    public function getImport()
    {
        return view('csv.import');
    }

    public function parseImport(CsvEmozioniRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();


        if ($request->has('header')) {
//            $data = \Excel::import($path, function($reader) {})->get()->toArray();
    //        $data = \Excel::toArray(new UsersImport,request()->file('csv_file'))[0];
            $data = \Excel::toArray('', $path, null, \Maatwebsite\Excel\Excel::TSV)[0];
        } else {
            $data = array_map('str_getcsv', file($path));
        }

        /*if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }
            $csv_data = array_slice($data, 0, 8);

            $csv_data_file = CsvEmozioni::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }*/
       // dd($data);
      //  $data = CsvEmozioni::where('id', $request->csv_data_file_id);
        // dd($data);
        //$csv_data = json_decode($data->csv_data, true);


        /*foreach ($csv_data as $row) {
            if ($row != $csv_data[0]){

                $foo = new CsvEmozioni();
                $foo->analysis_id = null;
                $foo->time = $row[0];
                $foo->joy  = $row[1];
                $foo->sadness  = $row[2];
                $foo->disgust  = $row[3];
                $foo->contempt  = $row[4];
                $foo->anger  = $row[5];
                $foo->fear  =$row[6];
                $foo->surprise  = $row[7];
                $foo->valence  =$row[8];
                $foo->engagement  = $row[9];

                $foo->save();
            }*/


        return view('csv.import_success',compact( 'data'));

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Csv_emozioni  $csv_emozioni
     * @return \Illuminate\Http\Response
     */
    public function show(CsvEmozioni $csv_emozioni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Csv_emozioni  $csv_emozioni
     * @return \Illuminate\Http\Response
     */
    public function edit(CsvEmozioni $csv_emozioni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Csv_emozioni  $csv_emozioni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CsvEmozioni $csv_emozioni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Csv_emozioni  $csv_emozioni
     * @return \Illuminate\Http\Response
     */
    public function destroy(CsvEmozioni $csv_emozioni)
    {
        //
    }
}
